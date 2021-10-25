@extends('Front.main')
@section('title')
{{ $general->title }} - @lang('keywords.about')
@endsection
@section('content')
    <div id="page">
		<main class="bg_gray">
			<div class="container margin_30">
		<div class="page_header">
	</div>
			<div class="row">
				<div class="col-lg-12 col-md-6">
					@foreach ($abouts as $about)
					<a class="box_topic" href="javascript:void(0);">
						<h3>{{ $about->title }}</h3>
						{!! $about->content !!}
					</a>
					@endforeach
				</div>
			</div>
		</div>
		</main>
	</div>
    @endsection