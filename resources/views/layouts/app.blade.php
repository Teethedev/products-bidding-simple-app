<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('feather-icons/dist/feather.js') }}"></script>

    <!-- Fonts -->
   <!-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">-->

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
   </style>
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
          @guest
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
          @else
          <li class="nav-item text-nowrap">
          <a class="nav-link" href="{{ route('logout') }}">{{ __('Logout') }}</a>
        </li>
         @endguest
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">

        @extends('layouts.leftnav')
        
      </div>
    </div>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
        </main>
    </div>
     <script>
      feather.replace()
    </script>
</body>
</html>
