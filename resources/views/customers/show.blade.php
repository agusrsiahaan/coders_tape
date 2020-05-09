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
		<h1>Details for {{$customer->name}}</h1>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<p><strong>Name </strong>{{$customer->name}}</p>
		<p><strong>Email </strong>{{$customer->email}}</p>
		<p><strong>Company </strong>{{$customer->company->name}}</p>
	</div>
</div>

@endsection