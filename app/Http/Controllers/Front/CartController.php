<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function create(Request $request)
    {
        if ($request->qty < 1) {
            toastr()->error(__('keywords.event-error'));
            return back();
        } else {
            $product = Product::findOrFail($request->id);
            if ($product->discount != null) {
                $price = $product->discount;
            } else {
                $price = $product->price;
            }
            Cart::instance('cart')->add($product->id, $product->title, $request->qty, $price, ['size' => $request->size, 'color' => $request->color])->associate('App\Models\Product');
            toastr()->success(__('keywords.event-success'));
            return back();
        }
    }

    public function delete($id)
    {
        Cart::instance('cart')->remove($id);
        toastr()->success(__('keywords.event-success'));
        return back();
    }

    public function destroy()
    {
        Cart::instance('cart')->destroy();
        toastr()->success(__('keywords.event-success'));
        return back();
    }

    public function update($id, Request $request)
    {
        Cart::instance('cart')->update($id, $request->qty);
        toastr()->success(__('keywords.event-success'));
        return back();
    }
}
