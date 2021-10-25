<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Support\Helper;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    public function slider()
    {
        return view('Back.create.slider');
    }
    public function list()
    {
        return view('Back.sliders');
    }
    public function create(Request $request)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:5|max:50',
                'description' => 'required|min:5|max:50',
                'image' => 'required|max:4096|mimes:png,jpg,jpeg',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
                'description.required' => __('keywords.description-required'),
                'description.min' => __('keywords.description-min', ['min' => ':min']),
                'description.max' => __('keywords.description-max', ['max' => ':max']),
                'image.required' => __('keywords.image-required'),
                'image.mimes' => __('keywords.image-type', ['type' => ':values']),
                'image.max' => __('keywords.image-max', ['max' => ':max']),

            ]
        );
        $slider = new Slider;
        $slider->fill($fill);
        if ($request->hasFile('image')) {
            $slider->image = Helper::imageUpload($request->file('image'), 'Slider', $slider->image);
        }
        $slider->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }

    public function up($id)
    {
        $slider = Slider::findOrFail($id);
        return view('Back.update.slider', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:5|max:50',
                'description' => 'required|min:5|max:50',
                'image' => 'max:4096|mimes:png,jpg,jpeg',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
                'description.required' => __('keywords.description-required'),
                'description.min' => __('keywords.description-min', ['min' => ':min']),
                'description.max' => __('keywords.description-max', ['max' => ':max']),
                'image.mimes' => __('keywords.image-type', ['type' => ':values']),
                'image.max' => __('keywords.image-max', ['max' => ':max']),

            ]
        );
        $slider = Slider::findOrFail($id);
        $slider->fill($fill);
        if ($request->hasFile('image')) {
            $slider->image = Helper::imageUpload($request->file('image'), 'Slider', $slider->image);
        }
        $slider->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
    public function delete($id)
    {
        Slider::where('id', $id)->delete();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
}
