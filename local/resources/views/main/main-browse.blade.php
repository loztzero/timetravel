@extends('layouts.frontpage')
@section('content')

<div class="row">
	<div class="col m4">
	  <div class="z-depth-1" style="height:250px;">
	  	z-depth-1
	  </div>
	</div>

	<div class="col m4">
	  <div class="z-depth-1" style="height:250px;">
	  	z-depth-1
	  </div>
	</div>

	<div class="col m4">
	  <div class="z-depth-1" style="height:250px;">
	  	z-depth-1
	  </div>
	</div>
</div>


@stop

@section('script')
<script>
var app = angular.module("ui.project", []);
app.controller("MainCtrl", function ($scope, $http, $filter) {
});
</script>
@stop