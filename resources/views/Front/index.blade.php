@extends('Front.main')
@section('title')
{{ $general->title }} - @lang('keywords.home')
@endsection
@section('content')
<main>
@include('Front.slider')
	<div class="container margin_60_35">
		<div class="main_title">
			<h2>@lang('keywords.top-selling')</h2>
		</div>
		<div class="owl-carousel owl-theme products_carousel">
			@foreach ($bests as $product)
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





		<div class="container margin_60_35">
		<div class="main_title">
			<h2>@lang('keywords.popular-products')</h2>
		</div>
		<div class="owl-carousel owl-theme products_carousel">
			@foreach ($populars as $product)
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

		<div class="container margin_60_35">
		<div class="main_title">
			<h2>@lang('keywords.opportunity-products')</h2>
		</div>
		<div class="owl-carousel owl-theme products_carousel">
			@foreach ($featureds as $product)
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
	<div class="bg_gray">
		<div class="container margin_30">
			<div id="brands" class="owl-carousel owl-theme">
				@foreach ($brands as $brand)
				<div class="item">
					<a href="{{ route('Front.brand.products', $brand->slug) }}"><img src="{{ asset($brand->image) }}" data-src="{{ asset($brand->image) }}" alt="" class="owl-lazy"></a>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</main>
@endsection