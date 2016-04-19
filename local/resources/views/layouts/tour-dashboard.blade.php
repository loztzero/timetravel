<div class="col-sm-3 md-none">
	<h4 class="bg-tomato p-1 c-white fw-700">
		<span>
			<i class="fa fa-bars"></i>
			DASHBOARD
		</span>
	</h4>
	<ul class="list-unstyled">
		<li class="p-05 {{ Request::segment(1) == 'tour-profile' ? 'active vendor' : '' }}">
			<a href="{{ url('tour-profile') }}" class="c-lightgrey">
				<i class="fa fa-user"></i>
				My Profile
			</a>
		</li>
		<li class="p-05 {{ Request::segment(1) == 'tour-review' ? 'active vendor' : '' }}">
			<a href="{{ url('tour-review') }}" class="c-lightgrey">
				<i class="fa fa-comments"></i>
				My Review
			</a>
		</li>
		<li class="p-05 {{ Request::segment(1) == 'tour-itinerary' ? 'active vendor' : '' }}">
			<a href="{{ url('tour-itinerary') }}" class="c-lightgrey">
				<i class="fa fa-map"></i>
				My Itinerary
			</a>
		</li>
		<li class="p-05 {{ Request::segment(1) == 'tour-album' ? 'active vendor' : '' }}">
			<a href="{{ url('tour-album') }}" class="c-lightgrey">
				<i class="fa fa-image"></i>
				My Album
			</a>
		</li>
	</ul>
</div>