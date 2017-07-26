<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mystic-WoW') }}</title>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts/index.css') }}">
</head>

<body>
    @include('layouts.page-header')

    <div class="main-section">
        <div class="main-section-content">
            @yield('content')

            @include('layouts/sidebar')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>

</html>
