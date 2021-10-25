@extends('Front.main')
@section('title')
{{ $general->title }} - @lang('keywords.contact')
@endsection
@section('content')
<div id="page">
	<main class="bg_gray">
		<div class="bg_white">
			<div class="container margin_60_35">
				<h4 class="pb-3">@lang('keywords.contact')</h4>
				<form class="col-lg-12" action="{{ route('Contact.save') }}" method="POST">
					@csrf
				<div class="row">
					<div class="col-lg-4 col-md-6 add_bottom_25">
						<div class="form-group"><span class="errorMessages">{{ $errors->first('name') }}</span>
							<input name="name" class="form-control" type="text" placeholder="@lang('keywords.name')">
						</div>
						<div class="form-group"><span class="errorMessages">{{ $errors->first('surname') }}</span>
							<input name="surname" class="form-control" type="text" placeholder="@lang('keywords.surname')">
						</div>
						<div class="form-group"><span class="errorMessages">{{ $errors->first('title') }}</span>
							<input name="title" class="form-control" type="text" placeholder="@lang('keywords.title')">
						</div>
						<div class="form-group"><span class="errorMessages">{{ $errors->first('content') }}</span>
							<textarea name="content" class="form-control" rows="5" placeholder="@lang('keywords.content')"></textarea>
						</div>
						<div class="form-group">
							<button class="btn_1 full-width" type="submit" name="submit" >@lang('keywords.submit')</button>
						</div>
					</div>
					
					<div class="col-lg-8 col-md-6 add_bottom_25">
					<iframe class="map_contact" src="{{ $general->map }}" style="border: 0" allowfullscreen></iframe>
					</div>
				</div>
				</form>
			</div>
		</div>
	</main>
</div>
@endsection