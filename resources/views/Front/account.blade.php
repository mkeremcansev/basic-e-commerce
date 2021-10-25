@extends('Front.main')
@section('title')
{{ $general->title }} - @lang('keywords.my-account')
@endsection
@section('content')
    <div id="page">
	
	<main class="bg_gray">
			<div class="container margin_30">
		<div class="page_header">
	</div>
			<div class="row">
				<div class="col-lg-8 col-md-6">
					<div class="step first">
					<ul class="nav nav-tabs" id="tab_checkout" role="tablist">
					  <li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">
                            @lang('keywords.my-account') 
                        @if (Auth::user()->verify == 1)
                           (@lang('keywords.yes-verify'))
                        @else
                           (@lang('keywords.not-verify'))
                        @endif
                        </a>
                        
					  </li>
					  <li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab_2" role="tab" aria-controls="tab_2" aria-selected="false">@lang('keywords.password')</a>
					  </li>
                      <li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab_3" role="tab" aria-controls="tab_3" aria-selected="false">@lang('keywords.adress')</a>
					  </li>
					</ul>
					<div class="tab-content checkout">
						<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
							<div class="form_container">
                        <div class="form-group">
							<input type="text" class="form-control" value="{{ Auth::user()->name." ".  Auth::user()->surname}}" disabled>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
						</div>
                        <div class="form-group">
							<input type="text" class="form-control" value="{{ Auth::user()->username }}" disabled>
						</div>
                        <div class="form-group">
							<input type="text" class="form-control" value="{{ Auth::user()->phone }}" disabled>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" value="{{ Auth::user()->identity }}" disabled>
						</div>
					</div>
						</div>
						<!-- /tab_1 -->
					  <div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="tab_2">

						  <form action="{{ route('Front.password.change') }}" method="POST">
                        @csrf
					<div class="form_container">
                        <div class="form-group">
                            <span class="errorMessages">{{ $errors->first('password') }}</span>
							<input type="password" class="form-control" name="password" placeholder="@lang('keywords.password')">
						</div>
						<div class="form-group">
                            <span class="errorMessages">{{ $errors->first('repeat') }}</span>
							<input type="password" class="form-control" name="repeat" placeholder="@lang('keywords.repeat-password')">
						</div>
						<div class="text-center">
                            <input type="submit" value="@lang('keywords.save')" class="btn_1 full-width">
                        </div>
					</div>
                    </form>
						</div>

                        <div class="tab-pane fade" id="tab_3" role="tabpanel" aria-labelledby="tab_3">

						  <form action="{{ route('Front.adress.create') }}" method="POST">
                        @csrf
					<div class="form_container">
                        <div class="form-group">
                            <span class="errorMessages">{{ $errors->first('city') }}</span>
							<input type="text" class="form-control" value="{{ Auth::user()->city }}" name="city" placeholder="@lang('keywords.a-city')">
						</div>
                        <div class="form-group">
							<span class="errorMessages">{{ $errors->first('adress') }}</span>
							<textarea name="adress" class="form-control" rows="5" placeholder="@lang('keywords.adress')">{{ Auth::user()->adress }}</textarea>
						</div>
						<div class="text-center">
                            <input type="submit" value="@lang('keywords.save')" class="btn_1 full-width">
                        </div>
					</div>
                    </form>
						</div>
						<!-- /tab_2 -->
					</div>
					</div>
					<!-- /step -->
				</div>
                <div class="col-xl-3 col-lg-3 col-md-3 keremMG">
                <div class="text-center form-group">
                    <a href="{{ route('Front.orders') }}"><input type="submit" value="@lang('keywords.my-orders')" class="btn_1 full-width"></a>
                </div>
                <div class="text-center form-group">
                    <a href="{{ route('Front.reviews') }}"><input type="submit" value="@lang('keywords.my-reviews')" class="btn_1 full-width"></a>
                </div>
                <div class="text-center form-group">
                    <a href="{{ route('Front.logout') }}"><input type="submit" value="@lang('keywords.logout')" class="btn_1 full-width"></a>
                </div>
			    </div>
			</div>
		</div>
		<br>
	</main>
</div>
@endsection