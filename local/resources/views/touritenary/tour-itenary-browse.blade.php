@extends('layouts.frontpage')
@section('content')

<h5>My Itenary</h5>

@include('layouts.message-helper')
<table class="table table-striped table-bordered bordered striped">
  <thead>
    <tr>
      <th style="width:90px;">Edit</th>
      <th style="width:90px;">Delete</th>
      <th>Category</th>
      <th>Currency</th>
      <th>Price</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tourItenary as $key => $value)
    <tr>
      <td>
        <div>
          <form action="{{URL::to('tour-itenary/load-data')}}" method="post" style="float:left;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" value="{{$value->id}}" name="ID">
            <button class="btn-floating btn-small waves-effect waves-light blue" type="submit">
              <i class="material-icons left">mode_edit</i>
            </button>
          </form>
          </div>
      </td>
      <td>
        <div>
          <form action="{{URL::to('tour-itenary/delete')}}" method="post" style="float:left;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" value="{{$value->id}}" name="ID">
             <button class="btn-floating btn-small waves-effect waves-light red" type="submit">
              <i class="material-icons left">delete</i>
            </button>
          </form>
        </div>
      </td>
      <td>{{ $value->category }}</td>
      <td>{{ $value->currency }}</td>
      <td>{{ $value->price }}</td>
      <td>{{ $value->description }}</td>
    </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="10">
        <div class="pagination">
          <!-- appends(Input::except('page'))
          appends(Input::only('data-from', 'date-to')
        -->
        {{-- $tourItenary->appends(Input::only('academic_year'))->links() --}}
      </div>
    </td>
  </tr>
</tfoot>
</table>

<a href="{{URL::to('tour-itenary/input')}}" class="waves-effect waves-light btn">Make a itenary</a>

@stop

@section('script')
<script>
var app = angular.module("ui.project", []);
app.controller("MainCtrl", function ($scope, $http, $filter) {
});
</script>
@stop