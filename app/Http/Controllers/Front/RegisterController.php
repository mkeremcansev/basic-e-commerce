<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Verification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $fill = $request->validate(
            [
                'email' => 'required|email|min:5|max:30|unique:users',
                'name' => 'required|min:3|max:30',
                'surname' => 'required|min:3|max:30',
                'identity' => 'required|min:11|max:11|unique:users',
                'username' => 'required|min:5|max:20|unique:users',
                'phone' => 'required|min:10|max:13||unique:users',
                'password' => 'required|min:8|max:20',
                'repeat' => 'required|min:8|same:password',
                'contract' => 'required',
            ],
            [
                'email.required' => __('keywords.email-required'),
                'email.email' => __('keywords.email-required'),
                'email.min' => __('keywords.email-min', ['min' => ':min']),
                'email.max' => __('keywords.email-max', ['max' => ':max']),
                'email.unique' => __('keywords.email-unique'),

                'name.required' => __('keywords.name-required'),
                'name.min' => __('keywords.name-min', ['min' => ':min']),
                'name.max' => __('keywords.name-max', ['max' => ':max']),

                'surname.required' => __('keywords.surname-required'),
                'surname.min' => __('keywords.surname-min', ['min' => ':min']),
                'surname.max' => __('keywords.surname-max', ['max' => ':max']),

                'identity.required' => __('keywords.identity-required'),
                'identity.min' => __('keywords.identity-min', ['min' => ':min']),
                'identity.max' => __('keywords.identity-max', ['max' => ':max']),
                'identity.unique' => __('keywords.identity-unique'),

                'username.required' => __('keywords.username-required'),
                'username.min' => __('keywords.username-min', ['min' => ':min']),
                'username.max' => __('keywords.username-max', ['max' => ':max']),
                'username.unique' => __('keywords.username-unique'),

                'phone.required' => __('keywords.phone-required'),
                'phone.min' => __('keywords.phone-min', ['min' => ':min']),
                'phone.max' => __('keywords.phone-max', ['max' => ':max']),
                'phone.unique' => __('keywords.phone-unique'),

                'password.required' => __('keywords.password-required'),
                'password.min' => __('keywords.password-min', ['min' => ':min']),
                'password.max' => __('keywords.password-max', ['max' => ':max']),
                'password.confirmed' => __('keywords.password-confirmed'),

                'repeat.required' => __('keywords.repeat-required'),
                'repeat.min' => __('keywords.repeat-min', ['min' => ':min']),
                'repeat.max' => __('keywords.repeat-max', ['max' => ':max']),
                'repeat.same' => __('keywords.password-confirmed'),

                'contract.required' => __('keywords.contract-required'),

            ]
        );
        $verify = Str::random(20);
        $register = new User;
        $register->fill($fill);
        $register->password = Hash::make($request->password);
        $register->verification = $verify;
        $register->reset = Str::random(20);
        $register->save();
        Mail::to($request->email)->send(new Verification($verify));
        toastr()->success(__('keywords.event-success'));
        Log::notice(registerLog($request->name, $request->surname, $request->username, $request->email, $request->ip()));
        return redirect()->route('Front.main');
    }
}
