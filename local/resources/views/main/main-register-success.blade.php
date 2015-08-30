@extends('layouts.frontpage')
@section('content')


<h5>Register Success</h5>
<p>
  Please activate check your mail to activate it.
</p>
@stop

@section('script')
<script>
var app = angular.module("ui.project", []);
app.controller("MainCtrl", function ($scope, $http, $filter) {
});
</script>
@stop