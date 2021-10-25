<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|min:3|max:30',
                'password' => 'required|min:8|max:20',
            ],
            [
                'email.required' => __('keywords.email-required'),
                'email.min' => __('keywords.email-min', ['min' => ':min']),
                'email.max' => __('keywords.email-max', ['max' => ':max']),

                'password.required' => __('keywords.password-required'),
                'password.min' => __('keywords.password-min', ['min' => ':min']),
                'password.max' => __('keywords.password-max', ['max' => ':max']),
            ]
        );

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'isAdmin' => 0
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            toastr()->success(__('keywords.event-success'));
            Log::notice(loginLog($request->email, $request->ip()));
            return redirect()->route('Front.main');
        }
        toastr()->error(__('keywords.event-error'));
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toastr()->success(__('keywords.event-success'));
        return redirect()->route('Front.main');
    }
}
