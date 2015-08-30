@extends('layouts.frontpage')
@section('content')


<h5>Input Sample</h5>

@include('layouts.message-helper')

<div class="row">
  <form class="col s12" action="save" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id" value="{{Input::old('id')}}">
    <div class="row">
      <div class="input-field col s12">
        <input placeholder="Field 1" id="field1" type="text" class="validate" name="field1" value="{{ Input::old('field1') }}">
        <label for="field1">Field1</label>
      </div>

    </div>
    <div class="row">
      <div class="input-field col s12">
        <input placeholder="Field 1" id="field1" type="text" class="validate" name="field2" value="{{ Input::old('field2') }}">
        <label for="field2">Field2</label>
      </div>
    </div>

    <div class="row">
      <button class="btn waves-effect waves-light" type="submit">
        Submit<i class="material-icons right">send</i>
      </button>
    </div>
    
  </form>

	<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <form class="col s12" action="sample/save" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{Input::old('id')}}">
	    <div class="row">
	      <div class="input-field col s12">
	        <input placeholder="Field 1" id="field1" type="text" class="validate" name="field1" value="{{ Input::old('field1') }}">
	        <label for="field1">Field1</label>
	      </div>

	    </div>
	    <div class="row">
	      <div class="input-field col s12">
	        <input placeholder="Field 1" id="field2" type="text" class="validate" name="field2" value="{{ Input::old('field2') }}">
	        <label for="field2">Field2</label>
	      </div>
	    </div>

	    <div class="row">
	      <button class="btn waves-effect waves-light" type="button">
	        Submit<i class="material-icons right">send</i>
	      </button>
	    </div>
	    
	  </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
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