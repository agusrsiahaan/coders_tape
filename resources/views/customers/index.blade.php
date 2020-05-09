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
		<h1>Customer List</h1>
		<p><a href="customers/create">Add New Customer</a></p>		
	</div>
</div>

@foreach($customers as $customer)
<div class="row">
	<div class="col-2">
		{{$customer->id}}
	</div>
	<div class="col-4"><a href="/customers/{{$customer->id}}">{{$customer->name}}</a></div>
	<div class="col-4">{{$customer->company->name}}</div>
	<div class="col-2">{{$customer->active}}</div>
	<!-- <div class="col-2">{{$customer->active ? 'Active' : 'Inactive'}}</div> -->
</div>
@endforeach

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
				<li>{{$active->name}} <span class="text-muted">({{$active->email}})</span><span>({{$active->company->name}})</span></li>
			@endforeach
		</ul>
	</div>
	<div class="col-6">
		<ul>
			@foreach($inactiveCustomers as $inactive)
				<li>{{$inactive->name}} <span class="text-muted">({{$inactive->email}})</span><span>({{$inactive->company->name}})</span></li>
			@endforeach
		</ul>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-12">
		@foreach($companies as $c)
			<h3>{{ $c->name }}</h3>

			<ul>
				@foreach($c->customers as $cust)
					<li>{{$cust->name}}</li>
				@endforeach
			</ul>
		@endforeach
	</div>
</div>
@endsection