@if (Session::has('error'))
<div class="card-panel red lighten-5">
      <div class="red-text text-darken-2">
      	@if(!is_array(Session::get('error')))
		    {{ Session::get('error') }}
      	@else
	      	@foreach (Session::get('error') as $error)
			    {{ $error }} <br>
			@endforeach
      	@endif
      </div>
</div>
<div></div>
@elseif(Session::has('message'))
	<div class="card-panel blue lighten-5">
		<div class="blue-text text-darken-2">
			@if(!is_array(Session::get('message')))
			    {{ Session::get('message') }}
	      	@else
		      	@foreach (Session::get('message') as $message)
				    {{ $message }} <br>
				@endforeach
	      	@endif
		</div>
	</div>

@endif
