@extends('layouts.frontpage')
@section('content')


<h5>My Profile</h5>

@include('layouts.message-helper')

<div class="row">
  <?php //print_r($profile);?>
  <form class="col s12" action="{{App::make('url')->to('/visitor-profile/save')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    @if($profile != null)
    <input type="hidden" name="id" value="{{ $profile->id }}">
    @endif

    <div class="row">
      <div class="input-field col s6">
        <img src="{{App::make('url')->to('files/visitor')}}/{{ $profile != null ? $profile->id .'/'. $profile->photo : null }}" width="200em" alt="No Image">
        <div class="file-field input-field">
          <div class="btn">
            <span>File</span>
            <input type="file" name="photo">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
      </div>

      <div class="input-field col s6">
        <input placeholder="Field 1" id="email" type="text" class="validate" name="email" value="{{ Input::old('email', Auth::user()->email) }}" readonly>
        <label for="email">Email</label>
      </div>

      <div class="input-field col s6">
        <input placeholder="Field 1" id="password" type="password" class="validate" name="password" value="{{ Input::old('password') }}">
        <label for="password">Password</label>
      </div>

    </div>

    <div class="row">
      <div class="input-field col s6">
        <input placeholder="First Name" id="firstName" type="text" class="validate" name="firstName" value="{{ Input::old('firstName', $profile != null ? $profile->first_name : '') }}">
        <label for="firstName">First Name</label>
      </div>

      <div class="input-field col s6">
        <input placeholder="Last name" id="lastName" type="text" class="validate" name="lastName" value="{{ Input::old('lastName', $profile != null ? $profile->last_name : '') }}">
        <label for="lastName">Last Name</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <input placeholder="Address 1" id="address1" type="text" class="validate" name="address1" value="{{ Input::old('address1', $profile != null ? $profile->address1 : '') }}">
        <label for="address1">Address</label>
      </div>

      <div class="input-field col s12">
        <input placeholder="Address 2" id="address2" type="text" class="validate" name="address2" value="{{ Input::old('address2', $profile != null ? $profile->address2 : '') }}">
      </div>

      <div class="input-field col s12">
        <input placeholder="Address 3" id="address3" type="text" class="validate" name="address3" value="{{ Input::old('address3', $profile != null ? $profile->address3 : '') }}">
      </div>
    </div>

    <div class="row">
      <div class="input-field col s3">
        <input placeholder="Zip Code" id="zipCode" type="text" class="validate" name="zipCode" value="{{ Input::old('zipCode', $profile != null ? $profile->zip_code : '') }}">
        <label for="zipCode">Zip Code</label>
      </div>
    </div>

    <div class="row">
      <div class="col s6">
        <label>Browser Select</label>
        <select class="browser-default">
          <option value="" disabled selected>Choose Your Country</option>
          <option value="1">Option 1</option>
          <option value="2">Option 2</option>
          <option value="3">Option 3</option>
        </select>
      </div>

      <div class="col s6">
        <label>Browser Select</label>
        <select class="browser-default">
          <option value="" disabled selected>Choose Your City</option>
          <option value="1">Option 1</option>
          <option value="2">Option 2</option>
          <option value="3">Option 3</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s3">
        <input placeholder="Phone Number" id="phoneNumber" type="text" class="validate" name="phoneNumber" value="{{ Input::old('phoneNumber', $profile != null ? $profile->phone_number : '') }}">
        <label for="phoneNumber">Phone Number</label>
      </div>
    </div>

    <div class="row">
      <button class="btn waves-effect waves-light" type="submit">
        Save My Profile<i class="material-icons right">send</i>
      </button>
    </div>
    
  </form>

</div>

@stop

@section('script')
<script>
var app = angular.module("ui.project", ['ngSanitize']);
app.controller("MainCtrl", function ($scope, $http, $filter) {
});
</script>
@stop