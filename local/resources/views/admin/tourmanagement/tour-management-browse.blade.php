@extends('layouts.main-layout')
@section('content')
@include('layouts.message-helper')

	<!--Container Section-->
	<div id="modals-vendor">
		<div class="modal fade" id="modmake" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span>&#215;</span></button>
						<div class="min-title text-center">
							<h2 class="c-dodger-blue fa-2x">Profile Data</h2>
							<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
						</div>
						<hr class="bc-lightgrey">
						<div class="form-group">
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">First name</label>
								<input id="first_name" name="first_name" type="text" class="form-control" readonly>
							</div>
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Last name</label>
								<input id="last_name" name="last_name" type="text" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Tour Name</label>
								<input id="tour_name" name="tour_name" type="text" class="form-control" readonly>
							</div>
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Phone number</label>
								<input id="phone_number" name="phone_number" type="tel" class="form-control" readonly>
							</div>
						</div>
						<div class="space-1"></div>
						<div class="form-group">
							<div class="col-md-12" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Address</label>
								<input id="address1" name="address1" type="text" class="form-control" readonly><br>
								<input id="address2" name="address2" type="text" class="form-control" readonly><br>
								<input id="address3" name="address3" type="text" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Zip Code</label>
								<input id="zip_code" name="zip_code" type="text" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Country</label>
								<input id="country_name" name="country_name" type="text" class="form-control" readonly>
							</div>
							<div class="col-md-6" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">City</label>
								<input id="city_name" name="city_name" type="text" class="form-control" readonly>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Modal Make Package End-->
	
	<section class="container">
		<div class="space-1"></div>
		<div class="row user-panel vendor">
			@include('layouts.admin-dashboard')
			<!--My Album-->
			<div class="col-sm-9">
				<!--My Album-->
				<h3 class="section-title text-center"><span class="c-lightgrey">TOUR MANAGEMENT</span></h3>
				<hr class="s-title">
				<div class="row">
					@foreach($userTour as $key => $value)
						<div class="col-md-4">
							<ul class="list-unstyled vendor-album">
								<li class="of-hidden">
									@if ($value->tour)
										<img src="{{ url(config('constants.TOUR_ALBUM').$value->id.'/'.$value->tour->logo) }}" style="width:262px !important;height:240px !important">
									@else
										<img src="{{ url('assets/image/def-pic-vendor.png') }}" class="img-responsive wh-100">
									@endif
								</li>
								<li class="text-center">
									<div class="col-xs-8 p-1">
										<a href="" onClick="getData('{{ $value->id }}')" class="c-white" data-toggle="modal" data-target="#modmake">
											@if ($value->tour)
												{{ $value->tour->tour_name }}
											@else
												&nbsp;
											@endif
										</a>
									</div>
									<div class="col-xs-4 p-1">
										<a href="{{ url('tour-management/change-status', $value->id) }}" class="c-white">
											{{ $value->status }}
										</a>
									</div>
								</li>
							</ul>
						</div>
					@endforeach
				</div>
				<div class="col-md-offset-0 col-md-12 p-0 text-center">
					{!! $userTour->render() !!}
				</div>
			</div>
			<!--My Album End-->
		</div>
		<br>
	</section>
	<!--Container Section End-->
@stop

@section('script')
<script src="{{ url('assets/js/tour-management.js') }}"></script>
@stop
