<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Support\Str;

class SizeController extends Controller
{
    public function size()
    {
        return view('Back.create.size');
    }
    public function list()
    {
        return view('Back.sizes');
    }
    public function create(Request $request)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:1|max:30',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
            ]
        );
        $size = new Size;
        $size->fill($fill);
        $size->slug = Str::slug($request->title);
        $size->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }

    public function up($id)
    {
        $size = Size::findOrFail($id);
        return view('Back.update.size', compact('size'));
    }

    public function update(Request $request, $id)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:1|max:30',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
            ]
        );
        $size = Size::findOrFail($id);
        $size->fill($fill);
        $size->slug = Str::slug($request->title);
        $size->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
    public function delete($id)
    {
        Size::where('id', $id)->delete();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
}
