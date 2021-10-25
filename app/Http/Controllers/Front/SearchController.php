<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if ($request->isMethod('GET')) {
            toastr()->error(__('keywords.event-error'));
            return redirect()->route('Front.main');
        } else {
            $data = [];
            if ($request->search != "") {
                if ($request->has('search')) {
                    $search = $request->search;
                    $data = Product::select('id', 'title', 'slug', 'category', 'description', 'price', 'discount', 'color', 'size', 'brand', 'code', 'images')
                        ->where('title', 'LIKE', "%$search%")
                        ->orWhere('description', 'LIKE', "%$search%")
                        ->orWhere('price', 'LIKE', "%$search%")
                        ->orWhere('discount', 'LIKE', "%$search%")
                        ->orWhere('color', 'LIKE', "%$search%")
                        ->orWhere('size', 'LIKE', "%$search%")
                        ->orWhere('brand', 'LIKE', "%$search%")
                        ->orWhere('code', 'LIKE', "%$search%")
                        ->get();
                }
                return view('Front.search', compact('data', 'search'));
            } else {
                toastr()->error(__('keywords.event-error'));
                return redirect()->route('Front.main');
            }
        }
    }
}
