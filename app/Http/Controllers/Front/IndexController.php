<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Contract;

class IndexController extends Controller
{
    public function saveContact(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:25',
                'surname' => 'required|min:3|max:25',
                'title' => 'required|min:5|max:50',
                'content' => 'required|min:10|max:250',
            ],
            [
                'name.required' => __('keywords.name-required'),
                'surname.required' => __('keywords.surname-required'),
                'title.required' => __('keywords.title-required'),
                'content.required' => __('keywords.content-required'),
                'name.min' => __('keywords.name-min', ['min' => ':min']),
                'surname.min' => __('keywords.surname-min', ['min' => ':min']),
                'title.min' => __('keywords.title-min', ['min' => ':min']),
                'content.min' => __('keywords.content-min', ['min' => ':min']),
                'name.max' => __('keywords.name-max', ['max' => ':max']),
                'surname.max' => __('keywords.surname-max', ['max' => ':max']),
                'title.max' => __('keywords.title-max', ['max' => ':max']),
                'content.max' => __('keywords.content-max', ['max' => ':max']),
            ]
        );
        $contact = new Contact;
        $contact->fill($request->all());
        $contact->ip = $request->ip();
        $contact->info = $request->userAgent();
        $contact->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }

    public function main()
    {
        return view('Front.index');
    }
    public function contact()
    {
        return view('Front.contact');
    }
    public function about()
    {
        return view('Front.about');
    }
    public function products()
    {
        $allProducts = Product::orderBy('id', 'desc')->paginate(8);
        return view('Front.products', compact('allProducts'));
    }
    public function faq()
    {
        return view('Front.faq');
    }
    public function login()
    {
        if (auth()->check()) {
            return redirect()->route('Front.main');
        }
        return view('Front.login');
    }
    public function register()
    {
        if (auth()->check()) {
            return redirect()->route('Front.main');
        }
        return view('Front.register');
    }
    public function wishlist()
    {
        return view('Front.wishlist');
    }
    public function cart()
    {
        return view('Front.cart');
    }
    public function single($category, $slug)
    {
        $category = Category::where('slug', $category)->first() ?? abort(404);
        $single = Product::where('slug', $slug)->where('category', $category->id)->first() ?? abort(404);
        $similars = Product::where('category', $single->category)->get();
        return view('Front.single', compact('single', 'similars'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first() ?? abort(404);
        $categoryItems = Product::where('category', $category->id)->orderBy('id', 'desc')->paginate(8);
        return view('Front.category', compact('categoryItems'));
    }
    public function brand($text)
    {
        $brand = Brand::where('slug', $text)->first() ?? abort(404);
        $brandItems = Product::where('brand', $brand->id)->orderBy('id', 'desc')->paginate(8);
        return view('Front.brand', compact('brandItems'));
    }
    public function contract($txt)
    {
        $contract = Contract::where('slug', $txt)->first() ?? abort(404);
        return view('Front.contract', compact('contract'));
    }
}
