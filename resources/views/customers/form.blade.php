<div class="form-group">
	<label for="name">Name</label>
	<input type="text" name="name" id="name" placeholder="Your Name" value="{{ old('name') ?? $customer->name }}" class="form-control">
</div>
<div>{{ $errors->first('name') }}</div>

<div class="form-group">
	<label for="email">Email</label>
	<input type="email" id="email" name="email" placeholder="Your Email" value="{{ old('email') ?? $customer->email }}" class="form-control">
</div>
<div>{{ $errors->first('email') }}</div>

<div class="form-group">
	<select name="active" id="active" class="form-control">
		<!-- <option value="" disabled>Select Customer Status</option>
		<option value="1" {{ $customer->active == 'Active' ? 'selected' : '' }}>Active</option>
		<option value="0" {{ $customer->active == 'Inactive' ? 'selected' : '' }}>Inactive</option> -->
		@foreach($customer->activeOptions() as $activeOptionkey => $activeOptionValue)
			<option value="{{$activeOptionkey}}" {{$customer->active == $activeOptionValue ? 'selected' : ''}}>{{$activeOptionValue}}</option>
		@endforeach
	</select>
</div>

<div class="form-group">
	<label for="company">Company</label>
	<select name="company_id" id="company" class="form-control">
		@foreach ($companies as $c)
			<option value="{{$c->id}}" {{$c->id == $customer->company_id ? 'selected' : ''}}>{{$c->name}}</option>
		@endforeach
	</select>
</div>

<!-- <div class="form-group">
		<label for="random">Random</label>
		<input type="text" name="random" value="{{ old('random') }}" class="form-control">
		<div>{{ $errors->first('random') }}</div>
</div> -->

@csrf