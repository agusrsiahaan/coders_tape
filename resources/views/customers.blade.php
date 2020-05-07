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


<ul>
	<li><a href="/">Home</a></li>
	<li><a href="/about">About Us</a></li>
	<li><a href="/contact">Contact Us</a></li>
	<li><a href="/customers">Customers</a></li>

</ul>

<ul>
	@foreach($customers as $customer)
		<li>{{$customer}}</li>
	@endforeach
</ul>

@endsection