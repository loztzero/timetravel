@extends('layouts.visitor-layout')
@section('content')

<section class="container">
    @include('layouts.message-helper')
    <!--Mengapa Holidayku Section-->
    <h2 class="section-title c-java text-center"><span><i class="fa fa-check"></i> Mengapa Holidayku?</span></h2>
    <hr class="bc-java s-title">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <ul class="feat-box list-unstyled">
                <li><h3 class="fw-700 c-java"><span class="feature-no bg-java c-white">1</span> Feature</h3></li>
                <li><hr class="bc-java"></li>
                <li>
                    <p class="text-justify c-midgrey">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac commodo urna. Donec volutpat mi id nibh blandit pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    </p>
                </li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-6">
            <ul class="feat-box list-unstyled">
                <li><h3 class="fw-700 c-java"><span class="feature-no bg-java c-white">2</span> Feature</h3></li>
                <li><hr class="bc-java"></li>
                <li>
                    <p class="text-justify c-midgrey">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac commodo urna. Donec volutpat mi id nibh blandit pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    </p>
                </li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-6">
            <ul class="feat-box list-unstyled">
                <li><h3 class="fw-700 c-java"><span class="feature-no bg-java c-white">3</span> Feature</h3></li>
                <li><hr class="bc-java"></li>
                <li>
                    <p class="text-justify c-midgrey">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac commodo urna. Donec volutpat mi id nibh blandit pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    </p>
                </li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-6">
            <ul class="feat-box list-unstyled">
                <li><h3 class="fw-700 c-java"><span class="feature-no bg-java c-white">4</span> Feature</h3></li>
                <li><hr class="bc-java"></li>
                <li>
                    <p class="text-justify c-midgrey">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac commodo urna. Donec volutpat mi id nibh blandit pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
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
        <div class="col-md-3 col-sm-6 pop-wrapper">
            <ul class="pop-box list-unstyled">
                <li class="ask-it c-white"><a href="#"><i class="fa fa-plane"></i> Price</a></li>
                <li><img src="{{ url('assets/image/hk.jpg') }}" ></li>
                <li class="inner-box">
                    <ul class="list-unstyled p-1">
                        <li><a href="#" class="fw-400 c-white"><i class="fa fa-building-o"></i> PT. TravelMate Indonesia</a></li>
                        <!--<li><hr class="bc-white"></li>
                         <li class="row text-center">
                            <a class="col-xs-4"><span class="badge bg-tree-poppy"><i class="fa fa-save"></i> Save</span></a>
                            <a class="col-xs-4 b-lr-dotted"><span class="badge bg-cinnabar"><i class="fa fa-eye"></i> 1700x</span></a>
                            <a class="col-xs-4"><span class="badge bg-java"><i class="fa fa-thumbs-up"></i> 1024</span></a>
                        </li> -->
                    </ul>
                </li>
            </ul>
        </div>
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
    <div class="pagination">
        {!! $tourItinerary->appends(Request::only('category', 'budget_from', 'budget_to', 'country', 'city'))->render() !!}

        {{-- {!! $tourItinerary->render() !!} --}}
    </div>
    <!-- <div class="row load-more">
        <div class="col-sm-5 md-none"><hr class="bc-dodger-blue"></div>
        <div class="col-sm-2 text-center" style="margin-top:.25em;"><a href="#">Load More</a></div>
        <div class="col-sm-5 md-none"><hr class="bc-dodger-blue"></div>
    </div> -->
    <br>
</section>
@stop

@section('script')
<script>
var firstLoad = true;
function setMainCities(){

    $.post("{{ url('main/city-by-country') }}",
    {
        _token: '{{ csrf_token() }}',
        country: $('#mainCountry').val()//this.value
    },
    function(data, status){
        //alert("Data: " + data + "\nStatus: " + status);
        // var id =
        //$("#city").html("<option>Only This</option>");
        //console.log(data);

        $("#mainCity").html("<option value=''>All</option>");
        $.each(data, function(k, v) {
            // console.log(k + '-' + v.id);
            $("#mainCity").append("<option value='"+v.id+"'>"+v.city_name+"</option>");
        });

        if(firstLoad){
            firstLoad = false;
            $('#mainCity').val('{{ Request::get("city", "") }}')
        }


    }, 'json');

}

$('#mainCountry').on('change', function(){
    setMainCities();
});

$(document).ready(function () {
    setMainCities();
});
</script>
@endsection
