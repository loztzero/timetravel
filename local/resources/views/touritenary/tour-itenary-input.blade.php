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
        <img src="" alt="No Image">
        <div class="file-field input-field">
          <input class="file-path validate" type="text"/>
          <div class="btn">
            <span>File</span>
            <input type="file" />
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input placeholder="Category" id="category" type="text" name="category" value="{{ Input::old('category') }}">
        <label for="category">Category</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input placeholder="Currency" id="currency" type="text" class="validate" name="currency" value="{{ Input::old('currency') }}">
        <label for="currency">Currency</label>
      </div>
      <div class="input-field col s6">
        <input placeholder="Price" id="price" type="text" class="validate" name="price" value="{{ Input::old('price') }}">
        <label for="price">Price</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea id="description" name="description" class="materialize-textarea">{{Input::old('description')}}</textarea>
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