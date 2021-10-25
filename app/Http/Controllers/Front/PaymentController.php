<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Ordermail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function check()
    {
        $cart = Cart::instance('cart')->count();
        if ($cart < 1) {
            return redirect()->route('Front.main');
        }
        return view('Front.checkout');
    }
    public function payment(Request $request)
    {
        $cart = Cart::instance('cart')->count();
        if ($request->isMethod('GET')) {
            toastr()->error(__('keywords.event-error'));
            return redirect()->route('Front.main');
        } elseif ($cart < 1) {
            toastr()->error(__('keywords.event-error'));
            return redirect()->route('Front.main');
        }
        $payment = Payment::where('id', 1)->first();
        $options = new \Iyzipay\Options();
        $options->setApiKey($payment->key);
        $options->setSecretKey($payment->secret);
        $options->setBaseUrl($payment->url);

        $requestIyzico = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $requestIyzico->setLocale(\Iyzipay\Model\Locale::TR);
        $requestIyzico->setPrice(replaceData(Cart::instance('cart')->subtotal()));
        $requestIyzico->setPaidPrice(replaceData(Cart::instance('cart')->subtotal()));
        $requestIyzico->setCurrency(\Iyzipay\Model\Currency::TL);
        $requestIyzico->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $requestIyzico->setCallbackUrl(route('Front.order.create'));
        $requestIyzico->setEnabledInstallments(array(2, 3, 6, 9));

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId(Auth::user()->id);
        $buyer->setName(Auth::user()->name);
        $buyer->setSurname(Auth::user()->surname);
        $buyer->setGsmNumber(Auth::user()->phone);
        $buyer->setEmail(Auth::user()->email);
        $buyer->setIdentityNumber(Auth::user()->identity);
        $buyer->setRegistrationAddress(Auth::user()->adress);
        $buyer->setIp($request->ip());
        $buyer->setCity(Auth::user()->city);
        $buyer->setCountry("Turkey");

        $requestIyzico->setBuyer($buyer);
        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName(Auth::user()->name . " " . Auth::user()->surname);
        $shippingAddress->setCity(Auth::user()->city);
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress(Auth::user()->adress);
        $requestIyzico->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName(Auth::user()->name . " " . Auth::user()->surname);
        $billingAddress->setCity(Auth::user()->city);
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress(Auth::user()->adress);
        $requestIyzico->setBillingAddress($billingAddress);

        $piece = 0;
        foreach (Cart::instance('cart')->content() as $cartItems) {

            $BasketItem = new \Iyzipay\Model\BasketItem();
            $BasketItem->setId($cartItems->model->id);
            $BasketItem->setName($cartItems->model->title);
            $BasketItem->setCategory1($cartItems->model->getCategory->title);
            $BasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $BasketItem->setPrice($cartItems->qty * $cartItems->price);
            $basketItems[$piece] = $BasketItem;
            $piece++;
        }
        $requestIyzico->setBasketItems($basketItems);

        $checkoutForm = \Iyzipay\Model\CheckoutFormInitialize::create($requestIyzico, $options)
            ->getCheckoutFormContent();
        return view('Front.order', compact('checkoutForm'));
    }
    public function create(Request $request)
    {
        $cart = Cart::instance('cart')->count();
        if ($request->isMethod('GET')) {
            toastr()->error(__('keywords.event-error'));
            return redirect()->route('Front.main');
        } elseif ($cart < 1) {
            toastr()->error(__('keywords.event-error'));
            return redirect()->route('Front.main');
        }
        $payment = Payment::where('id', 1)->first();
        $options = new \Iyzipay\Options();
        $options->setApiKey($payment->key);
        $options->setSecretKey($payment->secret);
        $options->setBaseUrl($payment->url);
        $requestIyzico = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $requestIyzico->setLocale(\Iyzipay\Model\Locale::TR);
        $requestIyzico->setToken($request->token);
        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($requestIyzico, $options);

        if ($checkoutForm->getPaymentStatus() == 'SUCCESS') {
            $order = new Order();
            $order->user = Auth::user()->id;
            $order->name = Auth::user()->name;
            $order->surname = Auth::user()->surname;
            $order->email = Auth::user()->email;
            $order->phone = Auth::user()->phone;
            $order->total = replaceData(Cart::instance('cart')->subtotal());
            $order->adress = Auth::user()->adress . " / " . Auth::user()->city;
            $order->save();

            foreach (Cart::instance('cart')->content() as $orderItems) {
                $orderItem = new OrderItem();
                $orderItem->user = Auth::user()->id;
                $orderItem->product = $orderItems->model->id;
                $orderItem->order = $order->id;
                $orderItem->price = $orderItems->price;
                $orderItem->quantity = $orderItems->qty;
                $orderItem->amount = $orderItems->qty * $orderItems->price;
                $orderItem->size = $orderItems->options->size;
                $orderItem->color = $orderItems->options->color;
                $orderItem->save();
            }
            $cartData = [
                'order' => $order->id,
                'phone' => $order->phone,
                'adress' => $order->adress,
                'total' => $order->total
            ];
            $itemsCart = Cart::instance('cart')->content();
            Mail::to(Auth::user()->email)->send(new Ordermail($cartData, $itemsCart));
            Log::notice(Auth::user()->email . " sipariş oluşturdu. Sipariş tutarı : " . $order->total . " ₺. Sipariş Numarası : " . $order->id);
            Cart::instance('cart')->destroy();
            $orderNumber = $order->id;
            toastr()->success(__('keywords.event-success'));
            return redirect()->route('Front.success', compact('orderNumber'));
        } else {
            return redirect()->route('Front.payment');
        }
    }
    public function success()
    {
        return view('Front.success');
    }

    public function orders()
    {
        $orders = Order::where('user', Auth::user()->id)->get();
        return view('Front.orders', compact('orders'));
    }
}
