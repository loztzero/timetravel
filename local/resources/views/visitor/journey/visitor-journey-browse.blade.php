@extends('layouts.visitor-layout')
@section('content')

<section class="container">
    <div class="space-1"></div>
    <div class="row user-panel">
        @include('layouts.visitor-dashboard')
        <div class="col-sm-9">

            @include('layouts.message-helper')
            <!--My Journey-->
            <h3 class="section-title text-center"><span class="c-lightgrey">MY JOURNEY</span></h3>
            <hr class="s-title">
            <div class="row">
                @foreach($visitorJourney as $record)
                <div class="col-md-4 col-sm-6 pop-wrapper">
                    <ul class="pop-box list-unstyled">
                        <li class="ask-it c-white"><a href="#"><i class="fa fa-times"></i></a></li>
                        <li><img src="{{ url('files/visitor/'.  Auth::user()->id .'/'. $record->photo) }}" ></li>
                        <li class="j-title"><a href="#" class="fw-400 c-white"><i class="fa fa-map-marker"></i> {{ $record->title }}</a></li>
                    </ul>
                </div>
                @endforeach
            </div>
            <br>
            <!--My Journey End-->
            <div class="row load-more">
                <div class="col-sm-4 md-none"><hr class="bc-dodger-blue"></div>
                <div class="col-sm-4 text-center" style="margin-top:.25em;"><a href="#">Load More</a></div>
                <div class="col-sm-4 md-none"><hr class="bc-dodger-blue"></div>
            </div>
            <div class="space-2"></div>
            <form role="form" class="form" method="post" action="{{ url('/visitor-journey/save') }}" enctype="multipart/form-data">
                <style>
                    .fileUpload {
                        position: relative;
                        overflow: hidden;
                        margin: 0px;
                    }

                    .fileUpload input.upload {
                        position: absolute;
                        top: 0;
                        right: 0;
                        margin: 0;
                        padding: 0;
                        font-size: 20px;
                        cursor: pointer;
                        opacity: 0;
                        filter: alpha(opacity=0);
                    }
                </style>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="fileUpload row form-group">
                    <div class="col-sm-4">
                        <input type="text" id="photo" class="form-control"  placeholder="Photo Name" disabled>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="title" name="title" class="form-control" placeholder="Title">
                    </div>
                    <div class="col-sm-2">
                        <div class="fileUpload btn form-control bg-java bc-java c-white">
                            <span><i class="fa fa-folder"></i> Browse</span>
                            <input id="file" type="file" name="photo" class="upload" />
                        </div>
                    </div>
                    <div class="col-sm-2">
                         <button type="submit" class="btn form-control bg-cinnabar bc-cinnabar c-white"><i class="fa fa-upload"></i> Upload</button>
                    </div>
                </div>
            </form>
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