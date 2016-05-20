@extends('layouts.main-layout')
@section('content')

<section class="container">
    @include('layouts.message-helper')
	<!--Mengapa Holidayku Section-->
	<h2 class="section-title c-java text-center"><span><i class="fa fa-check"></i> Mengapa Holidayku?</span></h2>
	<hr class="bc-java s-title">
	<div class="row">
		<div class="col-md-4 col-sm-6">
			<ul class="feat-box list-unstyled">
				<li>
					<h3 class="fw-700 c-java">
						<span class="feature-no bg-java c-white">1</span>
						Mudah
					</h3>
				</li>
				<li><hr class="bc-java"></li>
				<li>
					<p class="text-justify c-midgrey">
						Disini anda dapat mencari paket liburan dari berbagai vendor tour dengan mudah.
					</p>
				</li>
			</ul>
		</div>
		<div class="col-md-4 col-sm-6">
			<ul class="feat-box list-unstyled">
				<li>
					<h3 class="fw-700 c-java">
						<span class="feature-no bg-java c-white">2</span>
						Murah
					</h3>
				</li>
				<li><hr class="bc-java"></li>
				<li>
					<p class="text-justify c-midgrey">
						Tidak memerlukan tiket masuk untuk mencari tour sesuai budget anda.
					</p>
				</li>
			</ul>
		</div>
		<div class="col-md-4 col-sm-6">
			<ul class="feat-box list-unstyled">
				<li>
					<h3 class="fw-700 c-java">
						<span class="feature-no bg-java c-white">3</span>
						Cepat
					</h3>
				</li>
				<li><hr class="bc-java"></li>
				<li>
					<p class="text-justify c-midgrey">
						Holidayku memberikan layanan cepat kapanpun anda ingin mencari tour yang anda inginkan dimanapun anda berada.
					</p>
				</li>
			</ul>
		</div>
	</div>
	<!--Mengapa Holidayku Section End-->
    
    <!--Featured Destinations Section-->
    <h2 class="section-title c-dodger-blue text-center"><span><i class="fa fa-plane"></i> Featured Destinations</span></h2>
    <hr class="bc-java s-title">
    <div class="row">
        @foreach($tourItinerary as $record)
        <div class="col-md-3 col-sm-6 pop-wrapper">
            <ul class="pop-box list-unstyled">
                <li class="ask-it c-white">
                	<i class="fa fa-plane"></i>
					{{ $record->curr_code }} {{ number_format($record->price, 0, ',', '.') }} for {{ $record->category }}
				</li>
                <li><img src="{{ url('files/album/tour/') .'/'. $record->mst001_id . '/' . $record->photo }}" alt="{{ $record->photo }}" style="width:262px !important;height:240px !important"></li>
                <li class="inner-box">
                    <ul class="list-unstyled p-1">
                        <li><a href="{{ url('tour-itinerary-viewed/index', $record->id) }}" class="fw-400 c-white"><i class="fa fa-building-o"></i> {{ $record->title }}</a></li>
                        <li><hr class="bc-white"></li>
                        <li><a href="{{ url('tour-profile-viewed/index', $record->mst001_id) }}" class="fw-400 c-white"><i class="fa fa-date"></i> {{ $record->tour_name }}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        @endforeach
    </div>
    <br>
    <!--Featured Destinations Section End-->
	<div class="col-md-offset-0 col-md-12 p-0 text-center">
        {!! $tourItinerary->appends(Request::only('category', 'budget_from', 'budget_to', 'country', 'city'))->render() !!}

        {{-- {!! $tourItinerary->render() !!} --}}
    </div>
    <br>
</section>
@stop
