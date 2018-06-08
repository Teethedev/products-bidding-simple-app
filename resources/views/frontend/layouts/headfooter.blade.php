<!-- app/views/nerds/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

    <script src="{{ asset('feather-icons/dist/feather.js') }}"></script>
    <script src="{{ asset('boostrap/dist/css/bootstrap.min.css') }}"></script>
    <script src="{{ asset('jquery/dist/jquery.slim.min.js') }}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ asset('popper.js/dist/popper.min.js') }}" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('/') }}">View All Products</a></li>
        @if (Route::has('login'))
                    @auth
                        <li><a href="{{ URL::to('dashboard/') }}">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <!--<li><a href="{{ route('register') }}">Register</a></li>-->
                    @endauth
        @endif
    </ul>

</nav>

@yield('content')

</div>
<script>
    feather.replace()
</script>
</body>
</html>

