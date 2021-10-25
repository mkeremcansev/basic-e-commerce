<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function update(Request $request)
    {
        $fill = $request->validate(
            [
                'key' => 'required',
                'secret' => 'required',
                'url' => 'required',
            ],
            [
                'key.required' => __('keywords.key-required'),
                'secret.required' => __('keywords.secret-required'),
                'url.required' => __('keywords.url-required'),
            ]
        );
        $payment = Payment::find(1);
        $payment->fill($fill);
        $payment->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
}
