<header>
	<nav class="navbar bg-dodger-blue">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navi">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
				<a class="navbar-brand zi-1000" href="{{ url('main') }}" style="position:relative;">
					<img src="{{ url('assets/image/logo.png') }}" class="p-absolute zi-1000" style="margin:0 0 0 .4em;cursor: pointer;" onclick="javascript: window.location.href = '{{ url() }}'">
					<span class="md-none"><img src="{{ url('assets/image/pita.png') }}"></span>
				</a>
			</div>
			<div class="collapse navbar-collapse" id="Navi">
				<ul class="nav navbar-nav navbar-right">
					@if(!Auth::check())
						<li><a href="#" data-toggle="modal" data-target="#modregister" class="bg-tree-poppy c-white"><i class="fa fa-user-plus"></i> Register</a></li>
						<li><a href="#" data-toggle="modal" data-target="#modlogin" class="bg-cinnabar c-white"><i class="fa fa-sign-in"></i> Login</a></li>
					@else
						<li class="dropdown">
							<a class="dropdown-toggle c-white" data-toggle="dropdown" href="#"><i class="fa fa-user"></i> {{ 'Hi, '. Auth::user()->email }} <i class="fa fa-caret-down"></i></a>
							@if(Auth::user()->role == 'Tour')
								@include('layouts.tour-menu')
							@elseif(Auth::user()->role == 'User')
								@include('layouts.visitor-menu')
							@else
								@include('layouts.admin-menu')
							 @endif
						</li>
						<li><a href="#" class="c-white"><i class="fa fa-envelope-o"></i> Messages</a></li>
						<li><a href="{{ url('auth/logout') }}" class="c-white"><i class="fa fa-sign-out"></i> Logout</a></li>
					@endif
				</ul> 
			</div>
		</div>
	</nav>
</header>