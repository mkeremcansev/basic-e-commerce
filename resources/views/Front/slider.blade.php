	<div id="carousel-home">
		<div class="owl-carousel owl-theme">
			@foreach ($sliders as $slider)
			<div class="owl-slide cover" style="background-image: url({{ asset($slider->image) }});">
				
				<div class="opacity-mask d-flex align-items-center">
					<div class="container">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-lg-12 static">
								<div class="slide-text white">
									<h2 class="owl-slide-animated owl-slide-title">{{ $slider->title }}</h2>
									<p class="owl-slide-animated owl-slide-subtitle">
										{{ $slider->description }}
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div id="icon_drag_mobile"></div>
	</div>
	
	