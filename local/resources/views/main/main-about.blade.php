@extends('layouts.main-layout')
@section('content')

<section class="container">
    @include('layouts.message-helper')
    <!--Mengapa Holidayku Section-->
    <h2 class="section-title c-java text-center"><span><i class="fa fa-check"></i> About Us</span></h2>
    <ul>
        <li>
            Holidayku didirikan oleh3 orang pemuda yang memiliki passion atau hobi untuk traveling. Namun karena
             kesibukan kesibukan setiap travellers, maka untuk mencari paket liburan yang diinginkan
             sangatlah terbatas dari waktu dan jarak, Oleh karena itu Founder kita ya itu Ardian Tjandradiredja,
             Gekko Utomo dan Yuanita Legian menyatukan ide mereka yang pada akhirnya jadilah Holidayku.com
        </li>
        <li>
            Holidayku merupakan sebuah wadah dimana Holiday kudapat membantu
            setiap travellers mencari paket-paket liburan yang diinginkan atau diimpikan dengan harga / budget yang dapat disesuaikan.
        </li>
        <li>
            Selain itu Holidayku juga merupakan sarana promosi bagi para travel agent, dimana mereka dapat dengan mudah menjadi member Vendor dan mempost setia paket yang ingin mereka tawarkan.
        </li>
    </ul>


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
    <!--Mengapa Holidayku Section End-->
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
