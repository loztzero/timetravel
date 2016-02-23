@extends('layouts.tour-layout')
@section('content')
@include('layouts.message-helper')

	<!--Container Section-->
	<section class="container">
		<div class="space-1"></div>
		<div class="row user-panel vendor">
			<div class="col-sm-3 md-none">
				<h4 class="bg-tomato p-1 c-white fw-700">
					<span>
						<i class="fa fa-bars"></i>
						DASHBOARD
					</span>
				</h4>
				<ul class="list-unstyled">
					<li class="p-05">
						<a href="{{ url('tour-profile') }}" class="c-lightgrey">
							<i class="fa fa-user"></i>
							My Profile
						</a>
					</li>
					<li class="p-05 active vendor">
						<a href="{{ url('tour-review') }}" class="c-lightgrey">
							<i class="fa fa-comments"></i>
							My Review
						</a>
					</li>
					<li class="p-05">
						<a href="{{ url('tour-itinerary') }}" class="c-lightgrey">
							<i class="fa fa-map"></i>
							My Itinerary
						</a>
					</li>
					<li class="p-05">
						<a href="{{ url('tour-album') }}" class="c-lightgrey">
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
						<div class="col-md-9 p-05">
							<hr class="md-block">
							<p class="w-wrap">
								{{ $value->review }}
							</p>
							<hr class="md-block">
							<div class="space-1"></div>
							<a class="fw-700 c-java fa-lg">{{ $value->travelers[0]->first_name }} {{ $value->travelers[0]->last_name }}</a>
						</div>
						<div class="col-md-3 text-center">
    						@for($i = 0; $i < $value->range; $i++)
								<i class="fa fa-star c-ygreen"></i>
    						@endfor
    						
							@for($i = 0; $i < 5 - $value->range; $i++)
								<i class="fa fa-star"></i>
    						@endfor
						</div>
					</div>
				@endforeach
				<div class="col-md-offset-0 col-md-12 p-0 text-center">
					{!! $tourReview->render() !!}
				</div>
				<!--My Review End-->
			</div>
		</div>
		<br>
	</section>
	<!--Container Section End-->
@stop

@section('script')
<script src="{{ url('assets/js/tour-review.js') }}"></script>
@stop