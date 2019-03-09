<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRUD-Laravel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="#">CRUD-Laravel</a>
    
    <!-- link left -->
    <ul class="navbar-nav mr-auto">
      @guest
      @else
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('home') ? 'active' : '') }}" href="{{route('home')}}">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Apps
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{route('book.index')}}">Book Store</a>
          <a class="dropdown-item" href="#">Food Store</a>
        </div>
      </li>
      <li class="nav-item">
        <a href="{{route('email.create')}}" class="nav-link {{ (Request::is('send mail') ? 'active' : '') }}">E-mail</a>
      </li>
      @endguest
    </ul>
    <!-- /link left -->

    <!-- link right -->
    <ul class="navbar-nav">
      @guest
        @yield('nav-right')
      @else
        <li class="nav-item">
          <a href="{{route('logout')}}" class="nav-link">Logout</a>
        </li>
      @endguest
    </ul>
    <!-- /link right -->
  </nav>

  <!-- content -->
  <div class="content">
    @yield('content')
  </div>
  <!-- /content -->

</body>
</html>
