@extends('layouts.frontpage')
@section('content')


<h5>Add New Itenary</h5>

@include('layouts.message-helper')

<div class="row">
  <form class="col s12" action="save" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id" value="{{Input::old('id')}}">
    <div class="row">
      <div class="input-field col s12">
        <input placeholder="Title" id="title" type="text" class="validate" name="title" value="{{ Input::old('title') }}">
        <label for="title">Title</label>
      </div>

    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea id="description" class="materialize-textarea" name="description">{{Input::old('description')}}</textarea>
          <label for="description">Description</label>
      </div>
    </div>

    <div class="row">
      <button class="btn waves-effect waves-light" type="submit">
        Submit<i class="material-icons right">send</i>
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