@extends('layouts.master')

@section('title', 'Edit Details for '. $customer->name)

@section('content')
<div class="row">
	<div class="col-12">
		<h1>Edit Details For {{ $customer->name }}</h1>		
	</div>
</div>

<div class="row">
	<div class="col-12">
	<form action="/customers/{{ $customer->id }}" method="POST" class="pb-5">
	@method('PATCH')
	@include('customers.form')
		
	<button type="submit" class="btn btn-primary">Save Customer</button>

	</form>
	</div>
</div>

@endsection