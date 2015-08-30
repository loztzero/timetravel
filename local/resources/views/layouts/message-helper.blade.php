@if (Session::has('error'))
<div class="card-panel red lighten-5">
      <div class="red-text text-darken-2">
      	@foreach (Session::get('error') as $error)
		    {{ $error }} <br>
		@endforeach
      </div>
</div>
<div></div>  
@elseif(Session::has('message'))
	<div class="card-panel blue lighten-5">
		<div class="blue-text text-darken-2">
			@foreach (Session::get('message') as $message)
			    {{ $message }} <br>
			@endforeach
		</div>
	</div>
	  
@endif 