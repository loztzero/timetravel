<div class="container-fluid" id="sb-wrapper">
	<div class="container">
		<form class="form-inline p-0" role="form" id="SearchBar" method="get" action={{ url('main') }}>
			<img src="{{ url('assets/image/logo.png') }}" class="img-responsive d-none" id="sub-logo" style="cursor: pointer;" onclick="javascript: window.location = '{{ url('main') }}'">
			<div class="col-sm-2 text-center" id="s-label">
				<label class="control-label c-java">Search by</label>
			</div>
			<div class="col-sm-10 md-center">
				<div class="col-sm-2">
					<select class="form-control bc-java" name="category" id="category" value="{{ Request::get('category') }}">
						<option value="" {{ Request::get('category') == "" ? 'selected' : '' }}>All Category</option>
						<option value="Backpacker" {{ Request::get('category') == 'Backpacker' ? 'selected=true' : '' }}>Backpacker</option>
						<option value="Family" {{ Request::get('category') == 'Family' ? 'selected=true' : '' }}>Family</option>
						<option value="Honeymoon" {{ Request::get('category') == 'Honeymoon' ? 'selected=true' : '' }}>Honeymoon</option>
					</select>
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control bc-java" placeholder="Range budget from" name="budget_from" id="budget_from" value="{{ Request::get('budget_from') }}">
					<label class="control-label c-java">s/d</label>
					<input type="text" class="form-control bc-java" placeholder="Range budget to" name="budget_to" id="budget_to" value="{{ Request::get('budget_to') }}">
				</div>
				<div class="col-sm-2">
					<select id="countryIdSearch" name="countryIdSearch" class="form-control bc-java">
						<option value="" {{ Request::get('countryIdSearch') == "" ? 'selected' : '' }}>All Country</option>
						@foreach($countries as $key => $value)
							<option value="{{ $value->id }}" {{ Request::get('countryIdSearch') == $value->id ? 'selected=true' : '' }}>{{ $value->country_name }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-sm-2">
					<select id="cityIdSearch" name="cityIdSearch" class="form-control bc-java">
						<option value="" selected>All City</option>
					</select>
				</div>
				<div class="col-sm-2">
					<button type="submit" class="btn btn-block bg-tree-poppy c-white fw-700"> <i class="fa fa-search"></i></button>
				</div>
			</div>
		</form>
	</div>
</div>