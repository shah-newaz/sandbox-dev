<!DOCTYPE html>
<html>
<head>
    <title>@section("title") Sandbox :: @show</title>
    @section("css")
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    @show
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('home') }}">Sandbox</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
      </li>

      @if(!auth()->user())

        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>

      @else

        <li class="nav-item">
          <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('product.index') }}">Products</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">Logout</a>
        </li>

        <li class="nav-item pull-right">
          <a class="nav-link" href="#">Logged in as: {{ auth()->user()->name }}</a>
        </li>

      @endif

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<br /> <br />
<div class="container">
    <div class="row">
        <div class="col-md-8">
          
            @if(session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @yield("content")
        </div>
        <div class="col-md-4">
            <h3>Sidebar</h3>
            <hr/>
            @yield("sidebar")
        </div>
    </div>
</div>
@section("js")
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
@show
</body>
</html>