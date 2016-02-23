<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Register Vendor - Holidayku</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:200,300,400,400italic,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="{{ url('assets/image/favicon.ico') }}" type="img/ico">
		
		<link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
		
		<script src="{{ url('assets/js/jquery-2.1.4.min.js') }}"></script>
		<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
	</head>
	
	<body>
		<div class="container">
			<div class="row" id="header-reg">
				<div class="col-xs-4 padd-0">
					<img src="{{ url('assets/image/logo.png') }}" class="img-responsive">
				</div>
				<div class="col-xs-8 text-right">
					<img src="{{ url('assets/image/header-img-v.png') }}" class="img-responsive">
				</div>
			</div>
			<h2 class="c-persimmon md-none fw-700 text-center"><i class="fa fa-user-plus"></i> Register your New Account</h2>
			<hr class="bc-persimmon">
			<div class="space-1"></div>
			<form role="form" method="">
				<div class="row r-vendor">
					<div class="col-md-7">
						<h2 class="bg-persimmon p-05 c-white md-block"><i class="fa fa-user-plus"></i> Register New Account</h2>
						<fieldset class="form-horizontal">
							<div class="form-group md-center">
								<div class="col-md-4">
									<button type="submit" class="p-0" style="border:none;">
										<img src="{{ url('assets/image/def-pic-vendor.png') }}" class="img-responsive ">
									</button>
								</div>
								<div class="col-md-8">
									<h2 class="c-persimmon">Complete your account with profile picture</h2>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-6">
									<label class="control-label c-persimmon fa-lg">First name</label>
									<input type="text" class="form-control br-0" placeholder="Firstname">
								</div>
								<div class="col-sm-6">
									<label class="control-label c-persimmon fa-lg">Last name</label>
									<input type="text" class="form-control br-0" placeholder="Lastname">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<label class="control-label c-persimmon fa-lg">Travel tour name</label>
									<input type="text" class="form-control br-0" placeholder="Travel tour name">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<label class="control-label c-persimmon fa-lg">Address</label>
									<input type="text" class="form-control br-0" placeholder="Address line 1"><br>
									<input type="text" class="form-control br-0" placeholder="Address line 2">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-6">
									<label class="control-label c-persimmon fa-lg">Zip Code</label>
									<input type="text" class="form-control br-0" placeholder="Postal Code or Zip Code">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-6">
									<label class="control-label c-persimmon fa-lg">Country</label>
									<select class="form-control br-0" id="sel2">
										<option selected>-</option>
										<option>Brunei Darussalam</option>
										<option>Indonesia</option>
										<option>Malaysia</option>
										<option>Singapore</option>
									</select>
								</div>
								<div class="col-sm-6">
									<label class="control-label c-persimmon fa-lg">City</label>
									<select class="form-control br-0" id="sel5">
										<option selected>-</option>
										<option>Bandung</option>
										<option>Jakarta</option>
										<option>Kuala Lumpur</option>
										<option>Singapore</option>
										<option>Surabaya</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-6">
									<label class="control-label c-persimmon fa-lg">Phone number</label>
									<input type="text" class="form-control br-0" placeholder="+62123456789">
								</div>
							</div>
						</fieldset>
					</div>
					<div class="col-md-offset-1 col-md-4">
						<div class="md-none p-1 bg-persimmon c-white">
							<h3 class="text-center fw-700">Why Holidayku</h3>
							<hr class="">
							<h3>100% Free</h3>
							<h3>100% Free</h3>
							<h3>100% Free</h3>
							<h3>100% Free</h3>
						</div>
						<fieldset class="form" >
							<h2 class="c-persimmon fw-700">Additional Information for your account</h2>
							<hr class="bc-persimmon">
							<div class="form-group">
								<label class="control-label c-facebook"><i class="fa fa-facebook-official fa-2x"></i></label>
								<input type="text" class="form-control br-0 bc-facebook" placeholder="Your Facebook ID">
							</div> 
							<div class="form-group">
								<label class="control-label c-twitter"><i class="fa fa-twitter fa-2x"></i></label>
								<input type="text" class="form-control br-0 bc-twitter" placeholder="Your Twitter ID">
							</div>
							<div class="form-group">
								<label class="control-label c-instagram"><i class="fa fa-instagram fa-2x"></i></label>
								<input type="text" class="form-control br-0 bc-instagram" placeholder="Your Instagram ID">
							</div> 
							<div class="form-group">
								<label class="control-label c-pinterest"><i class="fa fa-pinterest fa-2x"></i></label>
								<input type="text" class="form-control br-0 bc-pinterest" placeholder="Your Pinterest ID">
							</div>
						</fieldset>
					</div>
				</div>
				<div class="line-breaker"><hr class="border-carnation"></div>
				<div class="form-group">
					<div class="col-md-4 margin-0 padd-0">
						<button type="submit" class="btn btn-default form-control bc-tomato bg-tomato c-white fa-lg">Create Profile</button>
					</div>
				</div>
			</form>
			<!--register form section end-->
		</div>
		
		<!--footer section-->
		<div class="container">
			<br>
			<img id="footer-img" src="{{ url('assets/image/bottom-landmarks.png') }}" class="img-responsive">
		</div>
		<footer class="bg-dodger-blue">
			<div class="container">
				<div class="row">
					<div class="col-md-4 md-center">
						<ul class="list-inline">
							<li><a  href="#" class="c-white">About Us</a></li>
							<li><a href="#" class="c-white">FAQ</a></li>
							<li><a href="#" class="c-white">Contact Us</a></li>
							<li><a href="vendor-register.html" class="c-white">Join Us</a></li>
						</ul>
					</div>
					<div class="col-md-8 text-right md-center">
						<ul class="list-inline">
							<li><a href="#" class="c-white"><i class="fa fa-facebook-official fa-lg"></i></a></li>
							<li><a href="#" class="c-white"><i class="fa fa-twitter fa-lg"></i></a></li>
							<li><a href="#" class="c-white"><i class="fa fa-instagram fa-lg"></i></a></li>
							<li><a href="#" class="c-white"><i class="fa fa-pinterest fa-lg"></i></a></li>
							<li><a href="#" class="c-white"><i class="fa fa-linkedin fa-lg"></i></a></li>
							<li><a href="#" class="c-white"><i class="fa fa-youtube fa-lg"></i></a></li>
							<li><a href="#" class="c-white"><i class="fa fa-google-plus fa-lg"></i></a></li>
						</ul>
					</div>
				</div>
				<hr class="p-0 m-0-auto">
				<div class="row">
					<div class="col-md-4 md-center va-middle">
						<a href="index.html" class="va-middle"><img src="{{ url('assets/image/logo-white.png') }}" class="va-middle"></a>
					</div>
					<div class="col-md-8 text-right md-center va-middle">
						<ul class="list-inline  color-white">
							<li><a class="c-white">Terms &amp; Conditions</a></li>
							<li><a class="c-white">Privacy Policy</a></li>
							<li class="c-white">Copyright &copy; 2016 Holidayku. All Rights Reserved.</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	<!--Footer End-->
	</body>
</html>