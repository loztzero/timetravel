@extends('layouts.main-layout')
@section('content')

<section class="container">
    @include('layouts.message-helper')
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
                        <li><a href="{{ url('tour-profile-viewed/index', $record->mst001_id) }}" class="fw-400 c-white"><i class="fa fa-date"></i> {{ date('d-m-Y', strtotime($record->start_period)) }} To {{ date('d-m-Y', strtotime($record->end_period)) }}</a></li>
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
