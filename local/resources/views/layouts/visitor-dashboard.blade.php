<div class="col-sm-3 md-none">
    <h4 class="bg-dodger-blue p-1 c-white fw-700"><span><i class="fa fa-bars"></i> DASHBOARD </span></h4>
    <ul class="list-unstyled">
        <li class="p-05 {{ Request::segment(1) == 'visitor-profile' ? 'active' : '' }}"><a href="{{ url('visitor-profile') }}" class="c-lightgrey"><i class="fa fa-user"></i> My Profile</a></li>
        <li class="p-05 {{ Request::segment(1) == 'visitor-favourite-tour' ? 'active' : '' }}"><a href="{{ url('visitor-favorite-tour') }}" class="c-lightgrey"><i class="fa fa-heart"></i> My Favourite Tour</a></li>
        <li class="p-05 {{ Request::segment(1) == 'visitor-itenary' ? 'active' : '' }}"><a href="{{ url('visitor-itenary') }}" class="c-lightgrey"><i class="fa fa-map"></i> My Itinerary</a></li>
        <li class="p-05 {{ Request::segment(1) == 'visitor-journey' ? 'active' : '' }}"><a href="{{ url('visitor-journey') }}" class="c-lightgrey"><i class="fa fa-location-arrow"></i> My Journey</a></li> 
        <li class="p-05 {{ Request::segment(1) == 'change-password' ? 'active' : '' }}"><a href="{{ url('change-password') }}" class="c-lightgrey"><i class="fa fa-edit"></i> Change Password</a></li> 
    </ul>
</div>