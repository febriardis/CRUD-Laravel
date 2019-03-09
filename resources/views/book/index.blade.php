@extends('layouts.layout')

@section('content')
	<div class="container"><br>
		<h3>Book Store</h3>
		<a href="{{route('book.create')}}" class="btn btn-light">Add Book</a>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Author</th>
					<th>Title</th>
					<th>Year</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				{{!$no=1}}
				@foreach($books as $book)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$book->author}}</td>
					<td>{{$book->title}}</td>
					<td>{{$book->year}}</td>
					<td align="center">
						<a href="{{route('book.edit', $book->id)}}" class="btn btn-primary btn-sm" style="float: left;">Edit</a>
						<form action="{{route('book.delete', $book->id)}}" method="POST" onclick="return confirmDelete()">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger btn-sm" style="float: left;">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<!-- script js -->
	<script type="text/javascript">
		function confirmDelete() {
			var x = confirm("Yakin akan menghapus data?");
			if (x) {
				return true;
			}else{
				return false;
			}
		}
	</script>
	<!-- /script js -->
@endsection