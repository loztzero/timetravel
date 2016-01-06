<div id="loginModal" class="modal">
	<div class="modal-content">
		<h5>Login Here</h5>
		<form class="col s12" action="{{App::make('url')->to('/')}}/user/validate-user" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="input-field col s12">
					<input placeholder="Email" id="email" type="text" class="validate" name="email" focus>
					<label for="email">Email</label>
				</div>

			</div>
			<div class="row">
				<div class="input-field col s12">
					<input placeholder="Password" id="password" type="password" class="validate" name="password">
					<label for="password">Password</label>
				</div>
			</div>

			<div class="row">
				<button class="btn waves-effect waves-light" type="submit">
					Sign In<i class="material-icons right">send</i>
				</button>
				<button class="btn waves-effect waves-light" type="button">
					Forgot Password ?
				</button>
			</div>

		</form>
	</div>
</div>