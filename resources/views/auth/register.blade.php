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
        <span class="text-danger">{{$errors->first('name')}}</span>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" value="{{old('name')}}">
    	</div>
    	<div class="form-group">
        <label for="email">Email</label>
        <span class="text-danger">{{$errors->first('email')}}</span>
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('email')}}">
    	</div>
    	<div class="form-group">
        <label for="pwd">Password</label>
        <span class="text-danger">{{$errors->first('pswd')}}</span>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" >
    	</div>
      <div class="form-group">
        <label for="pwd-confirmation">Confirm Password</label>
        <span class="text-danger">{{$errors->first('pswd-confirmation')}}</span>
        <input type="password" class="form-control" id="pwd-confirmation" placeholder="Re-enter password" name="pswd-confirmation">
      </div>
    	<button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection