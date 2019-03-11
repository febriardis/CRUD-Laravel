@extends('layouts.layout')

@section('content')
<div class="container">
	<br><h2>Add Food</h2>
   	<form action="{{route('food.insert')}}" method="POST">
   		@csrf
   		<div class="form-group">
   			<label>Name</label>
   			<span class="text-danger">{{$errors->first('name')}}</span>
   			<input type="text" name="name" class="form-control" value="{{old('name')}}">
   		</div>   		
   		<div class="form-group">
   			<label>Type</label>
   			<span class="text-danger">{{$errors->first('type')}}</span>
   			<input type="text" name="type" class="form-control" value="{{old('type')}}">
   		</div>   		
   		<div class="form-group">
   			<label>Price</label>
   			<span class="text-danger">{{$errors->first('price')}}</span>
   			<input type="number" name="price" class="form-control" value="{{old('price')}}">
   		</div>
   		<button type="submit" class="btn btn-info">Add Food</button>
   	</form>
</div>
@endsection