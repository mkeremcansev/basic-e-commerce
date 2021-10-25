<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishlistController extends Controller
{
    public function create($id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount != null) {
            $price = $product->discount;
        } else {
            $price = $product->price;
        }
        Cart::instance('wishlist')->add($product->id, $product->title, 1, $price)->associate('App\Models\Product');
        toastr()->success(__('keywords.event-success'));
        return back();
    }

    public function delete($id)
    {
        Cart::instance('wishlist')->remove($id);
        toastr()->success(__('keywords.event-success'));
        return back();
    }

    public function destroy()
    {
        Cart::instance('wishlist')->destroy();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
}
