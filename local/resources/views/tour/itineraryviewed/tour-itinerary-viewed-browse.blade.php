@extends('layouts.main-layout')
@section('content')
			
	<!--Container Section-->
	<section class="container">
		<div class="space-1"></div>
		<div class="row user-panel vendor">
			@include('layouts.message-helper')
			<div class="col-sm-3">
				<div class=" vendor-header">
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
						<a href="" class="c-white">
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
				<div class="row m-0">
					<h2 class="c-dodger-blue text-center p-0 m-0">{{ $tourItinerary['title'] }}</h2>
					<hr class="bc-dodger-blue">
				</div>
				<div class="row">
					<div class="col-sm-7">
						@if (isset($tourItinerary['photo']))
							<img src="{{ url(config('constants.TOUR_ALBUM').$tourProfile['mst001_id'].'/'.$tourItinerary['photo']) }}" class="img-responsive">
						@else
							<img src="{{ url('assets/image/def-pic-vendor.png') }}" class="img-responsive">
						@endif
					</div>
					<div class="col-sm-5">
						<div class="row text-center iti-details-2 p-1">
							<div class="col-xs-12">
								<div class="col-xs-6 fw-600 c-tall-poppy">Category</div>
								<div class="col-xs-6 fa-lg c-lightgrey">{{ $tourItinerary['category'] }}</div>
							</div>
							<div class="col-xs-12"><hr></div>
							<div class="col-xs-12">
								<div class="col-xs-6 fw-600 c-pinterest">Negara/Kota</div>
								<div class="col-xs-6 fa-lg c-lightgrey">{{ $country['country_name'] }}</div>
							</div>
							<div class="col-xs-12"><hr></div>
							<div class="col-xs-6">
								<div class="fw-600 c-cinnabar">Min. Pax</div>
								<div class="fa-lg c-lightgrey">{{ number_format($tourItinerary['min_pax'], 0, ',', '.') }} Pax</div>
							</div>
							<div class="col-xs-6">
							</div>
							<div class="col-xs-12"><hr></div>
							<div class="col-xs-6">
								<div class="fw-600 c-facebook">Tanggal Awal</div>
								<div class="fa-lg  c-lightgrey">{{ date('d-m-Y', strtotime($tourItinerary['start_period'])) }}</div>
							</div>
							<div class="col-xs-6">
								<div class="fw-600 c-instagram">Tanggal Akhir</div>
								<div class="fa-lg  c-lightgrey">{{ date('d-m-Y', strtotime($tourItinerary['end_period'])) }}</div>
							</div>
							<div class="col-xs-12"><hr></div>
							<div class="col-xs-12">
								<span><i class="fa fa-tags"></i> Harga per pax:</span>
								<span class="fw-600 fa-lg">{{ $currency['curr_code'] }} {{ number_format($tourItinerary['price'], 0, ',', '.') }}</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						 <h3 class="c-java"><i class="fa fa-info-circle"></i> Description</h3>
					</div>
					<div class="col-md-12">
						<p class="para-quote c-lightgrey m-0">
							{{ $tourItinerary['description'] }}
						</p>
					</div>
				</div>
				<!--My Itinerary End-->
			</div>
		</div>
		<br>
	</section>
	<!--Container Section End-->
@stop

@section('script')
	<script src="{{ url('assets/js/tour-itinerary-viewed.js') }}"></script>
@stop