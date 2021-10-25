@extends('Front.main')
@section('title')
{{ $general->title }} - @lang('keywords.my-cart')
@endsection
@section('content')
@if (Cart::instance('cart')->content()->count() > 0)
<div id="page">
	<main class="bg_gray">
		<div class="container margin_30">
			<div class="page_header">
				<h1>@lang('keywords.my-cart')</h1>
			</div>
			<table class="table table-striped cart-list">
				<thead>
					<tr>
						<th>
							@lang('keywords.product-name')
						</th>
						<th>
							@lang('keywords.product-price')
						</th>
						<th>
							@lang('keywords.product-quantity')
						</th>
						<th>
							@lang('keywords.sub-total')
						</th>
						<th>

						</th>
					</tr>
				</thead>
				<tbody>
					@foreach (Cart::instance('cart')->content() as $cart)
					<tr>
						<td>
							<div class="thumb_cart">
								<img src="{{ asset(firstImage($cart->model->images)) }}"
									data-src="{{ asset(firstImage($cart->model->images)) }}" class="lazy" alt="Image">
							</div>
							<span class="item_cart"><a href="{{ route('Front.single', [$cart->model->getCategory->slug, $cart->model->slug]) }}">{{ $cart->model->title }}</a> ({{ $cart->options->color }} - {{
								$cart->options->size }})</span>
						</td>
						<td>
							<strong>{{ $cart->price }} ₺</strong>
						</td>
						<td>
							<form action="{{ route('Front.cart.update', $cart->rowId) }}" method="POST">
								@csrf
								<div class="numbers-row">
									<input type="text" value="{{ $cart->qty }}" id="quantity_1" class="qty2" name="qty">
									<div class="inc button_inc">+</div>
									<div class="dec button_inc">-</div>
								</div>
								<button class="cartBtn">@lang('keywords.update')</button>
							</form>
						</td>
						<td>
							<strong>{{ $cart->price*$cart->qty }} ₺</strong>
						</td>
						<td class="options">
							<a href="{{ route('Front.cart.delete', $cart->rowId) }}"><i class="ti-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			<div class="row add_top_30 flex-sm-row-reverse cart_actions">
				<div class="col-sm-4 text-right">
					<a href="{{ route('Front.cart.destroy') }}" class="btn_1 gray">@lang('keywords.clean')</a>
				</div>
				{{-- <div class="col-sm-8">
					<div class="apply-coupon">
						<div class="form-group form-inline">
							<input type="text" name="coupon-code" value="" placeholder="Promo code"
								class="form-control"><button type="button" class="btn_1 outline">Apply Coupon</button>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
		<div class="box_cart">
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-xl-4 col-lg-4 col-md-6">
						<ul>
							<li>
								<span>@lang('keywords.total')</span> {{ Cart::instance('cart')->subtotal() }} ₺
							</li>
						</ul>
						@if (!Auth::user())
						<a href="{{ route('Front.login') }}" class="btn_1 full-width cart">@lang('keywords.login-user')</a>
						@else
						<a href="{{ route('Front.check') }}" class="btn_1 full-width cart">@lang('keywords.go-to-pay')</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
@else
	<div id="page">
	<main class="bg_gray">
		<div class="container">
            <div class="row justify-content-center">
				<div class="col-md-5">
					<div id="confirm">
						<img width="200" src="{{ asset('Front') }}/img/basket.png" alt="">
					<h5>@lang('keywords.cart-empty')</h5>
					<a href="{{ route('Front.main') }}" class="btn_1">@lang('keywords.home')</a>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>

@endif
@endsection