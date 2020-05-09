@extends('layouts.master')

@section('title')
	Create Customer
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<h1>Add New Customer</h1>		
	</div>
</div>

<div class="row">
	<div class="col-12">
	<form action="/customers" method="POST" class="pb-5">
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" placeholder="Your Name" value="{{ old('name') }}" class="form-control">
	</div>
	<div>{{ $errors->first('name') }}</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}" class="form-control">
	</div>
	<div>{{ $errors->first('email') }}</div>

	<div class="form-group">
		<select name="active" id="active" class="form-control">
			<option value="" disabled>Select Customer Status</option>
			<option value="1">Active</option>
			<option value="0">Inactive</option>
		</select>
	</div>

	<div class="form-group">
		<label for="company">Company</label>
		<select name="company_id" id="company" class="form-control">
			@foreach ($companies as $c)
				<option value="{{$c->id}}">{{$c->name}}</option>
			@endforeach
		</select>
	</div>

	<!-- <div class="form-group">
		<label for="random">Random</label>
		<input type="text" name="random" value="{{ old('random') }}" class="form-control">
		<div>{{ $errors->first('random') }}</div>
	</div> -->

	<button type="submit" class="btn btn-primary">Add Customer</button>
	@csrf
</form>
	</div>
</div>

@endsection