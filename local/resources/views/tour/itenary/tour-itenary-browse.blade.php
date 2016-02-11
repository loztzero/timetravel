@extends('layouts.tour-layout')
@section('content')

	<!--Modal Make Package-->
	<div id="modals-vendor">
		<div class="modal fade" id="modmake" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span>&#215;</span></button>
						<div class="min-title text-center">
							<h2 class="c-dodger-blue fa-3x">Create Itinerary</h2>
						</div>
					</div>
					<div class="space-1"></div>
					<form role="form" class="form-horizontal">
						<div class="form-group">
							<div class="col-md-4 text-center" style="padding: 0 2.1em;">
								<button type="submit" class="p-0" style="border:none;">
									<img src="image/def-image.png" class="img-responsive ">
								</button>
								<div class="space-1"></div>
							</div>
							<div class="col-md-8">
								<div class="col-md-6">
									<label class="control-label c-dodger-blue fa-lg fw-400">Currency</label>
									<input type="text" class="form-control">
									<div class="space-1"></div>
								</div>
								<div class="col-md-6">
									<label class="control-label c-dodger-blue fa-lg fw-400">Price</label>
									<input type="text" class="form-control">
									<div class="space-1"></div>
								</div>
								<div class="col-md-12">
									<label class="control-label c-dodger-blue fa-lg fw-400">Category</label>
									<select class="form-control br-0">
										<option selected>Category</option>
										<option>Category 1</option>
										<option>Category 2</option>
										<option>Category 3</option>
									</select>
									<div class="col-md-12 space-1"></div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12" style="padding:0 2.1em;">
								<label class="control-label c-dodger-blue fa-lg fw-400">Description</label>
								<textarea class="form-control br-0"></textarea>
								<div class="space-1"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-6 col-md-6" style="padding:0 2.1em;">
								<button type="submit" class="btn btn-default form-control br-0 bg-dodger-blue bc-dodger-blue c-white ">SUBMIT</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--Modal Make Package End-->

	<!--Container Section-->
	<section class="container">
		<div class="space-1"></div>
		<div class="row user-panel vendor">
			<div class="col-sm-3 md-none">
				<h4 class="bg-tomato p-1 c-white fw-700"><span><i class="fa fa-bars"></i> DASHBOARD</span></h4>
				<ul class="list-unstyled">
					<li class="p-05 active vendor">
						<a href="vendor-profile.html" class="c-lightgrey">
							<i class="fa fa-user"></i>
							My Profile
						</a>
					</li>
					<li class="p-05">
						<a href="vendor-review.html" class="c-lightgrey">
							<i class="fa fa-comments"></i>
							My Review
						</a>
					</li>
					<li class="p-05">
						<a href="vendor-itinerary.html" class="c-lightgrey">
							<i class="fa fa-map"></i>
							My Itinerary
						</a>
					</li>
					<li class="p-05">
						<a href="vendor-album.html" class="c-lightgrey">
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
			<!--My Itinerary-->
			<div class="col-sm-9">
				<h3 class="section-title text-center"><span class="c-lightgrey">MY ITINERARY</span></h3>
				<hr class="s-title">
				@foreach($tourItenary as $key => $value)
					<div class="row iti-box vendor">
						<div class="col-md-3">
							<a href="#" class="bg-java fw-700"><i class="fa fa-map-marker"></i>{{ $value->description }}</a>
						</div>
						<div class="col-md-2 img-vendor">
							<img src="image/alaska-whales-usa.jpg" class="img-responsive">
						</div>
						<div class="col-md-2">
							<span>{{ $value->category }}</span>
						</div>
						<div class="col-md-1 col-xs-3">
							<span class="badge bg-java ">{{ $value->currency }}</span>
						</div>
						<div class="col-md-2">
							<span>{{ $value->price }}</span>
						</div>
						<div class="col-md-1 col-xs-6">
							<a href="" class="bg-cinnabar"><i class="fa fa-edit"></i></a>
						</div>
						<div class="col-md-1 col-xs-6">
							<a href="" class="bg-tall-poppy" data-toggle="tooltip" title="delete"><i class="fa fa-trash"></i></a>
						</div>
					</div>
				@endforeach
				<div class="col-md-offset-8 col-md-4 p-0">
					<a href="#" class="bc-persimmon bg-persimmon c-white p-1 md-w-100" data-toggle="modal" data-target="#modmake">Make Package</a>
				</div>
			</div>
			<!--My Itinerary End-->
		</div>
		<br>
	</section>
	<!--Container Section End-->

@stop