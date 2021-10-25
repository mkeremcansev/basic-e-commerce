@extends('Front.main')
@section('title')
@if ($brandItems->count() > 0)
{{ $general->title }} - {{ $brandItems[0]->getBrand->title }}
@else
{{ $general->title }} - @lang('keywords.dont-brand')
@endif
@endsection
@section('content')
@if ($brandItems->count() > 0)
<div id="page">
	<main class="bg_gray">
		<div class="bg_white">
			<div class="container margin_60_35">
			<h5 class="pb-3"></h5>
			<div class="row small-gutters">
                @foreach ($brandItems as $product)
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure>
						@if ($product->discount != null)
							<span class="ribbon off">-{{ discount($product->price, $product->discount) }}%</span>
						@endif
							<a href="{{ route('Front.single', [$product->getCategory->slug, $product->slug]) }}">
								<img class="img-fluid lazy" src="{{ asset(firstImage($product->images)) }}" data-src="{{ asset(firstImage($product->images)) }}" alt="">
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
			{{ $brandItems->links('pagination::default') }}
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
						<img width="200" src="{{ asset('Front') }}/img/sorry.png" alt="">
					<h5>@lang('keywords.dont-brand')</h5>
					<a href="{{ route('Front.main') }}" class="btn_1">@lang('keywords.home')</a>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
@endif
@endsection