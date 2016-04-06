@extends('layouts.visitor-layout')
@section('content')

<section class="container">
    <div class="space-1"></div>
<!--            <hr class="bc-java s-title">-->
    <div class="row user-panel vendor">
        <div class="col-sm-3">
            <div class=" vendor-header">
                <div class="public-profile">
                <img src="image/travelmate_img.jpg" class="img-responsive">
            </div>
            <h3 class="fw-700 c-white text-center">{{ $tourProfile->tour_name }}</h3>
            <hr class="bc-white">
            <p class="c-white text-center fs-md">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin cursus sem at nulla viverra laoreet. Aliquam sagittis lectus augue, ac finibus ex dictum ut. Proin ac augue turpis."</p>
            <hr class="bc-white">
            <h4 class="c-white text-center">{{ $tourProfile->address1 }}</h4>
            <hr>
            <div class="fa-lg c-white vendor-contact">
                <div class="mb-1"><a href="#" class="c-white"><i class="fa fa-phone"></i> {{ $tourProfile->phone_number }}</a></div>
                <div class="mb-1"><a href="#" class="c-white"><i class="fa fa-plane"></i> Ask Itinerary</a></div>
                <div class=""><a href="public-vendor.html" class="c-white"><i class="fa fa-image"></i> Photo Album</a></div>
            </div>
            </div>
        </div>
        <div class="col-sm-9">
            <!--My Album-->
            <div class="row">
                <h2 class="c-dodger-blue text-center p-0 m-0">{{ $tourItenary->title }}</h2>
                <hr class="bc-dodger-blue">
            </div>
            <div class="row">
                <div class="col-sm-7 p-0">
                    <img class="img-responsive" src="image/hong-kong.jpg">
                </div>
                <div class="col-sm-5 p-0">
                    <h3 class="bg-java text-center p-05 m-0 c-white"><i class="fa fa-info-circle"></i> Description</h3>
                    <p class="para-quote c-lightgrey">
                        {{ $tourItenary->description }}
                    </p>
                </div>
                <div class="col-xs-12 p-1 fa-lg c-midgrey">
                    <span><i class="fa fa-tags"></i> Harga per pax:</span>
                    <span class="fw-600">US$ {{ $tourItenary->price }}</span>
                </div>
            </div>
            <div class="row text-center iti-details">
                <div class="col-md-2 col-xs-6">
                    <div class="bg-tall-poppy">Category</div>
                    <div>{{ $tourItenary->category }}</div>
                </div>
                <div class="col-md-2 col-xs-6">
                    <div class="bg-pinterest">Negara/Kota</div>
                    <div>{{ $itenaryCountry->country_name }}</div>
                </div>
                <div class="col-md-2 col-xs-6">
                    <div class="bg-cinnabar">Min. Pax</div>
                    <div>{{ $tourItenary->min_pax }} Pax</div>
                </div>
                <div class="col-md-2 col-xs-6">
                    <div class="bg-tree-poppy">Price</div>
                    <div>US$ {{ $tourItenary->price * $tourItenary->min_pax }}</div>
                </div>
                <div class="col-md-2 col-xs-6">
                    <div class="bg-facebook">Tanggal Awal</div>
                    <div>{{ $tourItenary->start_period }}</div>
                </div>
                <div class="col-md-2 col-xs-6">
                    <div class="bg-instagram">Tanggal Akhir</div>
                    <div>{{ $tourItenary->end_period }}</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                     <h3 class="c-java"><i class="fa fa-info-circle"></i> Description</h3>
                </div>
                <div class="col-md-12">
                    <p class="para-quote c-lightgrey m-0">
                        {{ $tourItenary->description }}
                    </p>
                </div>
            </div>
            <!--My Itinerary End-->
        </div>
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
});
</script>
@endsection
