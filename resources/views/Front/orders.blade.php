@extends('Front.main')
@section('title')
{{ $general->title }} - @lang('keywords.my-orders')
@endsection
@section('content')
<style>
.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #004dda
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #004dda;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
}

.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
}

.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
}

ul.row,
ul.row-sm {
    list-style: none;
    padding: 0
}

.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

.btn-warning {
    color: #ffffff;
    background-color: #004dda;
    border-color: #004dda;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #004dda;
    border-color: #004dda;
    border-radius: 1px
}
</style>
<div id="page">
	<main class="bg_gray">
		<div class="container margin_30">
		<div class="page_header">
			<h1>@lang('keywords.my-orders')</h1>
		</div>
		<div class="container">
            @if ($orders->count() > 0)
			@foreach ($orders as $order)
			<article class="card">
					<div class="card-body">
						<h5>@lang('keywords.order-number') {{ $order->id }}</h5><br>
						<article class="card">
							<div class="card-body row">
								<div class="col"> <strong>@lang('keywords.order-time')</strong> <br>{{ $order->created_at->diffForHumans() }} </div>
								<div class="col"> <strong>@lang('keywords.order-adress')</strong><br> {{ $order->adress }} </div>
								<div class="col"> <strong>@lang('keywords.status')</strong> <br> 
								@if ($order->status == 1)
									@lang('keywords.order-okey')
									@elseif ($order->status == 2)
									@lang('keywords.wait-ready')
									@elseif ($order->status == 3)
									@lang('keywords.cargo')
									@elseif ($order->status == 4)
									@lang('keywords.order-user-okey')
								@endif 
								</div>
								<div class="col"> <strong>@lang('keywords.tracking')</strong> <br> @if ($order->cargo == null)
									@lang('keywords.no-cargo')
									@else
									{{ $order->cargo }}
									@endif
							</div>
							</div>
						</article>
						@if ($order->status == 1)
							<div class="track">
							<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">@lang('keywords.order-okey')</span> </div>
							<div class="step"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">@lang('keywords.wait-ready')</span> </div>
							<div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">@lang('keywords.cargo')</span> </div>
							<div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">@lang('keywords.order-user-okey')</span> </div>
							</div>
						@elseif ($order->status == 2)
							<div class="track">
							<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">@lang('keywords.order-okey')</span> </div>
							<div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">@lang('keywords.wait-ready')</span> </div>
							<div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">@lang('keywords.cargo')</span> </div>
							<div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">@lang('keywords.order-user-okey')</span> </div>
							</div>
						@elseif ($order->status == 3)
							<div class="track">
							<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">@lang('keywords.order-okey')</span> </div>
							<div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">@lang('keywords.wait-ready')</span> </div>
							<div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">@lang('keywords.cargo')</span> </div>
							<div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">@lang('keywords.order-user-okey')</span> </div>
							</div>
						@elseif ($order->status == 4)
							<div class="track">
							<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">@lang('keywords.order-okey')</span> </div>
							<div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">@lang('keywords.wait-ready')</span> </div>
							<div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">@lang('keywords.cargo')</span> </div>
							<div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">@lang('keywords.order-user-okey')</span> </div>
							</div>
						@endif
						<br>
						<hr>
						<ul class="row">
							@foreach ($order->getOrders as $orderItems)
							<li class="col-md-4">
								<figure class="itemside mb-3">
									<div class="aside"><img src="{{ asset(firstImage($orderItems->getProductData->images)) }}" class="img-sm border"></div>
									<figcaption class="info align-self-center">
										<a target="_blank" href="{{ route('Front.single', [$orderItems->getProductData->getCategory->slug, $orderItems->getProductData->slug]) }}">
											<p class="title">{{ $orderItems->quantity }}x {{ $orderItems->getProductData->title }} </a><br> {{ $orderItems->size." - ".$orderItems->color }} <br> <span class="text-muted">{{ $orderItems->quantity*$orderItems->price }} ₺</span>
									</figcaption>
								</figure>
							</li>
							@endforeach
						</ul>
						<h5 style="font-weight: bold;" class="text-right"> @lang('keywords.total') : {{ $order->total }} ₺</h5>
					</div>
				</article>
				<br>
				@endforeach
                @else
                <article class="card">
					<div class="card-body">
                        <br>
                        <h5 class="text-center">@lang('keywords.not-see-order')</h5>
                        <br>
                        <center>
                            <a href="{{ route('Front.main') }}" class="btn_1">@lang('keywords.go-to-trade')</a>
                        </center>
					</div>
				</article>
                @endif
			</div>
		</div>

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