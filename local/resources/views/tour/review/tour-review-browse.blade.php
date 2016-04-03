@extends('layouts.tour-layout')
@section('content')
@include('layouts.message-helper')

	<!--Container Section-->
	<section class="container">
		<div class="space-1"></div>
		<div class="row user-panel vendor">
			@include('layouts.tour-dashboard')
			<!--My Review-->
			<div class="col-sm-9">
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
							<a class="fw-700 c-java fa-lg">{{ $value->traveler->first_name }} {{ $value->traveler->last_name }}</a>
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
			</div>
			<!--My Review End-->
		</div>
		<br>
	</section>
	<!--Container Section End-->
@stop

@section('script')
<script src="{{ url('assets/js/tour-review.js') }}"></script>
@stop