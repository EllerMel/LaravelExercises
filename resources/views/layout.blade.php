<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="spreadsheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Generate a URL for an asset using HTTPS -->
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">

    <title>@yield('title', 'Laravel Exercises')</title>

    {{ csrf_field() }}

  </head>
  <body>
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="/">Home</a>
    
      <!-- Links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/clock">Clock</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/countdown">Countdown</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/TicTacToe">TicTacToe</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/calculator">Calculator</a>
        </li>          
        <li class="nav-item">
          <a class="nav-link" href="/mindreader">MindReader</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/weather">Weather</a>
        </li>   
        <li class="nav-item">
          <a class="nav-link" href="/todoList">ToDos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/restaurant">Restaurant</a>
        </li>  
      </ul>
    </nav>

    <br>
    
    <div id="app" class="container">
        @yield('content')
    </div>
      



    <!-- Optional JavaScript -->
    <script src="/js/app.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>