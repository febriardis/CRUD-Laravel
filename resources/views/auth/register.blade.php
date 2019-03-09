@extends('layouts.layout')

@section('nav-right')
  <li class="nav-item">
    <a class="nav-link" href="{{route('login')}}">Login</a>
  </li>
@endsection

@section('content')
  <div class="container">
    <br><h2>Register Form</h2>
    <form method="POST" action="{{route('regist')}}">
    	@csrf
    	<div class="form-group">
	        <label for="name">Name</label>
	        <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
      	</div>
      	<div class="form-group">
	        <label for="email">Email</label>
	        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      	</div>
      	<div class="form-group">
	        <label for="pwd">Password</label>
	        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
      	</div>
      	<button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection