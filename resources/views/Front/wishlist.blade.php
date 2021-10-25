@extends('Front.main')
@section('title')
{{ $general->title }} - @lang('keywords.my-favorites')
@endsection
@section('content')
@if (Cart::instance('wishlist')->content()->count() > 0)
<div id="page">
	<main class="bg_gray">
		<div class="container margin_30">
		<div class="page_header">
			<h1>@lang('keywords.my-favorites')</h1>
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
										
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach (Cart::instance('wishlist')->content() as $wishlist)
								<tr>
									<td>
										<div class="thumb_cart">
											<img src="{{ asset(firstImage($wishlist->model->images)) }}" data-src="{{ asset(firstImage($wishlist->model->images)) }}" class="lazy" alt="Image">
										</div>
										<span class="item_cart"><a href="{{ route('Front.single', [$wishlist->model->getCategory->slug, $wishlist->model->slug]) }}">{{ $wishlist->model->title }}</a></span>
									</td>
									<td>
										<strong>{{ $wishlist->price }} ₺</strong>
									</td>
									<td class="options">
										<a href="{{ route('Front.wishlist.delete', $wishlist->rowId) }}"><i class="ti-trash"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>

						<div class="row add_top_30 flex-sm-row-reverse cart_actions">
						<div class="col-sm-4 text-right">
							<a href="{{ route('Front.wishlist.destroy') }}" class="btn_1 gray">@lang('keywords.clean')</a>
						</div>
					</div>
		</div>
		<div class="box_cart"></div>
	</main>
</div>
@else
	<div id="page">
	<main class="bg_gray">
		<div class="container">
            <div class="row justify-content-center">
				<div class="col-md-5">
					<div id="confirm">
						<img width="200" src="{{ asset('Front') }}/img/heart.png" alt="">
					<h5>@lang('keywords.wishlist-empty')</h5>
					<a href="{{ route('Front.main') }}" class="btn_1">@lang('keywords.home')</a>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>

@endif
@endsection