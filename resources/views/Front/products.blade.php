@extends('Front.main')
@section('title')
{{ $general->title }} -  @lang('keywords.products')
@endsection
@section('content')
<div id="page">
	<main class="bg_gray">
		<div class="bg_white">
			<div class="container margin_60_35">
			<h5 class="pb-3"></h5>
			<div class="row small-gutters">
                @foreach ($allProducts as $item)
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure>
						@if ($item->discount != null)
							<span class="ribbon off">-{{ discount($item->price, $item->discount) }}%</span>
						@endif
							<a href="{{ route('Front.single', [$item->getCategory->slug, $item->slug]) }}">
								<img class="img-fluid lazy" src="{{ asset(firstImage($item->images)) }}" data-src="{{ asset(firstImage($item->images)) }}" alt="">
							</a>
						</figure>
						@if (round($item->reviews()->avg('rating')) == 0)
					<div class="rating">
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i> ({{ $item->reviews->count() }})
					</div>
					@elseif(round($item->reviews()->avg('rating')) == 1)
					<div class="rating">
						<i class="icon-star voted"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i> ({{ $item->reviews->count() }})
					</div>
					@elseif(round($item->reviews()->avg('rating')) == 2)
					<div class="rating">
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i> ({{ $item->reviews->count() }})
					</div>
					@elseif(round($item->reviews()->avg('rating')) == 3)
					<div class="rating">
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i> ({{ $item->reviews->count() }})
					</div>
					@elseif(round($item->reviews()->avg('rating')) == 4)
					<div class="rating">
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star"></i> ({{ $item->reviews->count() }})
					</div>
					@elseif(round($item->reviews()->avg('rating')) == 5)
					<div class="rating">
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i>
						<i class="icon-star voted"></i> ({{ $item->reviews->count() }})
					</div>
					@endif
						<a href="{{ route('Front.single', [$item->getCategory->slug, $item->slug]) }}">
							<h3>{{ $item->title }}</h3>
						</a>
						<div class="price_box">
						@if ($item->discount != null)
							<span class="new_price">{{ $item->discount }} ₺</span>
							<span class="old_price">{{ $item->price }} ₺</span>
						@else
							<span class="new_price">{{ $item->price }} ₺</span>
						@endif
						</div>
					</div>
				</div>
                @endforeach			
			</div>
			{{ $allProducts->links('pagination::default') }}
			</div>
		</div>
	</main>
</div>
@endsection