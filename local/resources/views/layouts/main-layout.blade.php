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
		<link rel="stylesheet" href="{{ url('assets/css/bootstrap-datepicker.css') }}">
		
		<script src="{{ url('assets/js/jquery-2.1.4.min.js') }}"></script>
		<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ url('assets/js/jquery.flexslider-min.js') }}"></script>
		<script src="{{ url('assets/js/scrolling-nav.js') }}"></script>
		<script src="{{ url('assets/js/bootstrap-datepicker.min.js') }}"></script>
		<script src="{{ url('assets/js/date.js') }}"></script>
		<script src="{{ url('assets/js/main-layout.js') }}"></script>
		
		<style>
			.stickk{top: 0;position: fixed;z-index: 100;width: 100%;background: white;border-bottom: 6px solid #20b1c5;box-shadow: 0 2px 4px rgba(18,99,110,.75);}
			.fs1-right{font-size: .75em;text-align: right;padding-top: 1em;}
			.bg-light-java{background: rgba(32, 177, 197,.05);}
		</style>
		
		@yield('style')
	</head>
	<body>
		<!--scroll to top-->
		<a href="#" class="scrollToTop text-center"><i class="fa fa-arrow-circle-o-up fa-3x"></i><br>Scroll<br>To Top</a>
		<!--scroll to top end-->
		
		<!--Modals-->
		@include('layouts.main-modal')
		<!--Modals End-->

		<!--Header Section-->
		@include('layouts.main-header')
		<!--Header End-->

		<!--Season Banner-->
		@include('layouts.main-banner')
		<!--Season Banner End-->

		<!--Slideshow-->
		@include('layouts.main-slideshow')
		<!--Slideshow End-->

		<!--Form Section-->
		@include('layouts.main-search')
		<!--Form Section End-->

		<!--Container Section-->
		@yield('content')
		<!--Container Section End-->

		<!--Footer Section-->
		@include('layouts.main-footer')
		<!--Footer End-->
	</body>
		
	@yield('script')
</html>