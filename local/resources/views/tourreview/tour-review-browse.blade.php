@extends('layouts.frontpage')
@section('content')

<h5>Review</h5>

@include('layouts.message-helper')
<table class="table table-striped table-bordered bordered striped">
  <tbody>
		<table class="table table-striped table-bordered bordered striped">
			@foreach($tourReview as $key => $value)
				<div class="row">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title">{{ $value->category }}Yudha</span>
    						
    						@for($i = 0; $i < 5 - $value->range; $i++)
								<i class="small material-icons right">grade</i>
    						@endfor
							
    						@for($i = 0; $i < $value->range; $i++)
								<i class="small material-icons right yellow-text">grade</i>
    						@endfor
    						
							<p>{{ $value->review }}</p>
						</div>
					</div>
				</div>
			@endforeach
		</table>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="10">
        <div class="pagination">
        {{-- $tourReview->appends(Input::only('academic_year'))->links() --}}
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