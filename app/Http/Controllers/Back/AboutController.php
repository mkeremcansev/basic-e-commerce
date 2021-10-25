<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function list()
    {
        return view('Back.about');
    }

    public function about()
    {
        return view('Back.create.about');
    }

    public function create(Request $request)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:5|max:100',
                'content' => 'required|min:5',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
                'content.required' => __('keywords.content-required'),
                'content.min' => __('keywords.content-min', ['min' => ':min']),
            ]
        );
        $about = new About;
        $about->fill($fill);
        $about->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }

    public function up($id)
    {
        $about = About::findOrFail($id);
        return view('Back.update.about', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:5|max:100',
                'content' => 'required|min:5',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
                'content.required' => __('keywords.content-required'),
                'content.min' => __('keywords.content-min', ['min' => ':min']),
            ]
        );
        $about = About::findOrFail($id);
        $about->fill($fill);
        $about->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }

    public function delete($id)
    {
        About::where('id', $id)->delete();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
}
