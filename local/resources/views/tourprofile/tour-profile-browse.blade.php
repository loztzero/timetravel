@extends('layouts.frontpage')
@section('content')

<h5>Profile</h5>

@include('layouts.message-helper')
<table class="table table-striped table-bordered bordered striped">
	<form class="col s12" action="{{App::make('url')->to('/tour-profile/save')}}" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="id" value="{{ $tourProfile['id'] }}">
	    <div class="row">
	      <div class="input-field col s6">
	        <img src="" alt="No Image">
	        <div class="file-field input-field">
	          <input class="file-path validate" type="text"/>
	          <div class="btn">
	            <span>File</span>
	            <input type="file" />
	          </div>
	        </div>
	      </div>
	
	      <div class="input-field col s6">
	        <input placeholder="Email" id="email" type="text" class="validate" name="email" value="{{ $tourProfile['user']['email'] }}">
	        <label for="email">Email</label>
	      </div>
	
	      <div class="input-field col s6">
	        <input placeholder="Password" id="password" type="password" class="validate" name="password">
	        <label for="password">Password</label>
	      </div>
	    </div>
	    
		<div class="row">
			<div class="input-field col s6">
				<input placeholder="First Name" id="first_name" type="text" class="validate" name="first_name" value="{{ $tourProfile['first_name'] }}">
				<label for="first_name">First Name</label>
			</div>
			<div class="input-field col s6">
				<input placeholder="Last Name" id="last_name" type="text" class="validate" name="last_name" value="{{ $tourProfile['last_name'] }}">
				<label for="last_name">Last Name</label>
			</div>
		</div>
		
		<div class="row">
			<div class="input-field col s12">
				<input placeholder="Tour Travel Name" id="tour_name" type="text" class="validate" name="tour_name" value="{{ $tourProfile['tour_name'] }}">
				<label for="tour_name">Tour Travel Name</label>
			</div>
		</div>
		
		<div class="row">
			<div class="input-field col s12">
				<input placeholder="Address" id="address1" type="text" class="validate" name="address1" value="{{ $tourProfile['address1'] }}">
				<input placeholder="Address" id="address2" type="text" class="validate" name="address2" value="{{ $tourProfile['address2'] }}">
				<input placeholder="Address" id="address3" type="text" class="validate" name="address3" value="{{ $tourProfile['address3'] }}">
				<label for="address1">Address</label>
			</div>
		</div>
		
		<div class="row">
			<div class="input-field col s12">
				<input placeholder="Zip Code" id="zip_code" type="text" class="validate" name="zip_code" value="{{ $tourProfile['zip_code'] }}">
				<label for="zip_code">Zip Code</label>
			</div>
		</div>
		
		<div class="row">
			<div class="col s6">
		        <label>Country</label>
		        <select class="browser-default" id="country" name="country">
		          <option value="" disabled selected>Choose Your Country</option>
		          <option value="1">Option 1</option>
		          <option value="2">Option 2</option>
		          <option value="3">Option 3</option>
		        </select>
			</div>
			
			<div class="col s6">
		        <label>City</label>
		        <select class="browser-default" id="city" name="city">
		          <option value="" disabled selected>Choose Your City</option>
		          <option value="Jakarta">Jakarta</option>
		          <option value="Bandung">Bandung</option>
		          <option value="Bali">Bali</option>
		        </select>
			</div>
		</div>
		
		<div class="row">
			<div class="input-field col s12">
				<input placeholder="Phone Number" id="phone_number" type="text" class="validate" name="phone_number" value="{{ $tourProfile['phone_number'] }}">
				<label for="phone_number">Phone Number</label>
			</div>
		</div>
		
		<div class="row">
			<div class="input-field col s12">
				<img src="../../images/instagram.png" alt="" class="circle">
				<input placeholder="Instagram" id="instagram" type="text" class="validate" name="instagram" value="{{ $tourProfile['instagram'] }}">
				<label for="instagram">Instagram</label>
			</div>
		</div>
		
		<div class="row">
			<div class="input-field col s12">
				<img src="../../images/facebook.png" alt="" class="circle">
				<input placeholder="Facebook" id="facebook" type="text" class="validate" name="facebook" value="{{ $tourProfile['facebook'] }}">
				<label for="facebook">Facebook</label>
			</div>
		</div>
		
		<div class="row">
			<div class="input-field col s12">
				<img src="../../images/twitter.png" alt="" class="circle">
				<input placeholder="Twitter" id="twitter" type="text" class="validate" name="twitter" value="{{ $tourProfile['twitter'] }}">
				<label for="twitter">Twitter</label>
			</div>
		</div>
		
		<div class="row">
			<div class="input-field col s12">
				<img src="../../images/browser.png" alt="" class="circle">
				<input placeholder="Website" id="website" type="text" class="validate" name="website" value="{{ $tourProfile['website'] }}">
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