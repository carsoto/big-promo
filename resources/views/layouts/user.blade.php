<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">

    <meta property="og:title" content="BIG Cola" />
    <meta property="og:type" content="Sorteo" />
    <meta property="og:url" content="https://www.bigpromo.ec/" />
    <meta property="og:image" content="{{ asset('img/big-social.png') }}" />
    <meta property="og:description" content="Destapa tu sueño" />

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
            
            <wrapper-transition-component>
                @yield('content')
            </wrapper-transition-component>

            @include('common.user-footer')
            <instructions-component></instructions-component>
            <help-component />
    </div>
</body>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GQQGS722F1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GQQGS722F1');
</script>
</html>
