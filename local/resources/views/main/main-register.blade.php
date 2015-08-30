@extends('layouts.frontpage')
@section('content')


<h5>Register My Journey Time</h5>

@include('layouts.message-helper')
<br>
<div class="row">
  <form class="col s12" action="save" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{Input::old('id')}}">
    <div class="row">
      <div class="input-field col s12">
        <input placeholder="Email" id="email" type="email" class="validate" name="email" value="{{ Input::old('email') }}">
        <label for="email">Email</label>
      </div>

    </div>
    <div class="row">
     <div class="input-field col s12">
        <input placeholder="Password" id="password" type="password" class="validate" name="password" value="{{ Input::old( 'password') }}">
        <label for="password">Password</label>
      </div>
    </div>

    <div class="row">
     <div class="input-field col s12">
        <input placeholder="Confirm Password" id="repassword" type="password" class="validate" name="repassword" value="{{ Input::old( 'repassword') }}">
        <label for="repassword">Confirm Password</label>
      </div>
    </div>

    <div class="row">
      <button class="btn waves-effect waves-light" type="submit">
        Register<i class="material-icons right">send</i>
      </button>
    </div>
    
  </form>
</div>

@stop

@section('script')
<script>
var app = angular.module("ui.project", []);
app.controller("MainCtrl", function ($scope, $http, $filter) {
});
</script>
@stop