<!-- app/views/nerds/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

    <script src="{{ asset('feather-icons/dist/feather.js') }}"></script>
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

