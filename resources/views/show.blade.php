@extends('master')
@section('content')
@if(session('success'))
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Notification</h4>
		{{session('success')}}
	</div>
@endif
<h2>List Product</h2>
<a href="{{ route('logout') }}"> logout</a>
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
			<td> 
				<a href="{{ Route('detail-product',$product->id) }}"><i class="fas fa-eye"></i></a>
			</td>
			<td><a href="{{ route('delete-product',$product->id ) }}"
					onclick="return confirm('bạn chắc chắn muốn xóa')"><i class="fas fa-trash-alt"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>
<a href="{{ route('add-product') }}" class="btn btn-outline-primary">Create</a>
@endsection
