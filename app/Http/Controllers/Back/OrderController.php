<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Mail\OrderUpdate;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function list()
    {
        return view('Back.orders');
    }
    public function detail($id)
    {
        $order = Order::findOrFail($id);
        return view('Back.detail.order', compact('order'));
    }
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        $data = [
            'order' =>  $order->id,
            'status' => $request->status
        ];
        Mail::to($order->email)->send(new OrderUpdate($data));
        toastr()->success(__('keywords.event-success'));
        return back();
    }
}
