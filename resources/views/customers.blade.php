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
@endsection