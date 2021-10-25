<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function category()
    {
        return view('Back.create.category');
    }
    public function list()
    {
        return view('Back.categorys');
    }
    public function create(Request $request)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:5|max:30',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
            ]
        );
        $category = new Category;
        $category->fill($fill);
        $category->slug = Str::slug($request->title);
        $category->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }

    public function up($id)
    {
        $category = Category::findOrFail($id);
        return view('Back.update.category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $fill = $request->validate(
            [
                'title' => 'required|min:5|max:30',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
            ]
        );
        $category = Category::findOrFail($id);
        $category->fill($fill);
        $category->slug = Str::slug($request->title);
        $category->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
    public function delete($id)
    {
        $product = Product::where('category', $id)->get();
        $count = count($product);
        if ($count > 0) {
            toastr()->error(__('keywords.not-empty-category'));
        } else {
            Category::where('id', $id)->delete();
            toastr()->success(__('keywords.event-success'));
        }
        return back();
    }
}
