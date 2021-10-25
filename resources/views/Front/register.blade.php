@extends('Front.main')
@section('title')
{{ $general->title }} - @lang('keywords.register')
@endsection
@section('content')
    <div id="page">
	
	<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
	</div>
	<!-- /page_header -->
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">@lang('keywords.register')</h3>
                                <form action="{{ route('Register.save') }}" method="POST">
                                    @csrf
                                    <div class="form_container">
                                        <div class="form-group">
                                            <span class="errorMessages">{{ $errors->first('email') }}</span>
                                            <input type="email" class="form-control" name="email" placeholder="@lang('keywords.email')">
                                        </div>
                                        <div class="form-group">
                                            <span class="errorMessages">{{ $errors->first('name') }}</span>
                                            <input type="text" class="form-control" name="name" placeholder="@lang('keywords.name')">
                                        </div>
                                        <div class="form-group">
                                            <span class="errorMessages">{{ $errors->first('surname') }}</span>
                                            <input type="text" class="form-control" name="surname" placeholder="@lang('keywords.surname')">
                                        </div>
										<div class="form-group">
                                            <span class="errorMessages">{{ $errors->first('identity') }}</span>
                                            <input type="text" class="form-control" name="identity" placeholder="@lang('keywords.tc')">
                                        </div>
                                        <div class="form-group">
                                            <span class="errorMessages">{{ $errors->first('username') }}</span>
                                            <input type="text" class="form-control" name="username" placeholder="@lang('keywords.username')">
                                        </div>
                                        <div class="form-group">
                                            <span class="errorMessages">{{ $errors->first('phone') }}</span>
                                            <input type="text" class="form-control" name="phone" placeholder="@lang('keywords.phone-number')">
                                        </div>
                                        <div class="form-group">
                                            <span class="errorMessages">{{ $errors->first('password') }}</span>
                                            <input type="password" class="form-control" name="password" placeholder="@lang('keywords.password')">
                                        </div>
                                        <div class="form-group">
                                            <span class="errorMessages">{{ $errors->first('repeat') }}</span>
                                            <input type="password" class="form-control" name="repeat" placeholder="@lang('keywords.repeat-password')">
                                        </div>
                                        <div class="form-group">
                                            <label class="container_check">@lang('keywords.i-agree') <a href="{{ route('Front.contract.contracts', 'uyelik-sozlesmesi') }}">@lang('keywords.membership-agreement')</a>
                                                <input name="contract" type="checkbox">
                                                <span class="checkmark"></span>
                                                
                                            </label>
                                            <span class="errorMessages">{{ $errors->first('contract') }}</span>
                                        </div>
                                        <div class="text-center"><input type="submit" value="@lang('keywords.register')" class="btn_1 full-width"></div>
                                    </div>
                                </form>
				</div>
			</div>
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