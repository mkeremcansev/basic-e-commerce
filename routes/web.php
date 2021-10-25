<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Front\IndexController::class, 'main'])->name('Front.main');
Route::get('/contact', [\App\Http\Controllers\Front\IndexController::class, 'contact'])->name('Front.contact');
Route::get('/about-us', [\App\Http\Controllers\Front\IndexController::class, 'about'])->name('Front.about');
Route::get('/products', [\App\Http\Controllers\Front\IndexController::class, 'products'])->name('Front.products');
Route::get('/faq', [\App\Http\Controllers\Front\IndexController::class, 'faq'])->name('Front.faq');
Route::post('/contact', [\App\Http\Controllers\Front\IndexController::class, 'saveContact'])->name('Contact.save');
Route::get('/my-reviews', [\App\Http\Controllers\Front\AccountController::class, 'reviews'])->name('Front.reviews');
Route::get('/my-orders', [\App\Http\Controllers\Front\PaymentController::class, 'orders'])->name('Front.orders');

Route::get('/register', [\App\Http\Controllers\Front\IndexController::class, 'register'])->name('Front.register');
Route::post('/register', [\App\Http\Controllers\Front\RegisterController::class, 'register'])->name('Register.save');

Route::get('/checkout', [\App\Http\Controllers\Front\PaymentController::class, 'check'])->name('Front.check')->middleware('auth');
Route::get('/success', [\App\Http\Controllers\Front\PaymentController::class, 'success'])->name('Front.success')->middleware('auth');
Route::match(['GET', 'POST'], '/payment-form', [\App\Http\Controllers\Front\PaymentController::class, 'payment'])->name('Front.payment')->middleware('auth');
Route::match(['GET', 'POST'], '/payment-create', [\App\Http\Controllers\Front\PaymentController::class, 'create'])->name('Front.order.create')->middleware('auth');

Route::get('/my-account', [\App\Http\Controllers\Front\AccountController::class, 'page'])->name('Front.account');
Route::post('/my-account/password', [\App\Http\Controllers\Front\AccountController::class, 'change'])->name('Front.password.change');
Route::post('/my-account/adress', [\App\Http\Controllers\Front\AccountController::class, 'adress'])->name('Front.adress.create');

Route::get('/login', [\App\Http\Controllers\Front\IndexController::class, 'login'])->name('Front.login');
Route::post('/login', [\App\Http\Controllers\Front\LoginController::class, 'login'])->name('Login.save');
Route::get('/logout', [\App\Http\Controllers\Front\LoginController::class, 'logout'])->name('Front.logout');

Route::get('/wishlist', [\App\Http\Controllers\Front\IndexController::class, 'wishlist'])->name('Front.wishlist');
Route::get('/wishlist-delete/{id}', [\App\Http\Controllers\Front\WishlistController::class, 'delete'])->name('Front.wishlist.delete');
Route::get('/wishlist/{id}', [\App\Http\Controllers\Front\WishlistController::class, 'create'])->name('Front.wishlist.create');
Route::get('/wishlist-destroy', [\App\Http\Controllers\Front\WishlistController::class, 'destroy'])->name('Front.wishlist.destroy');

Route::get('/cart', [\App\Http\Controllers\Front\IndexController::class, 'cart'])->name('Front.cart');
Route::post('/cart', [\App\Http\Controllers\Front\CartController::class, 'create'])->name('Front.cart.create');
Route::get('/cart-delete/{id}', [\App\Http\Controllers\Front\CartController::class, 'delete'])->name('Front.cart.delete');
Route::get('/cart-destroy', [\App\Http\Controllers\Front\CartController::class, 'destroy'])->name('Front.cart.destroy');
Route::post('/cart-update/{id}', [\App\Http\Controllers\Front\CartController::class, 'update'])->name('Front.cart.update');
Route::match(['GET', 'POST'], '/search', [\App\Http\Controllers\Front\SearchController::class, 'search'])->name('Front.search');
Route::post('/review-create', [\App\Http\Controllers\Front\ReviewController::class, 'create'])->name('Front.review');

Route::prefix('e-admin')->middleware('isAdmin')->group(
    function () {
        Route::get('/', [\App\Http\Controllers\Back\IndexController::class, 'main'])->name('Back.main');
        Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('Back.log');;

        Route::get('/settings', [\App\Http\Controllers\Back\IndexController::class, 'settings'])->name('Back.settings');
        Route::post('/settings-update', [\App\Http\Controllers\Back\GeneralController::class, 'update'])->name('Update.settings');

        Route::get('/payment', [\App\Http\Controllers\Back\IndexController::class, 'payment'])->name('Back.payment');
        Route::post('/payment-update', [\App\Http\Controllers\Back\PaymentController::class, 'update'])->name('Update.payment');

        Route::get('/slider', [\App\Http\Controllers\Back\SliderController::class, 'list'])->name('Back.list.slider');
        Route::get('/slider-create', [\App\Http\Controllers\Back\SliderController::class, 'slider'])->name('Create.slider.get');
        Route::post('/slider-create', [\App\Http\Controllers\Back\SliderController::class, 'create'])->name('Create.slider');
        Route::get('/slider-update/{id}', [\App\Http\Controllers\Back\SliderController::class, 'up'])->name('Update.slider.get');
        Route::post('/slider-update/{id}', [\App\Http\Controllers\Back\SliderController::class, 'update'])->name('Update.slider');
        Route::get('/slider-delete/{id}', [\App\Http\Controllers\Back\SliderController::class, 'delete'])->name('Delete.slider');

        Route::get('/contact/{id}', [\App\Http\Controllers\Back\ContactController::class, 'detail'])->name('Detail.contact');
        Route::get('/contact-delete/{id}', [\App\Http\Controllers\Back\ContactController::class, 'delete'])->name('Delete.contact');

        Route::get('/products', [\App\Http\Controllers\Back\ProductController::class, 'list'])->name('Back.list.product');
        Route::get('/product-create', [\App\Http\Controllers\Back\ProductController::class, 'product'])->name('Create.product.get');
        Route::post('/product-create', [\App\Http\Controllers\Back\ProductController::class, 'create'])->name('Create.product');
        Route::get('/product-update/{id}', [\App\Http\Controllers\Back\ProductController::class, 'up'])->name('Update.product.get');
        Route::post('/product-update/{id}', [\App\Http\Controllers\Back\ProductController::class, 'update'])->name('Update.product');
        Route::get('/product-delete/{id}', [\App\Http\Controllers\Back\ProductController::class, 'delete'])->name('Delete.product');
        Route::post('/product-image/{id}', [\App\Http\Controllers\Back\ProductController::class, 'image'])->name('Update.product.image');

        Route::get('/brand', [\App\Http\Controllers\Back\BrandController::class, 'list'])->name('Back.list.brand');
        Route::get('/brand-create', [\App\Http\Controllers\Back\BrandController::class, 'brand'])->name('Create.brand.get');
        Route::post('/brand-create', [\App\Http\Controllers\Back\BrandController::class, 'create'])->name('Create.brand');
        Route::get('/brand-update/{id}', [\App\Http\Controllers\Back\BrandController::class, 'up'])->name('Update.brand.get');
        Route::post('/brand-update/{id}', [\App\Http\Controllers\Back\BrandController::class, 'update'])->name('Update.brand');
        Route::get('/brand-delete/{id}', [\App\Http\Controllers\Back\BrandController::class, 'delete'])->name('Delete.brand');

        Route::get('/category', [\App\Http\Controllers\Back\CategoryController::class, 'list'])->name('Back.list.category');
        Route::get('/category-create', [\App\Http\Controllers\Back\CategoryController::class, 'category'])->name('Create.category.get');
        Route::post('/category-create', [\App\Http\Controllers\Back\CategoryController::class, 'create'])->name('Create.category');
        Route::get('/category-update/{id}', [\App\Http\Controllers\Back\CategoryController::class, 'up'])->name('Update.category.get');
        Route::post('/category-update/{id}', [\App\Http\Controllers\Back\CategoryController::class, 'update'])->name('Update.category');
        Route::get('/category-delete/{id}', [\App\Http\Controllers\Back\CategoryController::class, 'delete'])->name('Delete.category');

        Route::get('/faq', [\App\Http\Controllers\Back\FaqController::class, 'list'])->name('Back.list.faq');
        Route::get('/faq-create', [\App\Http\Controllers\Back\FaqController::class, 'faq'])->name('Create.faq.get');
        Route::post('/faq-create', [\App\Http\Controllers\Back\FaqController::class, 'create'])->name('Create.faq');
        Route::get('/faq-update/{id}', [\App\Http\Controllers\Back\FaqController::class, 'up'])->name('Update.faq.get');
        Route::post('/faq-update/{id}', [\App\Http\Controllers\Back\FaqController::class, 'update'])->name('Update.faq');
        Route::get('/faq-delete/{id}', [\App\Http\Controllers\Back\FaqController::class, 'delete'])->name('Delete.faq');

        Route::get('/color', [\App\Http\Controllers\Back\ColorController::class, 'list'])->name('Back.list.color');
        Route::get('/color-create', [\App\Http\Controllers\Back\ColorController::class, 'color'])->name('Create.color.get');
        Route::post('/color-create', [\App\Http\Controllers\Back\ColorController::class, 'create'])->name('Create.color');
        Route::get('/color-update/{id}', [\App\Http\Controllers\Back\ColorController::class, 'up'])->name('Update.color.get');
        Route::post('/color-update/{id}', [\App\Http\Controllers\Back\ColorController::class, 'update'])->name('Update.color');
        Route::get('/color-delete/{id}', [\App\Http\Controllers\Back\ColorController::class, 'delete'])->name('Delete.color');

        Route::get('/size', [\App\Http\Controllers\Back\SizeController::class, 'list'])->name('Back.list.size');
        Route::get('/size-create', [\App\Http\Controllers\Back\SizeController::class, 'size'])->name('Create.size.get');
        Route::post('/size-create', [\App\Http\Controllers\Back\SizeController::class, 'create'])->name('Create.size');
        Route::get('/size-update/{id}', [\App\Http\Controllers\Back\SizeController::class, 'up'])->name('Update.size.get');
        Route::post('/size-update/{id}', [\App\Http\Controllers\Back\SizeController::class, 'update'])->name('Update.size');
        Route::get('/size-delete/{id}', [\App\Http\Controllers\Back\SizeController::class, 'delete'])->name('Delete.size');

        Route::get('/contract', [\App\Http\Controllers\Back\ContractController::class, 'list'])->name('Back.list.contract');
        Route::get('/contract-create', [\App\Http\Controllers\Back\ContractController::class, 'contract'])->name('Create.contract.get');
        Route::post('/contract-create', [\App\Http\Controllers\Back\ContractController::class, 'create'])->name('Create.contract');
        Route::get('/contract-update/{id}', [\App\Http\Controllers\Back\ContractController::class, 'up'])->name('Update.contract.get');
        Route::post('/contract-update/{id}', [\App\Http\Controllers\Back\ContractController::class, 'update'])->name('Update.contract');

        Route::get('/about', [\App\Http\Controllers\Back\AboutController::class, 'list'])->name('Back.list.about');
        Route::get('/about-create', [\App\Http\Controllers\Back\AboutController::class, 'about'])->name('Create.about.get');
        Route::post('/about-create', [\App\Http\Controllers\Back\AboutController::class, 'create'])->name('Create.about');
        Route::get('/about-update/{id}', [\App\Http\Controllers\Back\AboutController::class, 'up'])->name('Update.about.get');
        Route::post('/about-update/{id}', [\App\Http\Controllers\Back\AboutController::class, 'update'])->name('Update.about');
        Route::get('/about-delete/{id}', [\App\Http\Controllers\Back\AboutController::class, 'delete'])->name('Delete.about');

        Route::get('/review', [\App\Http\Controllers\Back\ReviewController::class, 'list'])->name('Back.list.review');
        Route::get('/review-update/{id}', [\App\Http\Controllers\Back\ReviewController::class, 'detail'])->name('Detail.review');
        Route::get('/review-delete/{id}', [\App\Http\Controllers\Back\ReviewController::class, 'delete'])->name('Delete.review');
        Route::post('/review-update/{id}', [\App\Http\Controllers\Back\ReviewController::class, 'update'])->name('Update.review');

        Route::get('/users', [\App\Http\Controllers\Back\UserController::class, 'list'])->name('Back.list.user');
        Route::get('/user-delete/{id}', [\App\Http\Controllers\Back\UserController::class, 'delete'])->name('Delete.user');
        Route::get('/user-update/{id}', [\App\Http\Controllers\Back\UserController::class, 'detail'])->name('Detail.user');
        Route::post('/user-update/{id}', [\App\Http\Controllers\Back\UserController::class, 'update'])->name('Update.user');

        Route::get('/order', [\App\Http\Controllers\Back\OrderController::class, 'list'])->name('Back.list.order');
        Route::get('/order-update/{id}', [\App\Http\Controllers\Back\OrderController::class, 'detail'])->name('Detail.order');
        Route::post('/order-update/{id}', [\App\Http\Controllers\Back\OrderController::class, 'update'])->name('Update.order');

        Route::get('/logout', [\App\Http\Controllers\Back\LoginController::class, 'logout'])->name('Back.logout');
    }
);

Route::post('/res-password', [\App\Http\Controllers\Front\ResetPasswordController::class, 'resetPost'])->name('Front.resetPost');
Route::get('/reset/password', [\App\Http\Controllers\Front\ResetPasswordController::class, 'resetPassword'])->name('Front.resetPassword');
Route::post('/reset/password', [\App\Http\Controllers\Front\ResetPasswordController::class, 'resetSend'])->name('Front.resetSend');

Route::get('/e-admin/login', [\App\Http\Controllers\Back\IndexController::class, 'login'])->name('Back.login')->middleware('isLogin');
Route::post('/e-admin/login', [\App\Http\Controllers\Back\LoginController::class, 'login'])->name('Back.login.save')->middleware('isLogin');
Route::get('/contract/{txt}', [\App\Http\Controllers\Front\IndexController::class, 'contract'])->name('Front.contract.contracts');
Route::get('/brand/{text}', [\App\Http\Controllers\Front\IndexController::class, 'brand'])->name('Front.brand.products');
Route::get('/category/{slug}', [\App\Http\Controllers\Front\IndexController::class, 'category'])->name('Front.category.products');
Route::get('/{category}/{slug}', [\App\Http\Controllers\Front\IndexController::class, 'single'])->name('Front.single');

Route::get('/verification/verify/{code}', [\App\Http\Controllers\Front\VerificationController::class, 'verify'])->name('Front.verification');
Route::get('/reset/password/{code}', [\App\Http\Controllers\Front\ResetPasswordController::class, 'reset'])->name('Front.reset');
