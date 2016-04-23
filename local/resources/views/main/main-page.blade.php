@extends('layouts.visitor-layout')
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
	setCitiesSearch();

	$("#countryIdSearch").change(function(e){
		setCitiesSearch();
	});
});

function setCitiesSearch(){
	var countryIdSearch = $('#countryIdSearch').val();
	$.ajax({
		type: "GET",
		url : "main/city-by-country-search",
		data : {'countryIdSearch':countryIdSearch, '_token':'"{{ csrf_token() }}"'},
		success : function(data){
			data = JSON.parse(data);
			$("#cityIdSearch").html("<option value='%' selected>All City</option>");
			$.each(data, function(k, v) {
				$("#cityIdSearch").append("<option value='"+v.id+"'>"+v.city_name+"</option>");
			});
		}
	},"json");
}
</script>
@endsection
