@extends('Front.main')
@section('title')
{{ $general->title }} - @lang('keywords.order-go')
@endsection
@section('content')
    <div id="page">
	
<div id="page">
	<main class="bg_gray">
	
		
	<div class="container margin_30">
		<div class="page_header">
	</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="step first">
						<h3>1. @lang('keywords.user-adress')</h3>
					<ul class="nav nav-tabs" id="tab_checkout" role="tablist">
					  <li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">@lang('keywords.user-info') & @lang('keywords.adress')</a>
					  </li>
					</ul>
					<form action="{{ route('Front.payment') }}" method="POST" id="payForm">
						@csrf
						<div class="tab-content checkout">
							<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
								<div class="form-group">
									<input type="text" value="{{ Auth::user()->name." ".Auth::user()->surname }}" class="form-control" disabled>
								</div>
								<div class="form-group">
									<input type="email" value="{{ Auth::user()->email }}" class="form-control" disabled>
								</div>
								<div class="form-group">
									<input type="text" value="{{ Auth::user()->phone }}" class="form-control" disabled>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" value="{{ Auth::user()->identity }}" placeholder="@lang('keywords.tc')" disabled>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" value="{{ Auth::user()->adress }}" placeholder="@lang('keywords.adress') (@lang('keywords.empty'))" disabled>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" value="{{ Auth::user()->city }}" placeholder="@lang('keywords.a-city') (@lang('keywords.empty'))" disabled>
								</div>
							</div>
						</div>
					</form>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step middle payments">
						<h3>2. @lang('keywords.payment-method')</h3>
							<ul>
								<li>
									<label class="container_radio">@lang('keywords.online-payment')
										<input type="radio" name="payment" checked>
										<span class="checkmark"></span>
									</label>
								</li>
							</ul>
						
					</div>
					
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step last">
						<h3>3. @lang('keywords.order-summary')</h3>
					<div class="box_general summary">
						<ul>
							@foreach (Cart::instance('cart')->content() as $cart)
							<li class="clearfix"><em>{{ $cart->qty }}x {{ $cart->model->title }}</em>  <span>{{ $cart->price*$cart->qty }} ₺</span></li>
							@endforeach
						</ul>
						<div class="total clearfix">@lang('keywords.total') <span>{{ Cart::instance('cart')->subtotal() }} ₺</span></div>
						@if (Auth::user()->adress == null || Auth::user()->city == null)
							<a href="{{ route('Front.account') }}" class="btn_1 full-width">@lang('keywords.adress-edit')</a>
						@else
							<a onclick="payForm.submit()" class="btn_1 full-width">@lang('keywords.payment-confirm')</a>
						@endif
					</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
@endsection