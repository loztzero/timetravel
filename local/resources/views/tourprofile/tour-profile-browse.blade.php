@extends('layouts.frontpage')
@section('content')

<h5>Profile</h5>

@include('layouts.message-helper')
<table class="table table-striped table-bordered bordered striped">
	<form class="col s12" action="{{App::make('url')->to('/tour-profile/save')}}" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="id" value="{{Input::old('id')}}">
		<div class="row">
			<div class="input-field col s6">
				<input placeholder="First Name" id="first_name" type="text" class="validate" name="first_name" value="{{ Input::old('first_name') }}">
				<label for="first_name">First Name</label>
			</div>
			<div class="input-field col s6">
				<input placeholder="Last Name" id="last_name" type="text" class="validate" name="last_name" value="{{ Input::old('last_name') }}">
				<label for="last_name">Last Name</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input placeholder="Tour Travel Name" id="tour_name" type="text" class="validate" name="tour_name" value="{{ Input::old('tour_name') }}">
				<label for="tour_name">Tour Travel Name</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input placeholder="Address" id="address1" type="text" class="validate" name="address1" value="{{ Input::old('address1') }}">
				<input placeholder="Address" id="address2" type="text" class="validate" name="address2" value="{{ Input::old('address2') }}">
				<input placeholder="Address" id="address3" type="text" class="validate" name="address3" value="{{ Input::old('address3') }}">
				<label for="address1">Address</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input placeholder="Zip Code" id="zip_code" type="text" class="validate" name="zip_code" value="{{ Input::old('zip_code') }}">
				<label for="zip_code">Zip Code</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<input placeholder="Country" id="country" type="text" class="validate" name="country" value="{{ Input::old('country') }}">
				<label for="country">Country</label>
			</div>
			<div class="input-field col s6">
				<input placeholder="City" id="city" type="text" class="validate" name="city" value="{{ Input::old('city') }}">
				<label for="city">City</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input placeholder="Phone Number" id="phone_number" type="text" class="validate" name="phone_number" value="{{ Input::old('phone_number') }}">
				<label for="phone_number">Phone Number</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<img src="../../images/instagram.png" alt="" class="circle">
				<input placeholder="Instagram" id="instagram" type="text" class="validate" name="instagram" value="{{ Input::old('instagram') }}">
				<label for="instagram">Instagram</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<img src="../../images/facebook.png" alt="" class="circle">
				<input placeholder="Facebook" id="facebook" type="text" class="validate" name="facebook" value="{{ Input::old('facebook') }}">
				<label for="facebook">Facebook</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<img src="../../images/twitter.png" alt="" class="circle">
				<input placeholder="Twitter" id="twitter" type="text" class="validate" name="twitter" value="{{ Input::old('twitter') }}">
				<label for="twitter">Twitter</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<img src="../../images/browser.png" alt="" class="circle">
				<input placeholder="Website" id="website" type="text" class="validate" name="website" value="{{ Input::old('website') }}">
				<label for="website">Website</label>
			</div>
		</div>

		<div class="row">
			<button class="btn waves-effect waves-light" type="submit">
			Submit<i class="material-icons right">send</i>
			</button>
		</div>
	</form>
</table>

@stop

@section('script')
<script>
	var app = angular.module("ui.project", []);
	app.controller("MainCtrl", function ($scope, $http, $filter) {
	});
</script>
@stop