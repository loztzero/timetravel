@extends('layouts.tour-layout')
@section('content')

	<!--Container Section-->
	<section class="container">
		<div class="space-1"></div>
		<div class="row user-panel vendor">
			<div class="col-sm-3 md-none">
				<h4 class="bg-tomato p-1 c-white fw-700"><span><i class="fa fa-bars"></i> DASHBOARD</span></h4>
				<ul class="list-unstyled">
					<li class="p-05 active vendor">
						<a href="vendor-profile.html" class="c-lightgrey">
							<i class="fa fa-user"></i>
							My Profile
						</a>
					</li>
					<li class="p-05">
						<a href="vendor-review.html" class="c-lightgrey">
							<i class="fa fa-comments"></i>
							My Review
						</a>
					</li>
					<li class="p-05">
						<a href="vendor-itinerary.html" class="c-lightgrey">
							<i class="fa fa-map"></i>
							My Itinerary
						</a>
					</li>
					<li class="p-05">
						<a href="vendor-album.html" class="c-lightgrey">
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
			<div class="col-sm-9">
				<!--My Profile-->
				<h3 class="section-title text-center"><span class="c-lightgrey">MY PROFILE</span></h3>
				<hr class="s-title">
				<form role="form" class="form-horizontal" id="edit-profile">
					<div class="form-group">
						<div class="col-sm-3 md-center">
							<button type="submit" class="p-0" style="border:none;">
								<img src="image/def-pic-vendor.png" class="img-responsive ">
							</button>
						</div>
						<div class="col-sm-9">
							<label class="control-label c-persimmon"> E-mail</label>
							<input type="email" class="form-control br-0 input-lg" placeholder="john-doe@example.com" value="{{ $tourProfile['user']['email'] }}">
							<div class="space-1"></div>
							<label class="control-label c-persimmon"> Password</label>
							<input type="password" class="form-control input-lg br-0">
						</div>
					</div>
					<div class="space-1"></div>
					<hr class="bc-lightgrey">
					<div class="form-group">
						<div class="col-sm-6">
							<label class="control-label c-persimmon">First name</label>
							<input type="text" class="form-control input-lg br-0" placeholder="John" value="{{ $tourProfile['first_name'] }}">
						</div>
						<div class="col-sm-6">
							<label class="control-label c-persimmon">Last name</label>
							<input type="text" class="form-control input-lg br-0" placeholder="Doe" value="{{ $tourProfile['last_name'] }}">
						</div>
					</div>
					<div class="space-1"></div>
					<div class="form-group">
						<div class="col-sm-12">
							<label class="control-label c-persimmon">Address</label>
							<input type="text" class="form-control input-lg br-0" placeholder="Address line 1" value="{{ $tourProfile['address1'] }}"><br>
							<input type="text" class="form-control input-lg br-0" placeholder="Address line 2" value="{{ $tourProfile['address2'] }}">
						</div>
					</div>
					<div class="space-1"></div>
					<div class="form-group">
						<div class="col-sm-6">
							<label class="control-label c-persimmon">Zip Code</label>
							<input type="text" class="form-control input-lg br-0" placeholder="Zip Code/Postal Code" value="{{ $tourProfile['zip_code'] }}"><br>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
							<label class="control-label c-persimmon">Country</label>
							<select class="form-control input-lg br-0">
								<option>Country 1</option>
								<option>Country 2</option>
							</select>
						</div>
						<div class="col-sm-6">
							<label class="control-label c-persimmon">City</label>
							<select class="form-control input-lg br-0">
								<option>City 1</option>
								<option>City 2</option>
							</select>
						</div>
					</div>
					<div class="space-1"></div>
					<div class="form-group">
						<div class="col-sm-6">
							<label class="control-label c-persimmon">Phone number</label>
							<input type="tel" class="form-control input-lg br-0" placeholder="e.g. +628711000" value="{{ $tourProfile['phone_number'] }}"><br>
						</div>
					</div>
					<hr class="bc-java bs-dash">
					<h3 class="c-dodger-blue fw-700 text-uppercase">Your Social Media ID</h3>
					<hr class="bc-java bs-dash"></hr>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2">
							<label class="c-facebook">
								<i class="fa fa-facebook-official"></i> Facebook
							</label>
						</div>
						<div class="col-xs-8 col-sm-4">
							<input type="text" class="form-control br-0 bc-facebook" value="{{ $tourProfile['facebook'] }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2">
							<label class="c-twitter">
								<i class="fa fa-twitter"></i> Twitter
							</label>
						</div>
						<div class="col-xs-8 col-sm-4">
							<input type="text" class="form-control br-0 bc-twitter" value="{{ $tourProfile['twitter'] }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2">
							<label class="c-instagram">
								<i class="fa fa-instagram"></i> Instagram
							</label>
						</div>
						<div class="col-xs-8 col-sm-4">
							<input type="text" class="form-control br-0 bc-instagram" value="{{ $tourProfile['instagram'] }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2">
							<label class="c-pinterest">
								<i class="fa fa-pinterest"></i> Pinterest
							</label>
						</div>
						<div class="col-xs-8 col-sm-4">
							<input type="text" class="form-control br-0 bc-pinterest" value="{{ $tourProfile['pinterest'] }}">
						</div>
					</div>
					<hr class="bc-lightgrey">
					<div class="space-1"></div>
					<div class="col-md-offset-5 col-md-3 p-0">
						<button type="submit" class="btn btn-default bg-persimmon bc-persimmon c-white fw-700">
							<i class="fa fa-check-circle-o"></i> SUBMIT
						</button>
					</div>
					<div class="col-md-offset-1 col-md-3 p-0">
						<button type="submit" class="btn btn-default bg-tall-poppy bc-tall-poppy c-white fw-700">
							<i class="fa fa-times-circle-o"></i> CANCEL
						</button>
					</div>
				</form>
				<!--My Profile End-->
			</div>
		</div>
		<br>
	</section>
	<!--Container Section End-->

@stop