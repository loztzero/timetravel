@if (Session::has('error'))
<div class="err-msg-alert">
	Error!<br>
	@if(!is_array(Session::get('error')))
		{{ Session::get('error') }}
	@else
		@foreach (Session::get('error') as $error)
			{{ $error }} <br>
		@endforeach
	@endif
</div>

@elseif(Session::has('message'))
<div class="success-msg-info">
	Info!<br>
	@if(!is_array(Session::get('message')))
		{{ Session::get('message') }}
	@else
		@foreach (Session::get('message') as $message)
			{{ $message }} <br>
		@endforeach
	@endif
</div>

@endif
