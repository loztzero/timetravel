@extends('layouts.tour-layout')
@section('content')
@include('layouts.message-helper')

	<!--Container Section-->
	<section class="container">
		<div class="space-1"></div>
		<div class="row user-panel vendor">
			@include('layouts.tour-dashboard')
			<!--My Album-->
			<div class="col-sm-9">
				<!--My Album-->
				<h3 class="section-title text-center"><span class="c-lightgrey">MY ALBUM</span></h3>
				<hr class="s-title">
				<form role="form" class="form" method="post" action="{{ url('tour-album/save') }}" enctype="multipart/form-data" data-toggle="validator">
					<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
					<div class="fileUpload row form-group">
						<div class="col-sm-4">
							<input type="text" id="photo" class="form-control" placeholder="Photo Name" disabled>
							<div class="space-1"></div>
						</div>
						<div class="col-sm-4">
							<input type="text" id="title" name="title" class="form-control" placeholder="Title" required>
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
								<li class="of-hidden">
									<img src="{{ url(config('constants.TOUR_ALBUM').Auth::user()->id.'/'.$value->photo) }}" style="width:262px !important;height:240px !important">
								</li>
								<li class="text-center">
									<a href="{{ url('tour-album/delete', $value->id) }}" class="c-white">
										<div class="col-xs-12 p-1">
											<i class="fa fa-trash"></i>
										</div>
									</a>
								</li>
							</ul>
						</div>
					@endforeach
				</div>
				<div class="col-md-offset-0 col-md-12 p-0 text-center">
					{!! $tourAlbum->render() !!}
				</div>
			</div>
			<!--My Album End-->
		</div>
		<br>
	</section>
	<!--Container Section End-->
@stop

@section('script')
<script src="{{ url('assets/js/tour-album.js') }}"></script>
@stop

@section('style')
<link rel="stylesheet" href="{{ url('assets/css/upload_photo.css') }}" type="text/css">
@stop