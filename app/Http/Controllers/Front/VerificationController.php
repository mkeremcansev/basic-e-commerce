<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify($code)
    {
        $verification = User::where('verification', $code)->first();
        if ($verification && $verification->verify == 0) {
            $verification->verify = 1;
            $verification->save();
            toastr()->success(__('keywords.event-success'));
        } else {
            toastr()->error(__('keywords.event-error'));
        }
        return redirect()->route('Front.main');
    }
}
