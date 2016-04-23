@extends('layouts.main-layout')
@section('content')
			
	<!--Container Section-->
	<section class="container">
		<div class="row vendor-header">
			@include('layouts.message-helper')
			<div class="col-md-3">
				<div class="public-profile">
					@if (isset($tourProfile['logo']))
						<img src="{{ url(config('constants.TOUR_ALBUM').$tourProfile['mst001_id'].'/'.$tourProfile['logo']) }}" class="img-responsive">
					@else
						<img src="{{ url('assets/image/def-pic-vendor.png') }}" class="img-responsive">
					@endif
				</div>
			</div>
			<div class="col-md-9 md-center">
				<h2 class="fw-700 c-white">
					<a href="{{ url('tour-profile-viewed/index', $tourProfile['mst001_id']) }}" class="c-white">
						{{ $tourProfile['tour_name'] }}
					</a>
				</h2>
				<h4 class="c-white">
					<i class="fa fa-phone"></i>
					{{ $tourProfile['phone_number'] }}
				</h4>
				<h4 class="c-white">{{ $tourProfile['address1'] }} {{ $tourProfile['address2'] }} {{ $tourProfile['address3'] }}</h4>
				<hr>
				<div class="fa-lg c-white vendor-contact">
					<div class="col-md-3">
						<a href="{{ url('tour-review-viewed/index', $tourProfile['mst001_id']) }}" class="c-white">
							<i class="fa fa-commenting"></i>
							Review
						</a>
					</div>
					<div class="col-md-3">
						<a href="" class="c-white">
							<i class="fa fa-plane"></i>
							Ask Itinerary
						</a>
					</div>
					<div class="col-md-3">
						<a href="" class="c-white">
							<i class="fa fa-envelope"></i>
							Send Message
						</a>
					</div>
					<div class="col-md-3">
						<a href="{{ url('tour-album-viewed/index', $tourProfile['mst001_id']) }}" class="c-white">
							<i class="fa fa-image"></i>
							Album
						</a>
					</div>
				</div>
			</div>
		</div>
		<h3 class="section-title text-center">
			<span class="c-java">
				DAFTAR ITINERARY
			</span>
		</h3>
		<hr class="bc-java s-title">
		<br>
		<div class="row">
			<div class="col-md-3">
				<div class="row opt-searchbar m-0">
					<h4 class="fw-700 text-center m-0 p-1 bg-dodger-blue c-white"> SEARCH ITINERARY</h4>
					<form role="form" class="form-horizontal" action="{{ url('tour-profile-viewed/search') }}" method="post" >
						<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" id="id" name="id" value="{{ $tourProfile['id'] }}">
						<div class="col-xs-12 mt-1 p-0">
							<select id="category" name="category" class="well-sm br-0 bc-dodger-blue">
								<option value="" selected>All Category</option>
								<option value="Backpacker">Backpacker</option>
								<option value="Family">Family</option>
								<option value="Honeymoon">Honeymoon</option>
							</select>
						</div>
						<div class="col-xs-12 space-1"></div>
						<div class="col-xs-12 text-center p-0 input-daterange" id="datepicker">
							<input id="departure_date" name="departure_date" type="text" class="well-sm br-0 bc-dodger-blue" placeholder="Departure date">
						</div>
						<div class="col-xs-12 space-1"></div>
						<div class="col-xs-12 text-center p-0">
							<select id="countryId" name="countryId" class="well-sm br-0 bc-dodger-blue">
								<option value="" selected>All Country</option>
								@foreach($countries as $key => $value)
									<option value="{{ $value->id }}">{{ $value->country_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-xs-12 space-1"></div>
						<div class="col-xs-12 text-center p-0">
							<select id="cityId" name="cityId" class="well-sm br-0 bc-dodger-blue">
								<option value="" selected>All City</option>
							</select>
						</div>
						<div class="col-xs-12 space-1"></div>
						<div class="col-xs-12 text-center p-0">
							<select id="currencyId" name="currencyId" class="well-sm br-0 bc-dodger-blue">
								<option value="" selected>All Currency</option>
								@foreach($currencies as $key => $value)
									<option value="{{ $value->id }}">{{ $value->curr_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-xs-12 space-1"></div>
						<div class="col-xs-12 text-center p-0">
							<input id="start_period" name="budget_from" type="text" class="well-sm br-0 bc-dodger-blue" placeholder="Range budget from">
							<div class="c-java">s/d</div>
							<input id="end_period" name="budget_to" type="text" class="well-sm br-0 bc-dodger-blue" placeholder="Range budget to">
						</div>
						<div class="col-xs-12 space-1"></div>
						<div class="col-xs-12 text-center p-0">
							<button class="btn well-sm bc-ygreen bg-ygreen c-white fw-700" style="width:100%;">SEARCH</button>
						</div>
						<div class="col-xs-12 space-2"></div>
					</form>
				</div>
			</div>
			<div class="col-md-9">
				<!--<h3 class="section-title text-center m-0"><span class="c-dodger-blue ffw">DAFTAR TOUR</span></h3>
				<hr class="bc-dodger-blue s-title">-->

				<div class="row text-center md-none m-0">
					<div class="col-md-2 bg-pinterest">
						<h4 class="c-white fw-700 p-05">Category</h4>
					</div>
					<div class="col-md-2 bg-cinnabar">
						<h4 class="c-white fw-700 p-05">Price</h4>
					</div>
					<div class="col-md-2 bg-tree-poppy">
						<h4 class="c-white fw-700 p-05">Negara</h4>
					</div>
					<div class="col-md-2 bg-java">
						<h4 class="c-white fw-700 p-05">Kota</h4>
					</div>
					<div class="col-md-4 bg-instagram">
						<h4 class="c-white fw-700 p-05">Periode</h4>
					</div>
				</div>
				@foreach($tourItinerary as $key => $value)
					<a href="{{ url('tour-itinerary-viewed/index', $value->id) }}" class="c-white">
						<div class="row tour-list text-center">
							<div class="col-md-2">
								<h4 class="c-lightgrey fw-700 md-block c-java">CATEGORY</h4>
								<h4 class="c-lightgrey">{{ $value->category }}</h4>
							</div>
							<div class="col-md-2">
								<h4 class="c-lightgrey fw-700 md-block c-java">PRICE</h4>
								<h4 class="c-lightgrey">{{ number_format($value->price, 0, ',', '.') }}</h4>
							</div>
							<div class="col-md-2 col-xs-6">
								<h4 class="c-lightgrey fw-700 md-block c-java">COUNTRY</h4>
								<h4 class="c-lightgrey">{{ $value->country->country_name }}</h4>
							</div>
							<div class="col-md-2 col-xs-6">
								<h4 class="c-lightgrey fw-700 md-block c-java">CITY</h4>
								<h4 class="c-lightgrey">{{ $value->city->city_name }}</h4>
							</div>
							<div class="col-md-4">
								<h4 class="c-lightgrey fw-700 md-block c-java">PERIODE</h4>
								<h4 class="c-lightgrey">{{ date('d-m-Y', strtotime($value->start_period)) }} <span class="badge bg-dodger-blue">s/d</span> {{ date('d-m-Y', strtotime($value->end_period)) }}</h4>
							</div>
						</div>
					</a>
				@endforeach
				<div class="space-2"></div>
				<div class="col-md-offset-0 col-md-12 p-0 text-center">
					{!! $tourItinerary->render() !!}
				</div>
			</div>
		</div>
	</section>
	<!--Container Section End-->
@stop

@section('script')
	<script src="{{ url('assets/js/tour-profile-viewed.js') }}"></script>
@stop