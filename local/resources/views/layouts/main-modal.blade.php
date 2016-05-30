<div id="modals">
	<!--Modal Login-->
	<div class="modal fade" id="modlogin" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span>&#215;</span></button>
					<a href="{{ url() }}"><img src="{{ url('assets/image/logo.png') }}" class="img-responsive" id="mod-logo"></a>
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
								<button type="button" onclick="javascript: window.location = '{{ url('facebook') }}'" class="btn btn-default bg-facebook"><i class="fa fa-facebook-official"></i> Login with Facebook</button>
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
					<span>Not a member yet? Please click </span>
					<!-- <a href="traveller-register.html" class="fw-700">here</a> -->
					<a href="#" data-toggle="modal" data-target="#modregister" data-dismiss="modal" class="fw-700">here</a>
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
				<a href="{{ url() }}"><img src="{{ url('assets/image/logo.png') }}" class="img-responsive" id="mod-logo"></a>
				<div class="min-title text-center">
					<hr class="bc-dodger-blue">
					<div class="c-dodger-blue text-center"><span class="bg-white"><i class="fa fa-sign-in"></i> REGISTER</span></div>
				</div>
			</div>
			 
			<div class="modal-body">
				<form role="form" class="form-horizontal" action="{{ url('main/register') }}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<div class="modal-input">
							<div class="col-xs-4">
								<label class="c-dodger-blue"><i class="fa fa-envelope-o"></i> E-mail</label>
							</div>
							<div class="col-xs-8">
								<input type="email" name="email" class="form-control" placeholder="Your e-mail address">
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