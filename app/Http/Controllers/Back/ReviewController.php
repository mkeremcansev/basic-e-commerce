<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function list()
    {
        return view('Back.reviews');
    }
    public function detail($id)
    {
        $review = Review::findOrFail($id);
        return view('Back.detail.review', compact('review'));
    }
    public function delete($id)
    {
        Review::findOrFail($id)->delete();
        toastr()->success(__('keywords.event-success'));
        return redirect()->route('Back.list.review');
    }
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->status = $request->status;
        $review->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
}
