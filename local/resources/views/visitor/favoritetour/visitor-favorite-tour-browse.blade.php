@extends('layouts.main-layout')
@section('content')

<section class="container">
    <div class="space-1"></div>
    <div class="row user-panel">
        @include('layouts.visitor-dashboard')
        <div class="col-sm-9">

            @include('layouts.message-helper')
            <!--My Favorite Tour-->
            <h3 class="section-title text-center"><span class="c-lightgrey">MY FAVOURITE TOUR</span></h3>
            <hr class="s-title">
            <div class="row">
                @foreach($favoriteTours as $record)
                <div class="col-md-4 fav-wrapper">
                    <ul class="pop-box list-unstyled">
                        <li class="text-right">
                            <a href="#" class="f-left">
                                <i class="fa fa-envelope-o"></i> messages <span class="badge bg-tree-poppy c-darkgrey">12</span></a>
                            <a href="#"><i class="fa fa-times"></i></a>
                        </li>
                        <li><img src="{{ url('files/tour/'.  $record->mst001_id .'/'. $record->tour->logo) }}" ></li>
                        <li class="j-title vendor"><a href="#" class="fw-400 c-white"><i class="fa fa-building-o"></i> {{ $record->tour->tour_name }}</a>
                        </li>
                        <li class="j-title">{{ $record->tour->address1 }}</li>
                        <li class="j-title fs-sm text-right">
                            <span class="badge bg-ygreen f-left"><a href="#" class="c-white">Review</a></span>
                            <span class="badge bg-dodger-blue"><a href="#" class="c-white"><i class="fa fa-plane"></i> Ask Itinerary</a></span>
                        </li>
                    </ul>
                </div>

                @endforeach
            </div>
            <br>
            <!--My Favorite Tour End-->
        </div>
    </div>
    <br>
</section>
@stop

@section('script')
<script>
$( "#file" ).change(function() {
    var photo = $('input[type=file]')[0].files[0].name;
    $('#photo').val(photo);
});

</script>
@stop