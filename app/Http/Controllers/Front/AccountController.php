<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function page()
    {
        $userReview = Review::where('user', Auth::user()->id)->get();
        return view('Front.account', compact('userReview'));
    }
    public function change(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|min:8|max:20',
                'repeat' => 'required|min:8|same:password',
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
        $user = User::where('reset', Auth::user()->reset)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
    public function adress(Request $request)
    {
        $request->validate(
            [
                'city' => 'required|min:1|max:30',
                'adress' => 'required|min:10|max:150',
            ],
            [
                'city.required' => __('keywords.city-required'),
                'city.min' => __('keywords.city-min', ['min' => ':min']),
                'city.max' => __('keywords.city-max', ['max' => ':max']),

                'adress.required' => __('keywords.adress-required'),
                'adress.min' => __('keywords.adress-min', ['min' => ':min']),
                'adress.max' => __('keywords.adress-max', ['max' => ':max']),
            ]
        );
        $user = User::where('reset', Auth::user()->reset)->first();
        $user->city = $request->city;
        $user->adress = $request->adress;
        $user->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
    public function reviews()
    {
        $userReview = Review::where('user', Auth::user()->id)->get();
        return view('Front.reviews', compact('userReview'));
    }
}
