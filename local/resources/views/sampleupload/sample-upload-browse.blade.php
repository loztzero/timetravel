@extends('layouts.frontpage')
@section('content')

<h5>Master Sample Upload</h5>

@include('layouts.message-helper')
<table class="table table-striped table-bordered bordered striped">
  <caption style="text-align:left;">
    <b>Daftar Sample Upload</b> | <a href="{{URL::to('sample-upload/input')}}">Tambah Sample Upload</a>
  </caption>
  <thead>
    <tr>
      <th style="width:90px;">Aksi</th>
      <th>Kode File</th>
      <th>Nama File Upload</th>
    </tr>
  </thead>
  <tbody>
    @foreach($sampleUpload as $key => $value)
    <tr>
      <td>
        <div>
          <form action="{{URL::to('sample-upload/load-data')}}" method="post" style="float:left;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" value="{{$value->id}}" name="ID">
            <button class="btn-floating btn-small waves-effect waves-light blue" type="submit">
              <i class="material-icons left">mode_edit</i>
            </button>
          </form>
          <form action="{{URL::to('sample-upload/delete')}}" method="post" style="float:right;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" value="{{$value->id}}" name="ID">
             <button class="btn-floating btn-small waves-effect waves-light red" type="submit">
              <i class="material-icons left">delete</i>
            </button>
          </form>
        </div>
      </td>
      <td>{{ $value->file_code }}</td>
      <td><img src="./files/{{ $value->file_upload }}" width="100px" /></td>
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
        {{-- $sample->appends(Input::only('academic_year'))->links() --}}
      </div>
    </td>
  </tr>
</tfoot>
</table>

@stop

@section('script')
<script>
var app = angular.module("ui.project", []);
app.controller("MainCtrl", function ($scope, $http, $filter) {
});
</script>
@stop