@extends('layouts.tour-layout')
@section('content')
@include('layouts.message-helper')

	<!--Modal Make Package-->
	<div id="modals-vendor">
		<div class="modal fade" id="modmake" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span>&#215;</span></button>
						<div class="min-title text-center">
							<h2 class="c-dodger-blue fa-3x">Create Review</h2>
						</div>
					</div>
					<div class="space-1"></div>
					<form role="form" class="form-horizontal" action="{{ url('tour-review-viewed/save') }}" method="post" data-toggle="validator">
						<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" id="mst001_id" name="mst001_id" value="{{ $tourProfile['mst001_id'] }}">
						<div class="form-group">
							<div id="chooseRating" class="col-md-12" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Rating</label><br/>
								<i id="1" class="fa fa-star" onclick="addRating(this)" style="cursor: pointer;"></i>
								<i id="2" class="fa fa-star" onclick="addRating(this)" style="cursor: pointer;"></i>
								<i id="3" class="fa fa-star" onclick="addRating(this)" style="cursor: pointer;"></i>
								<i id="4" class="fa fa-star" onclick="addRating(this)" style="cursor: pointer;"></i>
								<i id="5" class="fa fa-star" onclick="addRating(this)" style="cursor: pointer;"></i>
								<input type="text" id="range" name="range" value="" style="visibility: hidden;" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Review</label>
								<textarea id="review" name="review" class="form-control br-0" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-6 col-md-6" style="padding:0 2.1em;">
								<button type="submit" class="btn btn-default form-control br-0 bg-dodger-blue bc-dodger-blue c-white ">SUBMIT</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--Modal Make Package End-->
			
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
					<h2 class="c-dodger-blue text-center p-0 m-0">Tour Review</h2>
					<hr class="bc-dodger-blue">
				</div>
				<div class="row">
					@foreach($tourReview as $key => $value)
						<div class="row rev-box vendor">
							<div class="col-md-9 p-05">
								<hr class="md-block">
								<p class="w-wrap">
									{{ $value->review }}
								</p>
								<hr class="md-block">
								<div class="space-1"></div>
								@if($value->traveler != null)
									<a class="fw-700 c-java fa-lg">{{ $value->traveler->first_name }} {{ $value->traveler->last_name != null ? $value->traveler->last_name : '' }}</a>
								@endif
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
					<div class="col-md-offset-8 col-md-4 p-0">
						@if(Auth::check())
							<a href="#" class="bc-persimmon bg-persimmon c-white p-1 md-w-100" data-toggle="modal" data-target="#modmake">Make Review</a>
						@else
							<a href="#" class="bc-persimmon bg-persimmon c-white p-1 md-w-100" data-toggle="modal" data-target="#modlogin">Make Review</a>
						@endif
					</div>
				</div>
				<!--My Review End-->
			</div>
		</div>
		<br>
	</section>
	<!--Container Section End-->
@stop

@section('script')
<script src="{{ url('assets/js/tour-review-viewed.js') }}"></script>
@stop