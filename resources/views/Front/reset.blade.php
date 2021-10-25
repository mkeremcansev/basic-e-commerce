@extends('Front.main')
@section('title')
{{ $general->title }} - @lang('keywords.reset-password')
@endsection
@section('content')
    <div id="page">
	
	<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
	</div>
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="client">@lang('keywords.reset-password')</h3>
                    <form action="{{ route('Front.resetSend') }}" method="POST">
                        @csrf
					<div class="form_container">
						<div class="form-group">
                            <span class="errorMessages">{{ $errors->first('email') }}</span>
							<input type="text" class="form-control" name="email" placeholder="@lang('keywords.email')">
						</div>
						<div class="text-center">
                            <input type="submit" value="@lang('keywords.submit')" class="btn_1 full-width">
                        </div>
					</div>
                    </form>
				</div>
			</div>
		</div>
		</div>
	</main>
</div>
@endsection