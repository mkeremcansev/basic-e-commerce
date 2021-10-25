@extends('Front.main')
@section('title')
{{ $general->title }} - @lang('keywords.buy-order')
@endsection
@section('content')
<div id="page">
	<main class="bg_gray">
        <div class="container margin_30">
		<div class="page_header">
			<h1>@lang('keywords.buy-order')</h1>
		</div>
        @if ($checkoutForm == null)
            <article class="card">
					<div class="card-body">
                        <br>
                        <center>
                            <img width="200" src="{{ asset('Front') }}/img/sorry.png" alt="">
                        </center>
                        <h5 class="text-center">@lang('keywords.not-pay-url')</h5>
                        <br>
                        <center>
                            <a href="{{ route('Front.main') }}" class="btn_1">@lang('keywords.home')</a>
                        </center>
					</div>
				</article>
        @else
        <div style="padding: 5%;">
		    <div id="iyzipay-checkout-form" class="responsive">{!!  $checkoutForm  !!}</div>
        </div>
        @endif
        </div>
	</main>
</div>
@endsection

