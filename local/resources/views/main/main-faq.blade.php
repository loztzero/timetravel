@extends('layouts.main-layout')
@section('content')

<section class="container">
    @include('layouts.message-helper')
    <h2 class="section-title c-java text-center"><span><i class="fa fa-check"></i> FAQ</span></h2>
    <ul>
        <li>
            Q : Berapa harga yang harus dibayarkan oleh Vendor untuk bergabung dan membuat listing di Holidayku?
        </li>
        <li>
            A : Untuk membuat listing danmenjadi member di Holidaykuadalah gratis (FREE) dan berlaku sampai kapanpun
        </li>
        <li>
            Q : Apa yang membedakan Holidayku dengan travel fair?
        </li>
        <li>
            A : Yang membedakan adalah para Customer dapat mencari paket-paket yang diinginkan seperti pada travel fair, tapi tidak usah datang kelokasi, dan dapat diakses dimanapun
        </li>
    </ul>
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
