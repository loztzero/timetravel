@extends('layouts.frontpage')
@section('content')

<h5>My Itenary</h5>

@include('layouts.message-helper')
<table class="table table-striped table-bordered bordered striped">
  <thead>
    <tr>
      <th style="width:90px;">Action</th>
      <th>Title</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    @foreach($visitorItenary as $key => $value)
    <tr>
      <td>
        <div>
          <form action="{{URL::to('visitor-itenary/load-data')}}" method="post" style="float:left;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" value="{{$value->id}}" name="ID">
            <button class="btn-floating btn-small waves-effect waves-light blue" type="submit">
              <i class="material-icons left">mode_edit</i>
            </button>
          </form>
          <form action="{{URL::to('formula-nilai-akhir/delete')}}" method="post" style="float:right;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" value="{{$value->id}}" name="ID">
             <button class="btn-floating btn-small waves-effect waves-light red" type="submit">
              <i class="material-icons left">delete</i>
            </button>
          </form>
        </div>
      </td>
      <td>{{ $value->title }}</td>
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
        {{-- $visitorItenary->appends(Input::only('academic_year'))->links() --}}
      </div>
    </td>
  </tr>
</tfoot>
</table>

<a href="{{URL::to('visitor-itenary/input')}}" class="waves-effect waves-light btn">Make a itenary</a>

@stop

@section('script')
<script>
var app = angular.module("ui.project", []);
app.controller("MainCtrl", function ($scope, $http, $filter) {
});
</script>
@stop