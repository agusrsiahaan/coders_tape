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
		<input type="text" name="name" placeholder="Your Name">
	</div>
	<button type="submit">Add Customer</button>
	@csrf
</form>

<ul>
	@foreach($customers as $customer)
		<li>{{$customer->name}}</li>
	@endforeach
</ul>

@endsection