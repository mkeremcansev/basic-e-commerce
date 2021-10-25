@extends('Front.main')
@section('title')
{{ $general->title }} - {{ $single->title }}
@endsection
@section('content')
<div id="page">
	<main class="bg_gray">
		<div class="container margin_30">
			<div class="page_header">
				<h1>{{ $single->title }}</h1>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="owl-carousel owl-theme prod_pics magnific-gallery">
						@foreach(allItems($single->images) as $image)
						<div class="item">
							<a href="{{ asset($image) }}" title="{{ $single->title }}" data-effect="mfp-zoom-in"><img
									src="{{ asset($image) }}" alt="">
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="bg_white">
			<div class="container margin_60_35">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h3>@lang('keywords.specifications')</h3>
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tbody>
									<tr>
										<td><strong>@lang('keywords.category')</strong></td>
										<td><a target="_blank" href="{{ route('Front.category.products', $single->getCategory->slug) }}">{{ $single->getCategory->title }}</a></td>
									</tr>
									<tr>
										<td><strong>@lang('keywords.brand')</strong></td>
										<td><a target="_blank" href="{{ route('Front.brand.products', $single->getBrand->slug) }}">{{ $single->getBrand->title }}</a></td>
									</tr>
									<tr>
										<td><strong>@lang('keywords.product-codes')</strong></td>
										<td>{{ $single->code}}</td>
									</tr>
									<tr>
										<td><strong>@lang('keywords.color')</strong></td>
										<td>{{ $single->color }}</td>
									</tr>
									<tr>
										<td><strong>@lang('keywords.size')</strong></td>
										<td>{{ $single->size }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<form class="col-lg-5" action="{{ route('Front.cart.create', ['id'=>$single->id]) }}" method="POST">
						@csrf
						<div class="prod_options version_2">
							<div class="row">
								<label
									class="col-xl-7 col-lg-5 col-md-6 col-6"><strong>@lang('keywords.color')</strong></label>
								<div class="col-xl-5 col-lg-5 col-md-6 col-6">
									<div class="custom-select-form">
										<select name="color" class="wide">
											@foreach(allItems($single->color) as $color)
											<option value="{{ $color }}" selected="">{{ $color }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label
									class="col-xl-7 col-lg-5 col-md-6 col-6"><strong>@lang('keywords.size')</strong></label>
								<div class="col-xl-5 col-lg-5 col-md-6 col-6">
									<div class="custom-select-form">
										<select name="size" class="wide">
											@foreach(allItems($single->size) as $size)
											<option value="{{ $size }}" selected="">{{ $size }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label
									class="col-xl-7 col-lg-5  col-md-6 col-6"><strong>@lang('keywords.quantity')</strong></label>
								<div class="col-xl-5 col-lg-5 col-md-6 col-6">
									<div class="numbers-row">
										<input type="text" value="1" id="quantity_1" class="qty2" name="qty">
										<div class="inc button_inc">+</div>
										<div class="dec button_inc">-</div>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-lg-7 col-md-6">
									@if ($single->discount != null)
									<div class="price_main"><span class="new_price">{{ $single->discount }} ₺</span>
										<span class="percentage">-{{ discount($single->price, $single->discount)
											}}%</span> <span class="old_price">{{ $single->price }} ₺</span>
									</div>
									@else
									<div class="price_main"><span class="new_price">{{ $single->price }} ₺</span>
									</div>
									@endif
								</div>
								<div class="col-lg-5 col-md-6">
									<div class="btn_add_to_cart">
										<button type="submit" class="btn_1">@lang('keywords.cart-add')</button>
										<a href="{{ route('Front.wishlist.create', $single->id) }}" class="wishBtn"><i
												class="ti-heart"></i></a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="tabs_product bg_white version_2">
			<div class="container">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab"
							role="tab">@lang('keywords.description')</a>
					</li>
					<li class="nav-item">
						<a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab"
							role="tab">@lang('keywords.reviews') ({{$single->reviews->count()}})</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="tab_content_wrapper">
			<div class="container">
				<div class="tab-content" role="tablist">
					<div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
						<div class="card-header" role="tab" id="heading-A">
							<h5 class="mb-0">
								<a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false"
									aria-controls="collapse-A">
									@lang('keywords.description')
								</a>
							</h5>
						</div>

						<div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
							<div class="card-body">
								<div class="row justify-content-between">
									<div class="col-lg-12">
										{!! $single->description !!}
									</div>
								</div>
							</div>
						</div>
					</div>

					<div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
						<div class="card-header" role="tab" id="heading-B">
							<h5 class="mb-0">
								<a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false"
									aria-controls="collapse-B">
									@lang('keywords.reviews') ({{$single->reviews->count()}})
								</a>
							</h5>
						</div>
						<div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
							<div class="card-body">
								<div class="row justify-content-between">
									@if ($single->reviews->count() > 0)
									@foreach ($single->reviews as $review)
									<div class="col-lg-5">
										<div class="review_content">
											<div class="clearfix add_bottom_10">
												<span class="rating">
													@if ($review->rating == 1)
													<i style="color: #fec348;" class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													@elseif($review->rating == 2)
													<i style="color: #fec348;" class="fa fa-star"></i>
													<i style="color: #fec348;" class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													@elseif($review->rating == 3)
													<i style="color: #fec348;" class="fa fa-star"></i>
													<i style="color: #fec348;" class="fa fa-star"></i>
													<i style="color: #fec348;" class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													@elseif($review->rating == 4)
													<i style="color: #fec348;" class="fa fa-star"></i>
													<i style="color: #fec348;" class="fa fa-star"></i>
													<i style="color: #fec348;" class="fa fa-star"></i>
													<i style="color: #fec348;" class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													@elseif($review->rating == 5)
													<i style="color: #fec348;" class="fa fa-star"></i>
													<i style="color: #fec348;" class="fa fa-star"></i>
													<i style="color: #fec348;" class="fa fa-star"></i>
													<i style="color: #fec348;" class="fa fa-star"></i>
													<i style="color: #fec348;" class="fa fa-star"></i>
													@endif
													<span>( {{ $review->getUser->name }} )</span></span>
												<span class="revBtnOne">{{ dateEdit($review->created_at) }}</span>
											</div>
											<h3 style="font-weight: bold;">{{ $review->title }} </h3>
											<p>{{ $review->description }}</p>
										</div>
									</div>
									@endforeach
									@else
									<h5 style="text-align: center !important;">@lang('keywords.empty-review')</h5>
									@endif
								</div>
								<hr>
								@if (Auth::user())
								<form action="{{ route('Front.review') }}" method="POST">
									@csrf
									<input type="hidden" name="product" value="{{ $single->id }}">
									<div class="col-lg-6">
										<div class="review_content">
											<h5>@lang('keywords.review-create')</h5>
											<div class="row">
												<div class="form-group col-lg-12">
													<span class="errorMessages">{{ $errors->first('rating') }}</span>
													<div class="custom-select-form">
														<select name="rating" class="wide">
															<option value="" disabled selected hidden>
																@lang('keywords.star')</option>
															<option value="1">1 Yıldız</option>
															<option value="2">2 Yıldız</option>
															<option value="3">3 Yıldız</option>
															<option value="4">4 Yıldız</option>
															<option value="5">5 Yıldız</option>
														</select>
													</div>
												</div>
												<div class="form-group col-lg-12"><span class="errorMessages">{{
														$errors->first('title') }}</span>
													<input name="title" class="form-control" type="text"
														placeholder="@lang('keywords.title')">
												</div>
												<div class="form-group col-lg-12"><span class="errorMessages">{{
														$errors->first('description') }}</span>
													<textarea name="description" class="form-control"
														style="height: 150px;"
														placeholder="@lang('keywords.description')"></textarea>
												</div>
												<div class="form-group col-lg-12">
													<button class="btn_1 full-width" type="submit"
														name="submit">@lang('keywords.submit')</button>
												</div>
											</div>
										</div>
									</div>
								</form>
								@else
								<a href="">
									<h4>@lang('keywords.review-not-user')</h4>
								</a>
								@endif

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="bg_white">
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>@lang('keywords.similar-products')</h2>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
				@foreach ($similars as $item)
				<div class="item">
					<div class="grid_item">
						<figure>
							@if ($item->discount != null)
							<span class="ribbon off">-{{ discount($item->price, $item->discount) }}%</span>
							@endif
							<a href="{{ route('Front.single', [$item->getCategory->slug, $item->slug]) }}">
								<img class="owl-lazy" src="{{ asset(firstImage($item->images)) }}"
									data-src="{{ asset(firstImage($item->images)) }}" alt="">
							</a>
						</figure>
						@if (round($item->reviews()->avg('rating')) == 0)
						<div class="rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i> ({{ $item->reviews->count() }})
						</div>
						@elseif(round($item->reviews()->avg('rating')) == 1)
						<div class="rating">
							<i class="icon-star voted"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i> ({{ $item->reviews->count() }})
						</div>
						@elseif(round($item->reviews()->avg('rating')) == 2)
						<div class="rating">
							<i class="icon-star voted"></i>
							<i class="icon-star voted"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i> ({{ $item->reviews->count() }})
						</div>
						@elseif(round($item->reviews()->avg('rating')) == 3)
						<div class="rating">
							<i class="icon-star voted"></i>
							<i class="icon-star voted"></i>
							<i class="icon-star voted"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i> ({{ $item->reviews->count() }})
						</div>
						@elseif(round($item->reviews()->avg('rating')) == 4)
						<div class="rating">
							<i class="icon-star voted"></i>
							<i class="icon-star voted"></i>
							<i class="icon-star voted"></i>
							<i class="icon-star voted"></i>
							<i class="fa fa-star"></i> ({{ $item->reviews->count() }})
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
		</div>
	</div>
	</main>
</div>
@endsection