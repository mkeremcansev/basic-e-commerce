<footer class="revealed">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<h3 data-target="#collapse_1">@lang('keywords.quick-links')</h3>
				<div class="collapse dont-collapse-sm links" id="collapse_1">
					<ul>
						<li><a href="{{ route('Front.about') }}">@lang('keywords.about')</a></li>
						<li><a href="{{ route('Front.faq') }}">@lang('keywords.faq')</a></li>
						<li><a href="{{ route('Front.products') }}">@lang('keywords.products')</a></li>
						<li><a href="{{ route('Front.contact') }}">@lang('keywords.contact')</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<h3 data-target="#collapse_2">@lang('keywords.categories')</h3>
				<div class="collapse dont-collapse-sm links" id="collapse_2">
					<ul>
					@foreach ($categorys->take(5) as $category)
						<li><a href="{{ route('Front.category.products', $category->slug) }}">{{$category->title}}</a></li>
					@endforeach
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<h3 data-target="#collapse_3">@lang('keywords.contracts')</h3>
				<div class="collapse dont-collapse-sm links" id="collapse_3">
					<ul>
					@foreach ($contracts as $contract)
					<li><a href="{{ route('Front.contract.contracts', $contract->slug) }}">{{ $contract->title }}</a></li>
					@endforeach
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<h3 data-target="#collapse_4">@lang('keywords.contact')</h3>
				<div class="collapse dont-collapse-sm contacts" id="collapse_4">
					<ul>
						<li><i class="ti-home"></i>{{ $general->adress }}</li>
						<li><i class="ti-headphone-alt"></i>{{ $general->phone }}</li>
						<li><i class="ti-email"></i><a href="mailto:{{ $general->mail }}">{{ $general->mail }}</a></li>
					</ul>
				</div>
			</div>
		</div>
		<hr>
		<div class="row add_bottom_25">
			<div class="col-lg-6">
				<ul class="footer-selector clearfix">
					<li><img src="data:{{ asset('Front') }}/image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
							data-src="{{ asset('Front') }}/img/cards_all.svg" alt="" width="198" height="30"
							class="lazy"></li>
				</ul>
			</div>
			<div class="col-lg-6">
				<ul class="additional_links">
					<li>
						<span>Copyright ©
							<script>
								var CurrentYear = new Date().getFullYear()
								document.write(CurrentYear)
							</script> {{ $general->footer }}
						</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
</div>
<div id="toTop"></div>
<script src="{{ asset('Front') }}/js/common_scripts.min.js"></script>
<script src="{{ asset('Front') }}/js/main.js"></script>
<script src="{{ asset('Front') }}/js/carousel-home.js"></script>
<script src="{{ asset('Front') }}/js/jquery.cookiebar.js"></script>
@toastr_js
@toastr_render
<script>
	$(document).ready(function () {
		'use strict';
		$.cookieBar({
			fixed: true,
			message: "@lang('keywords.cookie')",
			policyText: "@lang('keywords.cookie-policy')",
			policyURL: '{{ route("Front.contract.contracts", "cerez-politikasi") }}',
			acceptText: "@lang('keywords.okey')"
		});
	});
</script>
</body>

</html>