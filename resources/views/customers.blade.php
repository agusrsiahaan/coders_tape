@extends('layouts.master')

@section('content')
<h1>Customers</h1>

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

<form action="customers" method="POST" class="pb-5">

	<div class="input-group">
		<input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}">
	</div>
	<div>{{ $errors->first('name') }}</div>

	<div class="input-group">
		<input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}">
	</div>
	<div>{{ $errors->first('email') }}</div>

	<button type="submit">Add Customer</button>
	@csrf
</form>

<ul>
	@foreach($customers as $customer)
		<li>{{$customer->name}} <span class="text-muted">({{ $customer->email }})</span></li>
	@endforeach
</ul>

@endsection