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
							<h2 class="c-dodger-blue fa-3x">Create Itinerary</h2>
						</div>
					</div>
					<div class="space-1"></div>
					<form role="form" class="form-horizontal" action="{{ url('tour-itinerary/save') }}" method="post">
						<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="">
						<div class="fileUpload row form-group" style="padding:0 2.1em;">
							<div class="col-sm-8">
								<input type="text" id="photo" class="form-control" placeholder="Photo Name" disabled>
								<div class="space-1"></div>
							</div>
							<div class="col-sm-3">
								<div class="fileUpload btn form-control bg-java bc-java c-white">
									<span><i class="fa fa-folder"></i> Browse</span>
									<input id="file" type="file" name="photo" class="upload" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Currency</label>
								<select id="currency" name="currency" class="form-control bc-java">
									<option value="" selected></option>
									@foreach($currencies as $key => $value)
										<option value="{{ $value->id }}">{{ $value->curr_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Price</label>
								<input id="price" name="price" type="text" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Category</label>
								<select id="category" name="category" class="form-control br-0">
									<option value="" selected></option>
									<option value="Backpacker">Backpacker</option>
									<option value="Family">Family</option>
									<option value="Honeymoon">Honeymoon</option>
								</select>
							</div>
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Min Pax</label>
								<input id="min_pax" name="min_pax" type="text" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Start Period</label>
								<input id="start_period" name="start_period" type="text" class="form-control">
							</div>
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">End Period</label>
								<input id="end_period" name="end_period" type="text" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Country</label>
								<select id="countryId" name="countryId" class="form-control br-0">
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
							<div class="col-md-12" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Description</label>
								<textarea id="description" name="description" class="form-control br-0"></textarea>
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
					<li class="p-05">
						<a href="{{ url('tour-review') }}" class="c-lightgrey">
							<i class="fa fa-comments"></i>
							My Review
						</a>
					</li>
					<li class="p-05 active vendor">
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
			<!--My Itinerary-->
			<div class="col-sm-9">
				<h3 class="section-title text-center"><span class="c-lightgrey">MY ITINERARY</span></h3>
				<hr class="s-title">
				@foreach($tourItinerary as $key => $value)
					<div class="row iti-box vendor">
						<div class="col-md-3">
							<span>{{ $value->description }}</span>
						</div>
						<div class="col-md-2 img-vendor">
								@if(isset($value->photo))
									<img src="{{ url(config('constants.TOUR_ALBUM').Auth::user()->id.'/'.$value->photo) }}" class="img-responsive">
								@else
									<img src="{{ url('assets/image/def-pic-vendor.png') }}" class="img-responsive">
								@endif
						</div>
						<div class="col-md-2">
							<span>{{ $value->category }}</span>
						</div>
						<div class="col-md-1 col-xs-3">
							<span class="badge bg-java ">{{ $value->currency }}</span>
						</div>
						<div class="col-md-2">
							<span>{{ $value->price }}</span>
						</div>
						<div class="col-md-1 col-xs-6">
							<a href="" onClick="getData({{ $value->id }})" class="bg-cinnabar" data-toggle="modal" data-target="#modmake"><i class="fa fa-edit"></i></a>
						</div>
						<div class="col-md-1 col-xs-6">
							<a href="{{ url('tour-itinerary/delete', $value->id) }}" class="bg-tall-poppy" data-toggle="tooltip" title="delete"><i class="fa fa-trash"></i></a>
						</div>
					</div>
				@endforeach
				<div class="col-md-offset-0 col-md-12 p-0 text-center">
					{!! $tourItinerary->render() !!}
				</div>
				<div class="col-md-offset-8 col-md-4 p-0">
					<a href="#" class="bc-persimmon bg-persimmon c-white p-1 md-w-100" data-toggle="modal" data-target="#modmake">Make Package</a>
				</div>
			</div>
			<!--My Itinerary End-->
		</div>
		<br>
	</section>
	<!--Container Section End-->
@stop

@section('script')
<script src="{{ url('assets/js/tour-itinerary.js') }}"></script>
@stop

@section('style')
<link rel="stylesheet" href="{{ url('assets/css/upload_photo.css') }}" type="text/css">
@stop