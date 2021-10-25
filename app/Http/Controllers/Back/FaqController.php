<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faq()
    {
        return view('Back.create.faq');
    }

    public function list()
    {
        return view('Back.faq');
    }

    public function create(Request $request)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:5|max:100',
                'content' => 'required|min:5|max:255',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
                'content.required' => __('keywords.content-required'),
                'content.min' => __('keywords.content-min', ['min' => ':min']),
                'content.max' => __('keywords.content-max', ['max' => ':max']),
            ]
        );
        $faq = new Faq;
        $faq->fill($fill);
        $faq->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
    public function up($id)
    {
        $faq = Faq::findOrFail($id);
        return view('Back.update.faq', compact('faq'));
    }
    public function update(Request $request, $id)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:5|max:100',
                'content' => 'required|min:5|max:255',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
                'content.required' => __('keywords.content-required'),
                'content.min' => __('keywords.content-min', ['min' => ':min']),
                'content.max' => __('keywords.content-max', ['max' => ':max']),
            ]
        );
        $faq = Faq::findOrFail($id);
        $faq->fill($fill);
        $faq->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
    public function delete($id)
    {
        Faq::where('id', $id)->delete();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
}
