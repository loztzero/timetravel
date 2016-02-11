@extends('layouts.tour-layout')
@section('content')

<!--Container Section-->
<section class="container">
<div class="space-1"></div>
<div class="row user-panel">
<div class="col-sm-3 md-none">
<h4 class="bg-dodger-blue p-1 c-white fw-700"><span><i class="fa fa-bars"></i> DASHBOARD</span></h4>
<ul class="list-unstyled">
<li class="p-05"><a href="traveller-profile.html" class="c-lightgrey"><i class="fa fa-user"></i> My Profile</a></li>
<li class="p-05"><a href="traveller-favourite.html" class="c-lightgrey"><i class="fa fa-heart"></i> My Favourite Tour</a></li>
<li class="p-05 active"><a href="traveller-itinerary.html" class="c-lightgrey"><i class="fa fa-map"></i> My Itinerary</a></li>
<li class="p-05"><a href="traveller-journey.html" class="c-lightgrey"><i class="fa fa-location-arrow"></i> My Journey</a></li> 
</ul>
</div>
<div class="col-sm-9">
<!--My Journey-->
<h3 class="section-title c-dodger-blue text-center"><span class="c-lightgrey">MY ITINERARY</span></h3>
<hr class="s-title">

@include('layouts.message-helper')

{{--LOOP DATA HERE--}}
@foreach($visitorItenary as $key => $value)
<div class="row iti-box">
<div class="col-md-8">
<a href="#" class="bg-java fw-700"><i class="fa fa-map-marker"></i> {{ $value->title }}</a>
</div>
<div class="col-md-2">
<form action="{{ url('visitor-itenary/load-data') }}" method="post" style="float:left;" id="formEdit">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" value="{{ $value->id }}" name="id">
<a class="bg-cinnabar" onclick="document.getElementById('formEdit').submit()"><i class="fa fa-edit"></i> edit</a>
</form>
</div>
<div class="col-md-2">
<form action="{{ url('visitor-itenary/delete') }}" method="post" style="float:left;" id="formDelete">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" value="{{ $value->id }}" name="id">
<a class="bg-tall-poppy" onclick="document.getElementById('formDelete').submit()"><i class="fa fa-trash"></i> delete</a>
</form>

</div>
</div>
@endforeach
<!--My Journey End-->

<div class="col-md-offset-8 col-md-4 p-0">
<button class="btn btn-default bg-java bc-java c-white" onclick="window.location.assign('{{ url('visitor-itenary/input') }}')">Make Itenary</button>
</div>
</div>
</div>
<br>
</section>
<!--Container Section End-->

@stop