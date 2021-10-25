@extends('Front.main')
@section('title')
{{ $general->title }} - @lang('keywords.my-reviews')
@endsection
@section('content')
<div id="page">
	<main class="bg_gray">
		@if ($userReview->count() > 0)
		<div class="container margin_30">
			<div class="page_header">
				<h1>@lang('keywords.my-reviews')</h1>
			</div>
			
			<table class="table">
				<thead>
					<tr>
						<th scope="col">@lang('keywords.product-title')</th>
						<th scope="col">@lang('keywords.star')</th>
						<th scope="col">@lang('keywords.date')</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach ($userReview as $review)
					<tr>
						<td><a target="_blank"
								href="{{ route('Front.single', [$review->getProduct->getCategory->slug, $review->getProduct->slug]) }}">
								<div class="col"> <strong> {{ threeDot($review->getProduct->title) }} </strong></div>
							</a></td>
						<td>
							@if ($review->rating == 1)
							<i style="color: orange;" class="fa fa-star"></i>
							@elseif($review->rating == 2)
							<i style="color: orange;" class="fa fa-star"></i>
							<i style="color: orange;" class="fa fa-star"></i>
							@elseif($review->rating == 3)
							<i style="color: orange;" class="fa fa-star"></i>
							<i style="color: orange;" class="fa fa-star"></i>
							<i style="color: orange;" class="fa fa-star"></i>
							@elseif($review->rating == 4)
							<i style="color: orange;" class="fa fa-star"></i>
							<i style="color: orange;" class="fa fa-star"></i>
							<i style="color: orange;" class="fa fa-star"></i>
							<i style="color: orange;" class="fa fa-star"></i>
							@elseif($review->rating == 5)
							<i style="color: orange;" class="fa fa-star"></i>
							<i style="color: orange;" class="fa fa-star"></i>
							<i style="color: orange;" class="fa fa-star"></i>
							<i style="color: orange;" class="fa fa-star"></i>
							<i style="color: orange;" class="fa fa-star"></i>
							@endif
						</td>
						<td>{{ $review->created_at->diffForHumans() }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
									@else
			<div class="container margin_30">
			<div class="page_header">
				<h1>@lang('keywords.my-reviews')</h1>
			</div>
									<div class="container">
                <article class="card">
					<div class="card-body">
                        <br>
                        <h5 class="text-center">@lang('keywords.not-see-review')</h5>
                        <br>
                        <center>
                            <a href="{{ route('Front.main') }}" class="btn_1">@lang('keywords.home')</a>
                        </center>
					</div>
				</article>
				</div>
			</div>
                @endif
		<div class="container margin_60_35">
		<div class="main_title">
			<h2>@lang('keywords.random-products')</h2>
		</div>
		<div class="owl-carousel owl-theme products_carousel">
			@foreach ($randoms as $product)
			<div class="item">
				<div class="grid_item">
					<figure>
						@if ($product->discount != null)
							<span class="ribbon off">-{{ discount($product->price, $product->discount) }}%</span>
						@endif
						<a href="{{ route('Front.single', [$product->getCategory->slug, $product->slug]) }}">
							<img class="owl-lazy" src="{{ asset(firstImage($product->images)) }}"
								data-src="{{ asset(firstImage($product->images)) }}" alt="">
						</a>
					</figure>
					@if (round($product->reviews()->avg('rating')) == 0)
					<div class="rating">
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i> ({{ $product->reviews->count() }})
					</div>
					@elseif(round($product->reviews()->avg('rating')) == 1)
					<div class="rating">
						<i class="icon-star voted"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i> ({{ $product->reviews->count() }})
					</div>
					@elseif(round($product->reviews()->avg('rating')) == 2)
					<div class="rating">
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i> ({{ $product->reviews->count() }})
					</div>
					@elseif(round($product->reviews()->avg('rating')) == 3)
					<div class="rating">
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i> ({{ $product->reviews->count() }})
					</div>
					@elseif(round($product->reviews()->avg('rating')) == 4)
					<div class="rating">
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star"></i> ({{ $product->reviews->count() }})
					</div>
					@elseif(round($product->reviews()->avg('rating')) == 5)
					<div class="rating">
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i> ({{ $product->reviews->count() }})
					</div>
					@endif
					<a href="{{ route('Front.single', [$product->getCategory->slug, $product->slug]) }}">
						<h3>{{ $product->title }}</h3>
					</a>
					<div class="price_box">
						@if ($product->discount != null)
							<span class="new_price">{{ $product->discount }} ₺</span>
							<span class="old_price">{{ $product->price }} ₺</span>
						@else
							<span class="new_price">{{ $product->price }} ₺</span>
						@endif
					</div>
				</div>
			</div>
		@endforeach
		</div>
	</div>
	</main>
</div>
@endsection