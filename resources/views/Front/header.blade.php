<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Ansonika">
	<title>@yield('title')</title>
	<link rel="shortcut icon" href="{{ asset($general->favicon) }}" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/bootstrap.custom.min.css" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/style.css" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/home_1.css" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/custom.css" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/contact.css" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/about.css" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/blog.css" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/faq.css" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/error_track.css" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/cart.css" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/product_page.css" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/checkout.css" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/listing.css" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/leave_review.css" rel="stylesheet">
	<link href="{{ asset('Front') }}/css/checkout.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	{{-- <link href="{{ asset('Front') }}/css/account.css" rel="stylesheet"> --}}
	@toastr_css
</head>
<body>
	<div id="page">
		<header class="version_1">
			<div class="layer"></div>
			<div class="main_header">
				<div class="container">
					<div class="row small-gutters">
						<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
							<div id="logo">
								<a href="{{ route('Front.main') }}"><img src="{{ asset($general->logo) }}"
										alt="" width="200"></a>
							</div>
						</div>
						<nav class="col-xl-6 col-lg-7">
							<a class="open_close" href="javascript:void(0);">
								<div class="hamburger hamburger--spin">
									<div class="hamburger-box">
										<div class="hamburger-inner"></div>
									</div>
								</div>
							</a>
							<div class="main-menu">
								<div id="header_menu">
									<a href="{{ route('Front.main') }}"><img
											src="{{ asset($general->logo) }}" alt="" width="100"
											height="35"></a>
									<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
								</div>
								<ul>
									<li>
										<a href="{{ route('Front.main') }}">@lang('keywords.home')</a>
									</li>
									<li>
										<a href="{{ route('Front.products') }}">@lang('keywords.products')</a>
									</li>
									<li>
										<a href="{{ route('Front.about') }}">@lang('keywords.about')</a>
									</li>
									<li>
										<a href="{{ route('Front.faq') }}">@lang('keywords.faq')</a>
									</li>
									<li>
										<a href="{{ route('Front.contact') }}">@lang('keywords.contact')</a>
									</li>
								</ul>
							</div>
						</nav>
						<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
							<a class="phone_top"
								href="tel://{{ $general->phone }}"><strong><span>@lang('keywords.need-help')</span>+9{{ $general->phone }}</strong></a>
						</div>
					</div>
				</div>
			</div>
			<div class="main_nav Sticky">
				<div class="container">
					<div class="row small-gutters">
						<div class="col-xl-3 col-lg-3 col-md-3">
							<nav class="categories">
								<ul class="clearfix">
									<li><span>
											<a href="#">
												<span class="hamburger hamburger--spin">
													<span class="hamburger-box">
														<span class="hamburger-inner"></span>
													</span>
												</span>
												@lang('keywords.categories')
											</a>
										</span>
										<div id="menu">
											<ul>
												@foreach ($categorys as $category)
													
												
												<li><span><a href="{{ route('Front.category.products', $category->slug) }}">{{ $category->title }}</a></span>
												</li>
												@endforeach
											</ul>
										</div>
									</li>
								</ul>
							</nav>
						</div>
						<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
							<div class="custom-search-input">
								<form action="{{ route('Front.search') }}" method="POST">
									@csrf
								<input type="text" name="search" placeholder="@lang('keywords.search', ['total' => $products->count()])">
								<button type="submit"><i class="header-icon_search_custom"></i></button>
								</form>
							</div>
						</div>
						<div class="col-xl-3 col-lg-2 col-md-3">
							<ul class="top_tools">
								@if (Cart::instance('cart')->content()->count() > 0)
								<li>
									<div class="dropdown dropdown-cart">
										<a href="{{ route('Front.cart') }}" class="cart_bt"><strong>{{ Cart::instance('cart')->content()->count() }}</strong></a>
										<div class="dropdown-menu">
											<ul>
											@foreach (Cart::instance('cart')->content() as $cart)
												<li>
													<a href="{{ route('Front.single', [$cart->model->getCategory->slug, $cart->model->slug]) }}">
														<figure><img
																src="{{ asset(firstImage($cart->model->images)) }}"
																data-src="{{ asset(firstImage($cart->model->images)) }}"
																width="50" height="50" class="lazy"></figure>
														<strong><span>{{ $cart->qty }}x {{ $cart->model->title }}</span>{{ $cart->price }} ₺</strong>
													</a>
													<a href="{{ route('Front.cart.delete', $cart->rowId) }}" class="action"><i class="ti-trash"></i></a>
												</li>
											@endforeach
											</ul>
											<div class="total_drop">
												<div class="clearfix"><strong>@lang('keywords.total')</strong><span>{{ Cart::instance('cart')->subtotal() }} ₺</span></div>
												<a href="{{ route('Front.cart') }}" class="btn_1 outline">@lang('keywords.cart-go')</a>
												<a href="{{ route('Front.main') }}" class="btn_1">@lang('keywords.trade-go')</a>
											</div>
										</div>
									</div>
								</li>
								@else
								<li>
									<div class="dropdown dropdown-cart">
										<a href="{{ route('Front.cart') }}" class="cart_bt"><strong>{{ Cart::instance('cart')->content()->count() }}</strong></a>
										<div class="dropdown-menu">
											<center>
											<img width="100" src="{{ asset('Front') }}/img/basket.png" alt="">
											<h5>@lang('keywords.cart-empty')</h5>
											</center>
										</div>
									</div>
								</li>
								@endif
								<li>
									<a href="{{ route('Front.wishlist') }}" class="wishlist"></a>
								</li>
								<li>
									<div class="dropdown dropdown-access">
										<a href="
											@if (Auth::user())
												{{ route('Front.account') }}
											@else
												{{ route('Front.login') }}
											@endif
											" class="access_link"></a>
										<div class="dropdown-menu">
											@if (!Auth::user())
											<a href="{{ route('Front.login') }}" class="btn_1 btn-mb-5">@lang('keywords.login')</a>
											<a href="{{ route('Front.register') }}" class="btn_1">@lang('keywords.register')</a>
											@endif
											@if (Auth::user())
											<a href="{{ route('Front.account') }}" class="btn_1">@lang('keywords.my-account')</a>
											<ul>
												<li>
													<a href="{{ route('Front.orders') }}"><i class="ti-angle-double-right"></i>@lang('keywords.my-orders')</a>
													<a href="{{ route('Front.reviews') }}"><i class="ti-angle-double-right"></i>@lang('keywords.my-reviews')</a>
													<a href="{{ route('Front.logout') }}"><i class="ti-angle-double-right"></i>@lang('keywords.logout')</a>
												</li>
											</ul>
											@endif
										</div>
									</div>
								</li>
								<li>
									<a href="javascript:void(0);" class="btn_search_mob"><span>@lang('keywords.search-button')</span></a>
								</li>
								<li>
									<a href="#menu" class="btn_cat_mob">
										<div class="hamburger hamburger--spin" id="hamburger">
											<div class="hamburger-box">
												<div class="hamburger-inner"></div>
											</div>
										</div>
										@lang('keywords.categories')
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="search_mob_wp">
					<form action="{{ route('Front.search') }}" method="POST">
						@csrf
					<input type="text" name="search" class="form-control" placeholder="@lang('keywords.search', ['total' => $products->count()])">
					<input type="submit" class="btn_1 full-width" value="@lang('keywords.search-button')">
					</form>
				</div>
			</div>
		</header>
								