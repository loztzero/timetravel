<div class="col-sm-3 md-none">
	<h4 class="bg-tomato p-1 c-white fw-700">
		<span>
			<i class="fa fa-bars"></i>
			DASHBOARD
		</span>
	</h4>
	<ul class="list-unstyled">
		<li class="p-05 {{ Request::segment(1) == 'tour-management' ? 'active vendor' : '' }}">
			<a href="{{ url('tour-management') }}" class="c-lightgrey">
				<i class="fa fa-user"></i>
				Tour Management
			</a>
		</li>
		<li class="p-05 {{ Request::segment(1) == '' ? 'active vendor' : '' }}">
			<a href="{{ url('') }}" class="c-lightgrey">
				<i class="fa fa-comments"></i>
				My Review
			</a>
		</li>
		<li class="p-05 {{ Request::segment(1) == '' ? 'active vendor' : '' }}">
			<a href="{{ url('') }}" class="c-lightgrey">
				<i class="fa fa-map"></i>
				My Itinerary
			</a>
		</li>
		<li class="p-05 {{ Request::segment(1) == '' ? 'active vendor' : '' }}">
			<a href="{{ url('') }}" class="c-lightgrey">
				<i class="fa fa-image"></i>
				My Album
			</a>
		</li>
	</ul>
</div>