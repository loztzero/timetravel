@extends('layouts.tour-layout')
@section('content')

	<!--Container Section-->
	<script>
		$(document).scroll(function() {
			if($(window).scrollTop() > $("header").height() && $(window).width() > 768) {
				$("#sb-wrapper").addClass("stickk");
				$("#sub-logo").removeClass("d-none");
				$("#s-label").addClass("fs1-right");
				$("#SearchBar").css({"background":"none"});
			} else {
				$("#sb-wrapper").removeClass("stickk");
				$("#sub-logo").addClass("d-none");
				$("#s-label").removeClass("fs1-right");
				$("#SearchBar").css({"background":"rgb(250,250,250)"});
			}
		});
	</script>
	<!--Form Section End-->
	
	<!--Container Section-->
	<section class="container">
		<div class="space-1"></div>
		<h3 class="section-title text-center m-0">
			<span class="c-java">VENDOR ALBUM</span>
		</h3>
		<hr class="bc-java s-title">
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
			<!--My Album-->
			<div class="col-sm-9">
				<div class="row">
					@foreach($tourAlbum as $key => $value)
						<div class="col-md-4">
							<ul class="list-unstyled vendor-album">
								<li class="of-hidden"><img src="image/hk.jpg" class="img-responsive wh-100"></li>
								<li class="text-center">
									<div class="col-xs-6 p-1">
										<a href="#" class="c-white">
											<i class="fa fa-thumbs-up"></i>
											Like it
										</a>
									</div>
									<div class="col-xs-6 p-1">
										<a href="#" class="c-white" data-toggle="modal" data-target="#commento">
											<i class="fa fa-comment"></i>
											{{ $value->tittle }}
										</a>
									</div>
								</li>
							</ul>
						</div>
					@endforeach
				</div>
			</div>
			<!--My Itinerary End-->
		</div>
		<br>
	</section>
	<!--Container Section End-->

@stop