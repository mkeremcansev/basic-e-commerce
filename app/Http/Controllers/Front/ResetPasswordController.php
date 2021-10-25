<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function resetPassword()
    {
        if (auth()->check()) {
            return redirect()->route('Front.main');
        }
        return view('Front.reset');
    }
    public function resetSend(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            Mail::to($request->email)->send(new ResetPassword($user->reset));
            toastr()->success(__('keywords.event-success'));
            return redirect()->route('Front.main');
        } else {
            toastr()->error(__('keywords.event-error'));
        }
        return back();
    }
    public function reset($code)
    {
        $user = User::where('reset', $code)->first();
        if ($user) {
            return view('Front.reset-password', compact('user'));
        } else {
            toastr()->error(__('keywords.event-error'));
        }
        return redirect()->route('Front.main');
    }
    public function resetPost(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|min:8|max:20',
                'repeat' => 'required|min:8|same:password',
                'token' => 'required',
            ],
            [
                'password.required' => __('keywords.password-required'),
                'password.min' => __('keywords.password-min', ['min' => ':min']),
                'password.max' => __('keywords.password-max', ['max' => ':max']),
                'password.confirmed' => __('keywords.password-confirmed'),
                'repeat.required' => __('keywords.repeat-required'),
                'repeat.min' => __('keywords.repeat-min', ['min' => ':min']),
                'repeat.max' => __('keywords.repeat-max', ['max' => ':max']),
                'repeat.same' => __('keywords.password-confirmed'),
            ]
        );
        $user = User::where('reset', $request->token)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->reset = Str::random(20);
            $user->save();
            toastr()->success(__('keywords.event-success'));
            return redirect()->route('Front.main');
        } else {
            toastr()->error(__('keywords.event-error'));
        }
        return back();
    }
}
