@extends('Front.main')
@section('title')
    @lang('keywords.404')
@endsection
@section('content')
<div id="page">
	<main class="bg_gray">
		<div id="error_page">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-xl-7 col-lg-9">
						<img src="{{ asset('Front') }}/img/404.png" alt="" class="img-fluid" width="400" height="212">
						<p>@lang('keywords.404-message')</p>
						<a href="{{ route('Front.main') }}" class="btn_1">@lang('keywords.home')</a>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
@endsection