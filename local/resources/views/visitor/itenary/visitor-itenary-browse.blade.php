@extends('layouts.visitor-layout')
@section('content')

    <!--Container Section-->
    <section class="container">
        <div class="space-1"></div>
        <div class="row user-panel">
            @include('layouts.visitor-dashboard')
            <div class="col-sm-9">
                <!--My Journey-->
                <h3 class="section-title c-dodger-blue text-center"><span class="c-lightgrey">MY ITINERARY</span></h3>
                <hr class="s-title">

                @include('layouts.message-helper')

                {{--LOOP DATA HERE--}}
                @foreach($visitorItenary as $key => $value)
                <div class="row iti-box">
                    <div class="col-md-8">
                        <a href="#" class="bg-java fw-700"><i class="fa fa-map-marker"></i> {{ $value->title }}</a>
                    </div>
                    <div class="col-md-2">
                        <form action="{{ url('visitor-itenary/load-data') }}" method="post" style="float:left;" id="formEdit">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" value="{{ $value->id }}" name="id">
                            <a class="bg-cinnabar" onclick="document.getElementById('formEdit').submit()"><i class="fa fa-edit"></i> edit</a>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <form action="{{ url('visitor-itenary/delete') }}" method="post" style="float:left;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" value="{{ $value->id }}" name="id">
                            <a class="bg-tall-poppy" ><i class="fa fa-trash"></i> delete</a>
                        </form>
                        
                    </div>
                </div>
                @endforeach
                <!--My Journey End-->

                <div class="pagination">
                    {!! $visitorItenary->render() !!}
                </div>
                <div class="col-md-offset-8 col-md-4 p-0">
                    <button class="btn btn-default bg-java bc-java c-white" onclick="window.location.assign('{{ url('visitor-itenary/input') }}')">Make Itenary</button>
                </div>
            </div>
        </div>
        <br>
    </section>
    <!--Container Section End-->
        
@endsection

@section('script')
<script>
$('.bg-tall-poppy').click(function () {
    var r = confirm("Are you sure want to delete this itenary ?");
    if (r == true) {
        $(this).closest("form").submit();
    }
});
//onclick="document.getElementById('formDelete').submit()"
</script>
@endsection