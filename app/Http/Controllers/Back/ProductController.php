<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Support\Helper;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Review;

class ProductController extends Controller
{
    public function product()
    {
        return view('Back.create.product');
    }
    public function create(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|min:5|max:255',
                'category' => 'required',
                'price' => 'required',
                'color' => 'required',
                'size' => 'required',
                'brand' => 'required',
                'code' => 'required|min:5|max:40',
                'best' => 'required',
                'popular' => 'required',
                'featured' => 'required',
                'description' => 'required|min:20',
                'images' => 'required',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
                'description.required' => __('keywords.description-required'),
                'description.min' => __('keywords.description-min', ['min' => ':min']),
                'category.required' => __('keywords.category-required'),
                'price.required' => __('keywords.price-required'),
                'brand.required' => __('keywords.brand-required'),
                'color.required' => __('keywords.color-required'),
                'size.required' => __('keywords.size-required'),
                'code.required' => __('keywords.code-required'),
                'code.min' => __('keywords.code-min', ['min' => ':min']),
                'code.max' => __('keywords.code-max', ['max' => ':max']),
                'best.required' => __('keywords.best-required'),
                'popular.required' => __('keywords.popular-required'),
                'featured.required' => __('keywords.featured-required'),
                'images.required' => __('keywords.images-required'),
            ]
        );
        $product = new Product;
        $product->fill($request->all());
        $product->size = implode(",", $request->size);
        $product->color = implode(",", $request->color);
        $product->slug = Str::slug($request->title, '-');
        $images = $request->file('images');
        if ($request->hasFile('images')) :
            foreach ($images as $item) :
                $name = Str::random(15) . '.' . $item->extension();
                $item->move(public_path('Product'), $name);
                $arr[] = 'Product' . '/' .  $name;
            endforeach;
            $image = implode(",", $arr);
            $product->images = $image;
        endif;
        $product->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }

    public function list()
    {
        return view('Back.products');
    }

    public function up($id)
    {
        $product = Product::findOrFail($id);
        return view('Back.update.product', compact('product'));
    }

    public function image(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $array = allItems($product->images);
        $count = count($array);
        if ($count > 1) {
            if (array_search($request->image, $array) !== false) {
                $key = array_search($request->image, $array);
                unset($array[$key]);
                toastr()->success(__('keywords.event-success'));
            }
        } else {
            toastr()->error(__('keywords.event-error'));
        }
        $product->images = implode(",", $array);
        $product->save();
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required|min:5|max:255',
                'category' => 'required',
                'price' => 'required',
                'color' => 'required',
                'size' => 'required',
                'brand' => 'required',
                'code' => 'required|min:5|max:40',
                'best' => 'required',
                'popular' => 'required',
                'featured' => 'required',
                'description' => 'required|min:20',
            ],
            [
                'title.required' => __('keywords.title-required'),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
                'description.required' => __('keywords.description-required'),
                'description.min' => __('keywords.description-min', ['min' => ':min']),
                'category.required' => __('keywords.category-required'),
                'price.required' => __('keywords.price-required'),
                'brand.required' => __('keywords.brand-required'),
                'color.required' => __('keywords.color-required'),
                'size.required' => __('keywords.size-required'),
                'code.required' => __('keywords.code-required'),
                'code.min' => __('keywords.code-min', ['min' => ':min']),
                'code.max' => __('keywords.code-max', ['max' => ':max']),
                'best.required' => __('keywords.best-required'),
                'popular.required' => __('keywords.popular-required'),
                'featured.required' => __('keywords.featured-required'),
            ]
        );
        $product = Product::findOrFail($id);
        $product->fill($request->all());
        $product->size = implode(",", $request->size);
        $product->color = implode(",", $request->color);
        $product->slug = Str::slug($request->title, '-');
        $images = $request->file('images');
        if ($request->hasFile('images')) :
            foreach ($images as $item) :
                $name = Str::random(15) . '.' . $item->extension();
                $item->move(public_path('Product'), $name);
                $arr[] = 'Product' . '/' .  $name;
            endforeach;
            $image = implode(",", $arr);
            $product->images = $image;
        endif;
        $product->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
    public function delete($id)
    {
        $review = Review::where('product', $id)->get();
        $reviewCount = count($review);
        if ($reviewCount > 0) {
            toastr()->error(__('keywords.not-empty-product'));
        } else {
            Product::findOrFail($id)->delete();
            toastr()->success(__('keywords.event-success'));
        }
        return back();
    }
}
