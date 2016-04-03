<!DOCTYPE html>
<html lang="en" ng-app="ui.project">
	<head>
		<title>Holidayku</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:200,300,400,400italic,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="{{ url('assets/image/favicon.ico') }}" type="img/ico">
		
		<link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ url('assets/css/flexslider.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
		
		<script src="{{ url('assets/js/jquery-2.1.4.min.js') }}"></script>
		<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ url('assets/js/jquery.flexslider-min.js') }}"></script>
		<script src="{{ url('assets/js/scrolling-nav.js') }}"></script>
		<script src="{{ url('assets/js/tour-layout.js') }}"></script>

		<style>
			.stickk{top: 0;position: fixed;z-index: 100;width: 100%;background: white;border-bottom: 6px solid #20b1c5;box-shadow: 0 2px 4px rgba(18,99,110,.75);}
			.fs1-right{font-size: .75em;text-align: right;padding-top: 1em;}
			.bg-light-java{background: rgb(250,250,250);}
		</style>
		
		@yield('style')
	</head>
	<body>
		<!--scroll to top-->
		{{-- url() --}}
		<a href="#" class="scrollToTop text-center"><i class="fa fa-arrow-circle-o-up fa-3x"></i><br>Scroll<br>To Top</a>
		<!--scroll to top end-->
		<!--Modals-->
		<div id="modals">
			<!--Modal Login-->
			<div class="modal fade" id="modlogin" role="dialog">
				<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span>&#215;</span></button>
							<img src="{{ url('assets/image/logo.png') }}" class="img-responsive" id="mod-logo">
							<div class="min-title text-center">
								<hr class="bc-dodger-blue">
								<div class="c-dodger-blue text-center"><span class="bg-white"><i class="fa fa-sign-in"></i> LOGIN</span></div>
							</div>
						</div>
						 
						<div class="modal-body">
							<form role="form" class="form-horizontal" method="POST" action="{{ url('main/check') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<div class="modal-input">
										<div class="col-xs-4">
											<label class="c-dodger-blue"><i class="fa fa-envelope-o"></i> E-mail</label>
										</div>
										<div class="col-xs-8">
											<input type="email" class="form-control" placeholder="Your e-mail address" name="email">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="modal-input">
										<div class="col-xs-4">
											<label class="c-dodger-blue"><i class="fa fa-key"></i> Password</label>
										</div>
										<div class="col-xs-8">
											<input type="password" class="form-control" placeholder="Your password" name="password">
										</div>
									</div>
								</div>
								<div class="space-1"></div>
								<div class="row form-group">
									<div class="col-sm-5">
										<button type="submit" class="btn btn-default bg-cinnabar"><span class="fw-700">LOGIN</span></button>
									</div>
									<div class="col-sm-2 text-center">
										<label class="control-label c-lightgrey">- OR -</label>
									</div>
									<div class="col-sm-5">
										<button type="submit" class="btn btn-default bg-facebook"><i class="fa fa-facebook-official"></i> Login with Facebook</button>
									</div>
								</div>
								<div class="space-1"></div>
								<div class="row form-group">
									<div class="col-sm-8 md-center">
										<input type="checkbox" id="keep-in">
										<label for="keep-in" class="fw-200">Biarkan saya tetap masuk</label>
									</div>
									<div class="col-sm-4 text-right md-center" >
										<a href="#">Forgot Password?</a>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<span>Not a member yet? Please click </span><a href="traveller-register.html" class="fw-700">here</a>
						</div>
					</div>
				</div>
			</div>

			<!--Modal Register-->
			<div class="modal fade" id="modregister" role="dialog">
				<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span>&#215;</span></button>
						<img src="{{ url('assets/image/logo.png') }}" class="img-responsive" id="mod-logo">
						<div class="min-title text-center">
							<hr class="bc-dodger-blue">
							<div class="c-dodger-blue text-center"><span class="bg-white"><i class="fa fa-sign-in"></i> REGISTER</span></div>
						</div>
					</div>
					 
					<div class="modal-body">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="modal-input">
									<div class="col-xs-4">
										<label class="c-dodger-blue"><i class="fa fa-envelope-o"></i> E-mail</label>
									</div>
									<div class="col-xs-8">
										<input type="email" class="form-control" placeholder="Your e-mail address">
									</div>
								</div>
							</div>
							<div class="space-1"></div>
							<div class="form-group">
								<div class="col-sm-3 md-none"></div>
								<div class="col-sm-6">
									<button type="submit" class="btn btn-default bg-cinnabar"><span class="fw-700">REGISTER</span></button>
								</div>
								<div class="col-sm-3 md-none"></div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<span>Are you a vendor? Please click </span><a href="{{ url('tour-register') }}" class="fw-700">here</a>
					</div>
					</div>
				</div>
			</div>
		</div>
		<!--Modals End-->

		<!--Header Section-->
		<header>
			<nav class="navbar bg-dodger-blue">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navi">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span> 
						</button>
						<a class="navbar-brand zi-1000" href="#" style="position:relative;">
							<img src="{{ url('assets/image/logo.png') }}" class="p-absolute zi-1000" style="margin:0 0 0 .4em;">
							<span class="md-none"><img src="{{ url('assets/image/pita.png') }}"></span>
						</a>
					</div>
					<div class="collapse navbar-collapse" id="Navi">
						<ul class="nav navbar-nav navbar-right">
							@if(!Auth::check())
								<li><a href="#" data-toggle="modal" data-target="#modregister" class="bg-tree-poppy c-white"><i class="fa fa-user-plus"></i> Register</a></li>
								<li><a href="#" data-toggle="modal" data-target="#modlogin" class="bg-cinnabar c-white"><i class="fa fa-sign-in"></i> Login</a></li>
								<li><a href="{{ url('tour-register') }}" class="bg-tall-poppy c-white"><i class="fa fa-users"></i> Join Us</a></li>
								@else
								<li class="dropdown">
									<a class="dropdown-toggle c-white" data-toggle="dropdown" href="#"><i class="fa fa-user"></i> {{ 'Hi, '. Auth::user()->email }} <i class="fa fa-caret-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="{{ url('tour-management') }}" class=""><i class="fa fa-user"></i> Tour Management</a></li>
										<li><a href="{{ url('') }}" class=""><i class="fa fa-comments-o"></i> My Review</a></li>
										<li><a href="{{ url('') }}" class=""><i class="fa fa-map"></i> My Itinerary</a></li>
										<li><a href="{{ url('') }}" class=""><i class="fa fa-location-arrow"></i> My Album</a></li> 
									</ul>
								</li>
								<li><a href="#" class="c-white"><i class="fa fa-envelope-o"></i> Messages</a></li>
								<li><a href="{{ url('auth/logout') }}" class="c-white"><i class="fa fa-sign-out"></i> Logout</a></li>
							@endif
						</ul> 
					</div>
				</div>
			</nav>
		</header>
		<!--Header End-->

		<!--Season Banner-->
		<div class="season md-none">

		</div>
		<!--Season Banner End-->

		<!--Form Section-->
		<div class="container-fluid" id="sb-wrapper">
			<div class="container">
				<form class="form-inline p-0" role="form" id="SearchBar">
					<img src="{{ url('assets/image/logo.png') }}" class="img-responsive d-none" id="sub-logo">
					<div class="col-sm-2 text-center" id="s-label">
						<label class="control-label c-java">Search by</label>
					</div>
					<div class="col-sm-10 md-center">
						<div class="col-sm-2">
							<select class="form-control bc-java">
								<option value="" selected>All Category</option>
								<option value="Backpacker">Backpacker</option>
								<option value="Family">Family</option>
								<option value="Honeymoon">Honeymoon</option>
							</select>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control bc-java" placeholder="Range budget from">
							<label class="control-label c-java">s/d</label>
							<input type="text" class="form-control bc-java" placeholder="Range budget to">
						</div>
						<div class="col-sm-2">
							<select id="countryIdSearch" name="countryIdSearch" class="form-control bc-java">
								<option value="" selected>All Country</option>
								@foreach($countries as $key => $value)
									<option value="{{ $value->id }}">{{ $value->country_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-sm-2">
							<select id="cityIdSearch" name="cityIdSearch" class="form-control bc-java">
								<option value="" selected>All City</option>
							</select>
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-block bg-tree-poppy c-white fw-700"> <i class="fa fa-search"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!--Form Section End-->

		<!--Container Section-->
		@yield('content')
		<!--Container Section End-->

		<!--Footer Section-->
		@include('layouts.admin-footer')
		<!--Footer End-->
	</body>
		
	@yield('script')
</html>