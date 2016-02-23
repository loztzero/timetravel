@extends('layouts.tour-layout')
@section('content')
@include('layouts.message-helper')

	<!--Container Section-->
	<section class="container">
		<div class="space-1"></div>
		<div class="row user-panel vendor">
			<div class="col-sm-3 md-none">
				<h4 class="bg-tomato p-1 c-white fw-700">
					<span>
						<i class="fa fa-bars"></i>
						DASHBOARD
					</span>
				</h4>
				<ul class="list-unstyled">
					<li class="p-05">
						<a href="{{ url('tour-profile') }}" class="c-lightgrey">
							<i class="fa fa-user"></i>
							My Profile
						</a>
					</li>
					<li class="p-05">
						<a href="{{ url('tour-review') }}" class="c-lightgrey">
							<i class="fa fa-comments"></i>
							My Review
						</a>
					</li>
					<li class="p-05">
						<a href="{{ url('tour-itinerary') }}" class="c-lightgrey">
							<i class="fa fa-map"></i>
							My Itinerary
						</a>
					</li>
					<li class="p-05 active vendor">
						<a href="{{ url('tour-album') }}" class="c-lightgrey">
							<i class="fa fa-image"></i>
							My Album
						</a>
					</li>
					<li class="p-05 c-lightgrey">
						<i class="fa fa-signal"></i>
						Profile Strength
						<div class="space-1"></div>
							<div class="progress">
							<div class="progress-bar bg-java" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width:72%">
								<span class="fa-lg">72%</span>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<!--My Album-->
			<div class="col-sm-9">
				<!--My Album-->
				<h3 class="section-title text-center"><span class="c-lightgrey">MY ALBUM</span></h3>
				<hr class="s-title">
				<form role="form" class="form" method="post" action="{{ url('/tour-album/save') }}" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="fileUpload row form-group">
						<div class="col-sm-4">
							<input type="text" id="photo" class="form-control" placeholder="Photo Name" disabled>
							<div class="space-1"></div>
						</div>
						<div class="col-sm-4">
							<input type="text" id="title" name="title" class="form-control" placeholder="Title">
							<div class="space-1"></div>
						</div>
						<div class="col-sm-2">
							<div class="fileUpload btn form-control bg-java bc-java c-white">
								<span><i class="fa fa-folder"></i> Browse</span>
								<input id="file" type="file" name="photo" class="upload" />
							</div>
							<div class="space-1"></div>
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn form-control bg-cinnabar bc-cinnabar c-white"><i class="fa fa-upload"></i> Upload</button>
							<div class="space-1"></div>
						</div>
					</div>
				</form>
				<div class="row">
					@foreach($tourAlbum as $key => $value)
						<div class="col-md-4">
							<ul class="list-unstyled vendor-album">
								<li class="of-hidden"><img src="{{ url('assets/image/Album/'.$value->photo) }}" class="img-responsive wh-100"></li>
								<li class="text-center">
									<div class="col-xs-4 p-1">
										<a href="#" class="c-white">
											<i class="fa fa-thumbs-up"></i>
											Like it
										</a>
									</div>
									<div class="col-xs-4 p-1">
										<a href="#" class="c-white" data-toggle="modal" data-target="#commento">
											<i class="fa fa-comment"></i>
											{{ $value->tittle }}
										</a>
									</div>
									<div class="col-xs-4 p-1">
										<a href="{{ url('tour-album/delete', $value->id) }}" class="c-white">
											<i class="fa fa-trash">
										</a></i>
									</div>
								</li>
							</ul>
						</div>
					@endforeach
				</div>
				<div class="col-md-offset-0 col-md-12 p-0 text-center">
					{!! $tourAlbum->render() !!}
				</div>
			</div>
			<!--My Itinerary End-->
		</div>
		<br>
	</section>
	<!--Container Section End-->
@stop

@section('script')
<script src="{{ url('assets/js/tour-album.js') }}"></script>
@stop

@section('style')
<link rel="stylesheet" href="{{ url('assets/css/tour-album.css') }}" type="text/css">
@stop