@extends('master')
@section('content')
<h2>List Product</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>stt</th>
			<th>Name</th>
			<th>Category</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@php
			$stt = 1;
		@endphp
		@foreach($products as $product)
		<tr>
			<td> {{ $stt++ }}</td>
			<td> {{ $product->name }}</td>
			<td> {{ $product->category->name }}</td>
			<td><a href=""><i class="fas fa-edit"></i></a></td>
			<td><a href=""><i class="fas fa-trash-alt"></i></a></td>
			
		</tr>
		@endforeach
	</tbody>
</table>
<button type="button" class="btn btn-outline-primary">Create</button>
@endsection
