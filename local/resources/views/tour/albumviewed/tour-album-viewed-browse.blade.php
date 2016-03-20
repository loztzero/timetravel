@extends('layouts.tour-layout')
@section('content')
@include('layouts.message-helper')
			
	<!--Container Section-->
	<section class="container">
		<div class="row vendor-header">
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
				<h4 class="c-white">{{ $tourProfile['address1'] }} {{ $tourProfile['address2'] }} {{ $tourProfile['address3'] }}</h4>
				<hr>
				<div class="fa-lg c-white vendor-contact">
					<div class="col-md-3">
						<i class="fa fa-phone"></i>
						{{ $tourProfile['phone_number'] }}
					</div>
					<div class="col-md-3">
						<a href="#" class="c-white">
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
				DAFTAR ALBUM
			</span>
		</h3>
		<hr class="bc-java s-title">
		<br>
		<div class="row">
			@foreach($tourAlbum as $key => $value)
				<div class="col-md-4">
					<ul class="list-unstyled vendor-album">
						<li class="of-hidden">
							<img src="{{ url(config('constants.TOUR_ALBUM').$tourProfile['mst001_id'].'/'.$value->photo) }}" class="img-responsive wh-100">
						</li>
						<li class="text-center">
							<div class="col-xs-6 p-1">
								<a href="#" class="c-white">
									<i class="fa fa-thumbs-up"></i>
									Like it
								</a>
							</div>
							<div class="col-xs-6 p-1">
								<a href="#" class="c-white" data-toggle="modal" data-target="#commento">
									<i class="fa fa-comment"></i>
									{{ $value->tittle }}
								</a>
							</div>
						</li>
					</ul>
				</div>
			@endforeach
		</div>
		<div class="col-md-offset-0 col-md-12 p-0 text-center">
			{!! $tourAlbum->render() !!}
		</div>
	</section>
	<!--Container Section End-->
@stop

@section('script')
<script src="{{ url('assets/js/tour-album-viewed.js') }}"></script>
@stop