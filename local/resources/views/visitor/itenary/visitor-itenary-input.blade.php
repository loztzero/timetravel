@extends('layouts.visitor-layout')
@section('content')

    <!--Container Section-->
    <section class="container">
        <div class="space-1"></div>
        <div class="row user-panel">
            @include('layouts.visitor-dashboard')
            <div class="col-sm-9">
                <!--My Journey-->

                <h3 class="section-title c-dodger-blue text-center"><span class="c-lightgrey">MY ITINERARY INPUT</span></h3>
                <hr class="s-title">
               
                @include('layouts.message-helper')

                <form action="{{ url('visitor-itenary/save') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ Input::old('id') }}">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{ Input::old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description">{{ Input::old('description') }}</textarea>
                    </div>

                    <!--My Journey End-->

                    <div class="col-md-offset-8 col-md-4 p-0">
                        <button class="btn btn-default bg-java bc-java c-white" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
    </section>
    <!--Container Section End-->
        
@stop