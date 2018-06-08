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

    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
   </style>
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

@guest
@else
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
          <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

        </li>
         @endguest
      </ul>
    </nav>
    @endguest

    <div class="container-fluid">
      <div class="row">

        @extends('layouts.leftnav')

      </div>
    </div>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
        </main>
    </div>
     
     <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('feather-icons/dist/feather.js') }}"></script>
     <script src="{{ asset('jquery/dist/jquery.slim.min.js') }}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="{{ asset('popper.js/dist/umd/popper.min.js') }}" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
     <script>
      feather.replace()
    </script>

    <script src="{{ asset('holderjs/holder.min.js') }}"></script>
    <script src="{{ asset('chart.js/dist/Chart.min.js') }}"></script>

<!--this should be only in the dashboard-->
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: <?php echo $product_names ?>,
          datasets: [{
            data: <?php echo $product_views ?>,
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              },
              scaleLabel: {
                display: true,
                labelString: 'Number of views'
               }
            }],
            xAxes: [{
              ticks: {
                beginAtZero: false
              },
              scaleLabel: {
                display: true,
                labelString: 'Products'
               }
            }]
          },
          legend: {
            display: false,
          },
          title: {
            display: true,
            text: 'Products vs Number of views'
         }
        }
      });
    </script>
</body>
</html>
