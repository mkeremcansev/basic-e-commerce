<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Support\Helper;

class GeneralController extends Controller
{
    public function update(Request $request)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:3|max:20',
                'description' => 'required|min:10|max:250',
                'footer' => 'required|min:5|max:50',
                'keywords' => 'required|min:5|max:1000',
                'adress' => 'required|min:10|max:150',
                'map' => 'required|min:10|max:500',
                'facebook' => 'required|min:10|max:100',
                'instagram' => 'required|min:10|max:100',
                'twitter' => 'required|min:10|max:100',
                'mail' => 'required|min:10|max:100',
                'whatsapp' => 'required|min:10|max:13',
                'phone' => 'required|min:10|max:13',
                'logo' => 'mimes:jpeg,png,jpg,svg|max:4096',
                'favicon' => 'mimes:ico|max:2048',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
                'description.required' => __('keywords.description-required'),
                'description.min' => __('keywords.description-min', ['min' => ':min']),
                'description.max' => __('keywords.description-max', ['max' => ':max']),
                'footer.required' => __('keywords.footer-required'),
                'footer.min' => __('keywords.footer-min', ['min' => ':min']),
                'footer.max' => __('keywords.footer-max', ['max' => ':max']),
                'keywords.required' => __('keywords.keywords-required'),
                'keywords.min' => __('keywords.keywords-min', ['min' => ':min']),
                'keywords.max' => __('keywords.keywords-max', ['max' => ':max']),
                'adress.required' => __('keywords.adress-required'),
                'adress.min' => __('keywords.adress-min', ['min' => ':min']),
                'adress.max' => __('keywords.adress-max', ['max' => ':max']),
                'map.required' => __('keywords.map-required'),
                'map.min' => __('keywords.map-min', ['min' => ':min']),
                'map.max' => __('keywords.map-max', ['max' => ':max']),
                'facebook.required' => __('keywords.facebook-required'),
                'facebook.min' => __('keywords.facebook-min', ['min' => ':min']),
                'facebook.max' => __('keywords.facebook-max', ['max' => ':max']),
                'instagram.required' => __('keywords.instagram-required'),
                'instagram.min' => __('keywords.instagram-min', ['min' => ':min']),
                'instagram.max' => __('keywords.instagram-max', ['max' => ':max']),
                'twitter.required' => __('keywords.twitter-required'),
                'twitter.min' => __('keywords.twitter-min', ['min' => ':min']),
                'twitter.max' => __('keywords.twitter-max', ['max' => ':max']),
                'mail.required' => __('keywords.mail-required'),
                'mail.min' => __('keywords.mail-min', ['min' => ':min']),
                'mail.max' => __('keywords.mail-max', ['max' => ':max']),
                'whatsapp.required' => __('keywords.whatsapp-required'),
                'whatsapp.min' => __('keywords.whatsapp-min', ['min' => ':min']),
                'whatsapp.max' => __('keywords.whatsapp-max', ['max' => ':max']),
                'whatsapp.required' => __('keywords.whatsapp-required'),
                'phone.min' => __('keywords.phone-min', ['min' => ':min']),
                'phone.max' => __('keywords.phone-max', ['max' => ':max']),
                'logo.mimes' => __('keywords.logo-type', ['type' => ':values']),
                'logo.max' => __('keywords.logo-max', ['max' => ':max']),
                'favicon.mimes' => __('keywords.favicon-type', ['type' => ':values']),
                'favicon.max' => __('keywords.favicon-max', ['max' => ':max']),
            ]
        );
        $general = General::find(1);
        $general->fill($fill);
        if ($request->hasFile('logo')) {
            $general->logo = Helper::imageUpload($request->file('logo'), 'Logo', $general->logo);
        }
        if ($request->hasFile('favicon')) {
            $general->favicon = Helper::imageUpload($request->file('favicon'), 'Favicon', $general->favicon);
        }
        $general->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
}
