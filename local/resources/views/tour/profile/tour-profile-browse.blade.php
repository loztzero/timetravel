@extends('layouts.main-layout')
@section('content')

	<!--Container Section-->
	<section class="container">
		<div class="space-1"></div>
		<div class="row user-panel vendor">
			@include('layouts.tour-dashboard')
			<!--My Profile-->
			<div class="col-sm-9">
				@include('layouts.message-helper')
				<h3 class="section-title text-center"><span class="c-lightgrey">MY PROFILE</span></h3>
				<hr class="s-title">
				<form role="form" class="form-horizontal" method="post" action="{{ url('tour-profile/save') }}" enctype="multipart/form-data" data-toggle="validator">
					<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" id="id" name="id" value="{{ $tourProfile['id'] }}">
					<div class="form-group">
						<div class="col-sm-3 md-center">
							@if (isset($tourProfile['logo']))
								<img src="{{ url(config('constants.TOUR_ALBUM').Auth::user()->id.'/'.$tourProfile['logo']) }}" class="img-responsive" height="168" width="168">
							@else
								<img src="{{ url('assets/image/def-pic-vendor.png') }}" class="img-responsive" height="168" width="168">
							@endif
						</div>
						<div class="col-sm-3 md-center">
							<div class="space-1"></div>
							<div class="space-1"></div>
							<div class="space-1"></div>
							<input type="text" id="logo" class="form-control" placeholder="Photo Name" disabled>
							<div class="space-1"></div>
							<div class="fileUpload btn form-control bg-java bc-java c-white">
								<span><i class="fa fa-folder"></i> Browse</span>
								<input id="file" type="file" name="logo" class="upload" />
							</div>
						</div>
						<div class="col-sm-6">
							<label class="control-label c-persimmon"> E-mail</label>
							<input id="email" name="email" type="email" class="form-control br-0 input-lg" placeholder="john-doe@example.com" value="{{ Auth::user()->email }}" disabled>
							<div class="space-1"></div>
							<label class="control-label c-persimmon"> Password</label>
							<input id="password" name="password" type="password" class="form-control input-lg br-0">
						</div>
					</div>
					<div class="space-1"></div>
					<hr class="bc-lightgrey">
					<div class="form-group">
						<div class="col-sm-6">
							<label class="control-label c-persimmon">First name</label>
							<input id="first_name" name="first_name" type="text" class="form-control input-lg br-0" placeholder="John" value="{{ Input::old('first_name', $tourProfile != null ? $tourProfile->first_name : '') }}" required>
						</div>
						<div class="col-sm-6">
							<label class="control-label c-persimmon">Last name</label>
							<input id="last_name" name="last_name" type="text" class="form-control input-lg br-0" placeholder="Doe" value="{{ Input::old('last_name', $tourProfile != null ? $tourProfile->last_name : '') }}" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
							<label class="control-label c-persimmon">Tour Name</label>
							<input id="tour_name" name="tour_name" type="text" class="form-control input-lg br-0" placeholder="Everyday Tour" value="{{ Input::old('tour_name', $tourProfile != null ? $tourProfile->tour_name : '') }}" required>
						</div>
						<div class="col-sm-6">
							<label class="control-label c-persimmon">Phone number</label>
							<input id="phone_number" name="phone_number" type="tel" class="form-control input-lg br-0" placeholder="e.g. +628711000" value="{{ Input::old('phone_number', $tourProfile != null ? $tourProfile->phone_number : '') }}" required>
						</div>
					</div>
					<div class="space-1"></div>
					<div class="form-group">
						<div class="col-sm-12">
							<label class="control-label c-persimmon">Address</label>
							<input id="address1" name="address1" type="text" class="form-control input-lg br-0" placeholder="Address line 1" value="{{ Input::old('address1', $tourProfile != null ? $tourProfile->address1 : '') }}" required><br>
							<input id="address2" name="address2" type="text" class="form-control input-lg br-0" placeholder="Address line 2" value="{{ Input::old('address2', $tourProfile != null ? $tourProfile->address2 : '') }}"><br>
							<input id="address3" name="address3" type="text" class="form-control input-lg br-0" placeholder="Address line 3" value="{{ Input::old('address3', $tourProfile != null ? $tourProfile->address3 : '') }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
							<label class="control-label c-persimmon">Zip Code</label>
							<input id="zip_code" name="zip_code" type="text" class="form-control input-lg br-0" placeholder="Zip Code/Postal Code" value="{{ Input::old('zip_code', $tourProfile != null ? $tourProfile->zip_code : '') }}" min="0" data-bind="value:replyNumber" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
							<label class="control-label c-persimmon">Country</label>
							<select id="countryId" name="countryId" class="form-control br-0" required>
								<option value="" selected></option>
								@foreach($countries as $key => $value)
									@if ($tourProfile['mst002_id'] == $value->id)
										<option value="{{ $value->id }}" selected>{{ $value->country_name }}</option>
									@else
										<option value="{{ $value->id }}">{{ $value->country_name }}</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="col-sm-6">
							<label class="control-label c-persimmon">City</label>
							<select id="cityId" name="cityId" class="form-control br-0" required>
								<option value="" selected></option>
								@foreach($cities as $key => $value)
									@if ($tourProfile['mst003_id'] == $value->id)
										<option value="{{ $value->id }}" selected>{{ $value->city_name }}</option>
									@else
										<option value="{{ $value->id }}">{{ $value->city_name }}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="space-1"></div>
					<hr class="bc-java bs-dash">
					<h3 class="c-dodger-blue fw-700 text-uppercase">Your Social Media ID</h3>
					<hr class="bc-java bs-dash"></hr>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2">
							<label class="c-facebook">
								<i class="fa fa-facebook-official"></i>
								Facebook
							</label>
						</div>
						<div class="col-xs-8 col-sm-4">
							<input id="facebook" name="facebook" type="text" class="form-control br-0 bc-facebook" value="{{ Input::old('facebook', $tourProfile != null ? $tourProfile->facebook : '') }}">
						</div>
						<div class="col-xs-4 col-sm-2">
							<label class="c-twitter">
								<i class="fa fa-twitter"></i>
								Twitter
							</label>
						</div>
						<div class="col-xs-8 col-sm-4">
							<input id="twitter" name="twitter" type="text" class="form-control br-0 bc-twitter" value="{{ Input::old('twitter', $tourProfile != null ? $tourProfile->twitter : '') }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2">
							<label class="c-instagram">
								<i class="fa fa-instagram"></i>
								Instagram
							</label>
						</div>
						<div class="col-xs-8 col-sm-4">
							<input id="instagram" name="instagram" type="text" class="form-control br-0 bc-instagram" value="{{ Input::old('instagram', $tourProfile != null ? $tourProfile->instagram : '') }}">
						</div>
						<div class="col-xs-4 col-sm-2">
							<label class="c-rss">
								<i class="fa fa-rss"></i>
								Website
							</label>
						</div>
						<div class="col-xs-8 col-sm-4">
							<input id="website" name="website" type="text" class="form-control br-0 bc-rss" value="{{ Input::old('website', $tourProfile != null ? $tourProfile->website : '') }}">
						</div>
					</div>
					<hr class="bc-lightgrey">
					<div class="space-1"></div>
					<div class="col-md-offset-0 col-md-3 p-0">
						<button type="submit" class="btn btn-default bg-persimmon bc-persimmon c-white fw-700">
							<i class="fa fa-check-circle-o"></i>
							SUBMIT
						</button>
					</div>
				</form>
			</div>
			<!--My Profile End-->
		</div>
		<br>
	</section>
@stop

@section('script')
	<script src="{{ url('assets/js/tour-profile.js') }}"></script>
@stop

@section('style')
	<link rel="stylesheet" href="{{ url('assets/css/upload_photo.css') }}" type="text/css">
@stop