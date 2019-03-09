@extends('layouts.layout')

@section('content')
<div class="container">
	<br><h2>Edit Book</h2>
   	<form action="{{route('book.update', $book->id)}}" method="POST">
   		@csrf
         @method('PUT')
   		<div class="form-group">
   			<label>Author</label>
   			<span class="text-danger">{{$errors->first('author')}}</span>
   			<input type="text" name="author" class="form-control" value="{{$book->author}}">
   		</div>   		
   		<div class="form-group">
   			<label>Title</label>
   			<span class="text-danger">{{$errors->first('title')}}</span>
   			<input type="text" name="title" class="form-control" value="{{$book->title}}">
   		</div>   		
   		<div class="form-group">
   			<label>Year</label>
   			<span class="text-danger">{{$errors->first('year')}}</span>
   			<input type="number" name="year" class="form-control" value="{{$book->year}}">
   		</div>
   		<button type="submit" class="btn btn-info">Add Book</button>
   	</form>
</div>
@endsection