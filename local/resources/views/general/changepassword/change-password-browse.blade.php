@extends('layouts.main-layout')
@section('content')

	<!--Container Section-->
	<section class="container">
		<div class="space-1"></div>
		<div class="row user-panel {{ Auth::user()->role == 'Tour' ? 'vendor' : '' }}">
			@if(Auth::user()->role == 'Tour')
				@include('layouts.tour-dashboard')
			@elseif(Auth::user()->role == 'User')
				@include('layouts.visitor-dashboard')
			@endif
			<!--Change Password-->
			<div class="col-sm-9">
				@include('layouts.message-helper')
				<!--Change Password-->
				<h3 class="section-title {{ Auth::user()->role == 'Tour' ? '' : 'c-dodger-blue' }} text-center">
					<span class="c-lightgrey">
						Change Password
					</span>
				</h3>
				<hr class="s-title">
				<form role="form" class="form-horizontal" method="post" action="{{ url('change-password/save') }}" data-toggle="validator">
					<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}">
					<input type="hidden" id="email" name="email" value="{{ Auth::user()->email }}">
					<div class="form-group">
						<div class="col-sm-6">
							<label class="control-label {{ Auth::user()->role == 'Tour' ? 'c-persimmon' : 'c-java' }}">Old Password</label>
							<input id="old_password" name="old_password" type="password" class="form-control br-0" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
							<label class="control-label {{ Auth::user()->role == 'Tour' ? 'c-persimmon' : 'c-java' }}">New Password</label>
							<input id="password" name="password" type="password" class="form-control br-0" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
							<label class="control-label {{ Auth::user()->role == 'Tour' ? 'c-persimmon' : 'c-java' }}">Confirm New Password</label>
							<input id="repassword" name="repassword" type="password" class="form-control br-0" required>
						</div>
					</div>
					<div class="form-group">
						<div class="space-1"></div>
						<div class="col-sm-6">
							<button type="submit" class="btn btn-default bg-persimmon bc-persimmon c-white fw-700">
								<i class="fa fa-check-circle-o"></i>
								SUBMIT
							</button>
						</div>
					</div>
				</form>
			</div>
			<!--Change Password End-->
		</div>
		<br>
	</section>
	<!--Container Section End-->
@stop
