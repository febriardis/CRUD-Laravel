@extends('layouts.layout')

@section('content')
	<div class="container"><br>
		<h3>Food Store</h3>
		<a href="{{route('food.create')}}" class="btn btn-light">Add Food</a>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Type</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				{{!$n=1}}
				@foreach($foods as $food)
				<tr>
					<td>{{$n++}}</td>
					<td>{{$food->name}}</td>
					<td>{{$food->type}}</td>
					<td>{{$food->price}}</td>
					<td>
						
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection