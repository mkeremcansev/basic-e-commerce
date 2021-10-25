<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Support\Helper;
use Illuminate\Support\Str;
use App\Models\Product;

class BrandController extends Controller
{
    public function brand()
    {
        return view('Back.create.brand');
    }
    public function list()
    {
        return view('Back.brands');
    }
    public function create(Request $request)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:1|max:50',
                'image' => 'required|max:4096|mimes:png,jpg,jpeg',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
                'image.required' => __('keywords.image-required'),
                'image.mimes' => __('keywords.image-type', ['type' => ':values']),
                'image.max' => __('keywords.image-max', ['max' => ':max']),

            ]
        );
        $brand = new Brand;
        $brand->fill($fill);
        $brand->slug = Str::slug($request->title, '-');
        if ($request->hasFile('image')) {
            $brand->image = Helper::imageUpload($request->file('image'), 'Brand', $brand->image);
        }
        $brand->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }

    public function up($id)
    {
        $brand = Brand::findOrFail($id);
        return view('Back.update.brand', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:1|max:50',
                'image' => 'max:4096|mimes:png,jpg,jpeg',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
                'image.mimes' => __('keywords.image-type', ['type' => ':values']),
                'image.max' => __('keywords.image-max', ['max' => ':max']),

            ]
        );
        $brand = Brand::findOrFail($id);
        $brand->fill($fill);
        if ($request->hasFile('image')) {
            $brand->image = Helper::imageUpload($request->file('image'), 'Brand', $brand->image);
        }
        $brand->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
    public function delete($id)
    {
        $product = Product::where('brand', $id)->get();
        $count = count($product);
        if ($count > 0) {
            toastr()->error(__('keywords.not-empty-brand'));
        } else {
            Brand::where('id', $id)->delete();
            toastr()->success(__('keywords.event-success'));
        }
        return back();
    }
}
