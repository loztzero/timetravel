@extends('layouts.frontpage')
@section('content')


<h5>Input Sample</h5>

@include('layouts.message-helper')

<div class="row">
  <form class="col s12" action="save" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id" value="{{Input::old('id')}}">
    <div class="row">
      <div class="input-field col s12">
          <input placeholder="Kode File" id="fileCode" type="text" class="validate" name="fileCode" value="{{ Input::old('fileCode') }}">
          <label for="fileCode">kode File</label>
        </div>
    </div>
    
    <div class="row">
      <div class="file-field input-field">
        <input class="file-path validate" type="text"/>
        <div class="btn">
          <span>File</span>
          <input type="file" name="fileUpload" />
        </div>
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