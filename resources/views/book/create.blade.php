@extends('layouts.layout')

@section('content')
<div class="container">
	<br><h2>Add Book</h2>
   	<form action="{{route('book.insert')}}" method="POST">
   		@csrf
   		<div class="form-group">
   			<label>Author</label>
   			<span class="text-danger">{{$errors->first('author')}}</span>
   			<input type="text" name="author" class="form-control" value="{{old('author')}}">
   		</div>   		
   		<div class="form-group">
   			<label>Title</label>
   			<span class="text-danger">{{$errors->first('title')}}</span>
   			<input type="text" name="title" class="form-control" value="{{old('title')}}">
   		</div>   		
   		<div class="form-group">
   			<label>Year</label>
   			<span class="text-danger">{{$errors->first('year')}}</span>
   			<input type="number" name="year" class="form-control" value="{{old('year')}}">
   		</div>
   		<button type="submit" class="btn btn-info">Add Book</button>
   	</form>
</div>
@endsection