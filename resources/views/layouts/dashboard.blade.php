<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Unnamed-CMS') }} Dashboard</title>

    <link rel="stylesheet" href="{{ asset('css/dashboard/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts/index.css') }}">
</head>

<body>
    @include('layouts.dashboard-header')
    @include('layouts.dashboard-sidebar')

    <section class="main-area">
      @yield('content')
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/admin/main.js') }}"></script>
    @yield('javascript')
</body>

</html>
