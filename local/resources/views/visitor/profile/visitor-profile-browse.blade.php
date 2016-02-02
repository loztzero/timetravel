@extends('layouts.visitor-layout')
@section('content')

<section class="container">
    <div class="space-1"></div>
    <div class="row user-panel">
        <div class="col-sm-3 md-none">
            <h4 class="bg-dodger-blue p-1 c-white fw-700"><span><i class="fa fa-bars"></i> DASHBOARD</span></h4>
            <ul class="list-unstyled">
                <li class="p-05 active"><a href="traveller-profile.html" class="c-lightgrey"><i class="fa fa-user"></i> My Profile</a></li>
                <li class="p-05"><a href="traveller-favourite.html" class="c-lightgrey"><i class="fa fa-heart"></i> My Favourite Tour</a></li>
                <li class="p-05"><a href="traveller-itinerary.html" class="c-lightgrey"><i class="fa fa-map"></i> My Itinerary</a></li>
                <li class="p-05"><a href="traveller-journey.html" class="c-lightgrey"><i class="fa fa-location-arrow"></i> My Journey</a></li> 
            </ul>
        </div>
        <div class="col-sm-9">

            @include('layouts.message-helper')
            <!--My Profile-->
            <h3 class="section-title c-dodger-blue text-center"><span class="c-lightgrey">MY PROFILE</span></h3>
            <hr class="s-title">
            <form role="form" method="POST" class="form-horizontal" id="edit-profile" action="visitor-profile/save">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if($profile != null)
                    <input type="hidden" name="id" value="{{ $profile->id }}">
                @endif

                <div class="form-group">
                    <div class="col-sm-3 md-center">
                        <img src="image/def-pic-traveller.png">
                    </div>
                    <div class="col-sm-9">
                        <label class="control-label c-java"> E-mail</label>
                        <input type="email" class="form-control br-0 input-lg" placeholder="john-doe@example.com" value="{{ Auth::user()->email }}" readonly>
                        <div class="space-1"></div>
                        <label class="control-label c-java"> Password</label>
                        <input type="password" class="form-control input-lg br-0" name="password">
                    </div>
                </div>
                <div class="space-1"></div>
                <hr class="bc-lightgrey">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label class="control-label c-java">First name</label>
                        <input type="text" class="form-control input-lg br-0" placeholder="Your First Name" name="firstName" value="{{ Input::old('firstName', $profile != null ? $profile->first_name : '') }}">
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label c-java">Last name</label>
                        <input type="text" class="form-control input-lg br-0" placeholder="Your Last Name" name="lastName" value="{{ Input::old('lastName', $profile != null ? $profile->last_name : '') }}">
                    </div>
                </div>
                <div class="space-1"></div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="control-label c-java">Address</label>
                        <input type="text" class="form-control input-lg br-0" placeholder="Address line 1" name="address1" value="{{ Input::old('address1', $profile != null ? $profile->address1 : '') }}"><br>
                        <input type="text" class="form-control input-lg br-0" placeholder="Address line 2" name="address2" value="{{ Input::old('address2', $profile != null ? $profile->address2 : '') }}">
                    </div>
                </div>
                <div class="space-1"></div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label class="control-label c-java">Zip Code</label>
                        <input type="text" class="form-control input-lg br-0" placeholder="Zip Code/Postal Code" name="zipCode" value="{{ Input::old('zipCode', $profile != null ? $profile->zip_code : '') }}"><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label class="control-label c-java">Country</label>
                        {!! Form::select('country', ([null => 'Select Your Country'] + $countries->toArray()), Input::old('country', $profile != null ? $profile->country : null), array('class'=>'form-control input-lg br-0', 'id' => 'country')) !!}
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label c-java">City</label>
                        <select class="form-control input-lg br-0" id="city">
                            <option value>Select A City</option>
                        </select>
                    </div>
                </div>
                <div class="space-1"></div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label class="control-label c-java">Phone number</label>
                        <input type="tel" class="form-control input-lg br-0" placeholder="e.g. +628711000" name="phoneNumber" value="{{ Input::old('phoneNumber', $profile != null ? $profile->phone_number : '') }}"><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label>
                          <input type="checkbox"> <span class="c-lightgrey fw-400">Subscribe to Newsletter</span>
                        </label>
                    </div>
                </div>
                <hr class="bc-lightgrey">
                <div class="space-1"></div>
                <div class="col-md-offset-5 col-md-3 p-0">
                    <button type="submit" class="btn btn-default bg-java bc-java c-white fw-700"><i class="fa fa-check-circle-o"></i> SUBMIT</button>
                </div>
                <div class="col-md-offset-1 col-md-3 p-0">
                    <button type="submit" class="btn btn-default bg-tall-poppy bc-tall-poppy c-white fw-700"><i class="fa fa-times-circle-o"></i> CANCEL</button>
                </div>
            </form>
            <!--My Profile End-->
        </div>
    </div>
    <br>
</section>
@stop

@section('script')
<script>
$('#country').on('change', function(){
    //alert(this.value);
    $.post("{{ url('visitor-profile/city-by-country') }}",
    {
        _token: '{{ csrf_token() }}',
        country: this.value
    },
    function(data, status){
        //alert("Data: " + data + "\nStatus: " + status);
        // var id = 
        //$("#city").html("<option>Only This</option>");
        //console.log(data);

        $("#city").html("<option>Select Your City</option>");
        $.each(data, function(k, v) {
            console.log(k + '-' + v.id);
            $("#city").append("<option value='"+v.id+"'>"+v.city_name+"</option>");
        });
    }, 'json');
});
</script>
@stop