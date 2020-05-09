@extends('layouts.master')

@section('title')
	Customer List
@endsection

@section('content')


<!-- <ul>
	<?php
		foreach ($customers as $customer) {
			echo '<li>'.$customer.'</li>';
		}
	?>
</ul> -->


<!-- <ul>
	<li><a href="/">Home</a></li>
	<li><a href="/about">About Us</a></li>
	<li><a href="/contact">Contact Us</a></li>
	<li><a href="/customers">Customers</a></li>

</ul> -->

<div class="row">
	<div class="col-12">
		<h1>Customers</h1>		
	</div>
</div>

<div class="row">
	<div class="col-12">
	<form action="customers" method="POST" class="pb-5">
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

<div class="row">
	<div class="col-12">
	<ul>
		@foreach($customers as $customer)
			<li>{{$customer->name}} <span class="text-muted">({{ $customer->email }})</span></li>
		@endforeach
	</ul>		
	</div>
</div>

<hr>
<div class="row">
	<div class="col-6">
		<ul>
			@foreach($activeCustomers as $active)
				<li>{{$active->name}} <span class="text-muted">({{$active->email}})</span></li>
			@endforeach
		</ul>
	</div>
	<div class="col-6">
		<ul>
			@foreach($inactiveCustomers as $inactive)
				<li>{{$inactive->name}} <span class="text-muted">({{$inactive->email}})</span></li>
			@endforeach
		</ul>
	</div>
</div>
@endsection