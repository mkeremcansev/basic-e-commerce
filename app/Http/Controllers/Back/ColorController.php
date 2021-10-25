<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    public function color()
    {
        return view('Back.create.color');
    }
    public function list()
    {
        return view('Back.colors');
    }
    public function create(Request $request)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:3|max:30',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
            ]
        );
        $color = new Color;
        $color->fill($fill);
        $color->slug = Str::slug($request->title);
        $color->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }

    public function up($id)
    {
        $color = Color::findOrFail($id);
        return view('Back.update.color', compact('color'));
    }

    public function update(Request $request, $id)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:3|max:30',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
            ]
        );
        $color = Color::findOrFail($id);
        $color->fill($fill);
        $color->slug = Str::slug($request->title);
        $color->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
    public function delete($id)
    {
        Color::where('id', $id)->delete();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
}
