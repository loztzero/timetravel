@extends('layouts.tour-layout')
@section('content')

	<!--Container Section-->
	<section class="container">
		<div class="space-1"></div>
		<div class="row user-panel vendor">
			<div class="col-sm-3 md-none">
				<h4 class="bg-tomato p-1 c-white fw-700"><span><i class="fa fa-bars"></i> DASHBOARD</span></h4>
				<ul class="list-unstyled">
					<li class="p-05 active vendor">
						<a href="vendor-profile.html" class="c-lightgrey">
							<i class="fa fa-user"></i>
							My Profile
						</a>
					</li>
					<li class="p-05">
						<a href="vendor-review.html" class="c-lightgrey">
							<i class="fa fa-comments"></i>
							My Review
						</a>
					</li>
					<li class="p-05">
						<a href="vendor-itinerary.html" class="c-lightgrey">
							<i class="fa fa-map"></i>
							My Itinerary
						</a>
					</li>
					<li class="p-05">
						<a href="vendor-album.html" class="c-lightgrey">
							<i class="fa fa-image"></i>
							My Album
						</a>
					</li>
					<li class="p-05 c-lightgrey">
						<i class="fa fa-signal"></i>
						Profile Strength
						<div class="space-1"></div>
							<div class="progress">
							<div class="progress-bar bg-java" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width:72%">
								<span class="fa-lg">72%</span>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="col-sm-9">
				<!--My Review-->
				<h3 class="section-title text-center"><span class="c-lightgrey">MY REVIEW</span></h3>
				<hr class="s-title">
				@foreach($tourReview as $key => $value)
					<div class="row rev-box vendor">
						<div class="col-md-3 text-center">
							<img src="image/def-image.png" class="img-responsive">
							<div class="space-1"></div>
							<a class="fw-700 c-java fa-lg">User1</a>
						</div>
						<div class="col-md-6 p-05">
							<hr class="md-block">
							<p class="w-wrap">
								{{ $value->review }}
							</p>
							<hr class="md-block">
						</div>
						<div class="col-md-3 text-center c-ygreen">
							@for($i = 0; $i < 5 - $value->range; $i++)
								<i class="fa fa-star"></i>
    						@endfor
							
    						@for($i = 0; $i < $value->range; $i++)
								<i class="fa fa-star"></i>
    						@endfor
						</div>
					</div>
				@endforeach
				<!--My Review End-->
			</div>
		</div>
		<br>
	</section>
	<!--Container Section End-->

@stop