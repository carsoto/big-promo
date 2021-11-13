<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-mutate-approach="sync"></script>
</head>
<body>
    <div id="app">
        <loading-component :active="false"></loading-component>
        @include('common.user-nav')
        @yield('content')
        @include('common.user-footer')
        <instructions-component></instructions-component>
    </div>
</body>
</html>
