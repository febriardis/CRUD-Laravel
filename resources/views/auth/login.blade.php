@extends('layouts.layout')
  
@section('nav-right')
  <li class="nav-item">
    <a class="nav-link" href="{{route('register')}}">Register</a>
  </li>
@endsection

@section('content')
  <div class="container">
    <br><h2>Login Form</h2>
    <form action="{{route('log')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
      </div>
      <div class="form-group form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="remember"> Remember me
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
      <a class="btn btn-link" href="">
        {{ __('Forgot Your Password?') }}
      </a>
    </form>
  </div>
@endsection