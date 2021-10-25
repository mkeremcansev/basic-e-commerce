<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $data = Review::where('user', Auth::user()->id)->where('product', $request->product)->get();
        $count = count($data);
        if ($count > 0) {
            toastr()->error(__('keywords.not-empty-product-review'));
        } else {
            $fill = $request->validate(
                [
                    'title' => 'required|min:1|max:30',
                    'description' => 'required|min:1|max:600',
                    'rating' => 'required',
                    'product' => 'required',
                ],
                [
                    'title.required' => __('keywords.title-required'),
                    'title.min' => __('keywords.title-min', ['min' => ':min']),
                    'title.max' => __('keywords.title-max', ['max' => ':max']),
                    'description.required' => __('keywords.description-required'),
                    'description.min' => __('keywords.description-min', ['min' => ':min']),
                    'description.max' => __('keywords.description-max', ['max' => ':max']),
                    'rating.required' => __('keywords.rating-required'),
                    'product.required' => __('keywords.product-required'),
                ]
            );

            $review = new Review;
            $review->fill($fill);
            $review->product = $request->product;
            $review->user = Auth::user()->id;
            $review->save();
            toastr()->success(__('keywords.event-success'));
        }
        return back();
    }
}
