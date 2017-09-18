<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mystic-WoW') }}</title>

    <link rel="stylesheet" href="{{ asset('css/forum.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts/index.css') }}">
</head>

<body>
  <div class="logo"></div>

  <nav>
    <a href="#">Home</a>
    <a href="#">User panel</a>
    <a href="#">Players Online</a>
    <div class="user-bar">
      @if (Auth::check())
        {{ Auth::user()->username }}
      @endif
    </div>
  </nav>

  <div class="forum">
    @yield('content')
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @yield('javascript')
</body>

</html>
