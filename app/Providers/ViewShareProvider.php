<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\ServiceProvider;
use App\Models\General;
use App\Models\Slider;
use App\Models\Faq;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Models\Review;
use App\Models\Contract;
use App\Models\About;

class ViewShareProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            view()->share('general', General::find(1));
            view()->share('payment', Payment::find(1));
            view()->share('sliders', Slider::orderBy('id', 'DESC')->get());
            view()->share('contacts', Contact::orderBy('id', 'DESC')->get());
            view()->share('categorys', Category::orderBy('id', 'ASC')->get());
            view()->share('faq', Faq::orderBy('id', 'DESC')->get());
            view()->share('colors', Color::orderBy('id', 'ASC')->get());
            view()->share('sizes', Size::orderBy('id', 'ASC')->get());
            view()->share('bests', Product::where('best', 1)->orderBy('id', 'DESC')->get());
            view()->share('populars', Product::where('popular', 1)->orderBy('id', 'DESC')->get());
            view()->share('featureds', Product::where('featured', 1)->orderBy('id', 'DESC')->get());
            view()->share('randoms', Product::inRandomOrder()->get());
            view()->share('products', Product::orderBy('id', 'DESC')->get());
            view()->share('brands', Brand::orderBy('id', 'DESC')->get());
            view()->share('users', User::orderBy('id', 'DESC')->get());
            view()->share('reviews', Review::orderBy('id', 'DESC')->get());
            view()->share('allOrders', Order::orderBy('id', 'DESC')->get());
            view()->share('contracts', Contract::orderBy('id', 'DESC')->get());
            view()->share('abouts', About::orderBy('id', 'ASC')->get());
        }
    }
}
