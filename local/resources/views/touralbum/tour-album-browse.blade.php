@extends('layouts.frontpage')
@section('content')


<h5>My Journey</h5>

@include('layouts.message-helper')

<div class="row">
  <div class="col m4">
    <div class="z-depth-1" style="height:250px;padding:10px;">
      <a class="waves-effect waves-light">Message</a><br>
      <img src="" alt="No "><br>
      Title<br>
    </div>
  </div>

  <div class="col m4">
    <div class="z-depth-1" style="height:250px;padding:10px;">
      <a class="waves-effect waves-light">Message</a><br>
      <img src="" alt="No "><br>
      Title<br>
    </div>
  </div>

  <div class="col m4">
    <div class="z-depth-1" style="height:250px;padding:10px;">
      <a class="waves-effect waves-light">Message</a><br>
      <img src="" alt="No "><br>
      Title<br>
    </div>
  </div>

</div>

@stop

@section('script')
<script>
var app = angular.module("ui.project", ['ngSanitize']);
app.controller("MainCtrl", function ($scope, $http, $filter) {
});
</script>
@stop