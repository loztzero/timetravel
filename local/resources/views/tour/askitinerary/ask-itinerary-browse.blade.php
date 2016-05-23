@extends('layouts.main-layout')
@section('content')

	<!--Container Section-->
	<section class="container">
		<div class="space-1"></div>
		<div class="row user-panel vendor">
			<div class="col-sm-3">
				<div class="vendor-header">
					<div class="public-profile">
						@if (isset($tourProfile['logo']))
							<img src="{{ url(config('constants.TOUR_ALBUM').$tourProfile['mst001_id'].'/'.$tourProfile['logo']) }}" class="img-responsive">
						@else
							<img src="{{ url('assets/image/def-pic-vendor.png') }}" class="img-responsive">
						@endif
					</div>
					<h3 class="fw-700 c-white text-center">
						<a href="{{ url('tour-profile-viewed/index', $tourProfile['mst001_id']) }}" class="c-white">
							{{ $tourProfile['tour_name'] }}
						</a>
					</h3>
					<hr class="bc-white">
					<h4 class="c-white text-center">
						<i class="fa fa-phone"></i>
						{{ $tourProfile['phone_number'] }}
					</h4>
					<h4 class="c-white text-center">
						{{ $tourProfile['address1'] }} {{ $tourProfile['address2'] }} {{ $tourProfile['address3'] }}
					</h4>
					<hr>
					<div class="fa-lg c-white vendor-contact">
						<div class="mb-1">
							<a href="{{ url('tour-review-viewed/index', $tourProfile['mst001_id']) }}" class="c-white">
								<i class="fa fa-commenting"></i>
								Review
							</a>
						</div>
						<div class="mb-1">
							<a href="{{ url('ask-itinerary/index', $tourProfile['mst001_id']) }}" class="c-white">
								<i class="fa fa-plane"></i>
								Ask Itinerary
							</a>
						</div>
						<div class="mb-1">
							<a href="" class="c-white">
								<i class="fa fa-envelope"></i>
								Send Message
							</a>
						</div>
						<div class="">
							<a href="{{ url('tour-album-viewed/index', $tourProfile['mst001_id']) }}" class="c-white">
								<i class="fa fa-image"></i>
								Album
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				@include('layouts.message-helper')
				<div class="row m-0">
					<h2 class="c-dodger-blue text-center p-0 m-0">Ask Itinerary</h2>
					<hr class="bc-dodger-blue">
				</div>
				<div class="row">
					<form role="form" class="form-horizontal" action="{{ url('ask-itinerary/save') }}" method="post" data-toggle="validator">
						<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" id="mst001_id" name="mst001_id" value="{{ $tourProfile['mst001_id'] }}">
						<div class="form-group">
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Country</label>
								<select id="countryId" name="countryId" class="form-control br-0" required>
									<option value="" selected></option>
										@foreach($countries as $key => $value)
											<option value="{{ $value->id }}">{{ $value->country_name }}</option>
										@endforeach
								</select>
							</div>
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">City</label>
								<select id="cityId" name="cityId" class="form-control br-0">
									<option></option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 input-daterange" id="datepicker" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Departure Date</label>
								<input id="departure_date" name="departure_date" type="text" class="form-control" placeholder="DD-MM-YYYY" required>
							</div>
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Lama</label>
								<input id="days" name="days" type="number" class="form-control" min="0" data-bind="value:replyNumber" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Pax</label>
								<input id="pax" name="pax" type="number" class="form-control" min="0" data-bind="value:replyNumber" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-9 col-md-3" style="padding:0 2.1em;">
								<button type="submit" class="btn btn-default form-control br-0 bg-dodger-blue bc-dodger-blue c-white ">SUBMIT</button>
							</div>
						</div>
					</form>
				</div>
				<!--My Review End-->
			</div>
		</div>
		<br>
	</section>
	<!--Container Section End-->
@stop

@section('script')
	<script src="{{ url('assets/js/ask-itinerary.js') }}"></script>
@stop