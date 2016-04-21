@extends('layouts.admin-layout')
@section('content')
@include('layouts.message-helper')

	<!--Container Section-->
	<div id="modals-vendor">
		<div class="modal fade" id="modmake" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span>&#215;</span></button>
						<div class="min-title text-center">
							<h2 class="c-dodger-blue fa-2x">Profile Data</h2>
						</div>
					</div>
					<div class="space-1"></div>
				</div>
			</div>
		</div>
	</div>
	<!--Modal Make Package End-->
	
	<section class="container">
		<div class="space-1"></div>
		<div class="row user-panel vendor">
			@include('layouts.admin-dashboard')
			<!--My Album-->
			<div class="col-sm-9">
				<!--My Album-->
				<h3 class="section-title text-center"><span class="c-lightgrey">TOUR MANAGEMENT</span></h3>
				<hr class="s-title">
				<div class="row">
					@foreach($userTour as $key => $value)
						<div class="col-md-4">
							<ul class="list-unstyled vendor-album">
								<li class="of-hidden">
									@if ($value->tour)
										<img src="{{ url(config('constants.TOUR_ALBUM').$value->id.'/'.$value->tour->logo) }}" style="width:262px !important;height:240px !important">
									@else
										<img src="{{ url('assets/image/def-pic-vendor.png') }}" class="img-responsive wh-100">
									@endif
								</li>
								<li class="text-center">
									<div class="col-xs-8 p-1">
										<a href="" onClick="getData('{{ $value->id }}')" class="c-white" data-toggle="modal" data-target="#modmake">
											@if ($value->tour)
												{{ $value->tour->tour_name }}
											@else
												&nbsp;
											@endif
										</a>
									</div>
									<div class="col-xs-4 p-1">
										<a href="{{ url('tour-management/change-status', $value->id) }}" class="c-white">
											{{ $value->status }}
										</a>
									</div>
								</li>
							</ul>
						</div>
					@endforeach
				</div>
				<div class="col-md-offset-0 col-md-12 p-0 text-center">
					{!! $userTour->render() !!}
				</div>
			</div>
			<!--My Album End-->
		</div>
		<br>
	</section>
	<!--Container Section End-->
@stop

@section('script')
<script src="{{ url('assets/js/tour-management.js') }}"></script>
@stop
