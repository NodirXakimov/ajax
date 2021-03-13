<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learning AJAX</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @yield('styles')
</head>
<body>
<nav class="navbar navbar-expand bg-light fixed-top">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="{{ route('home') }}">Home</a>
    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('simpletable') }}">Simple Table</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('datatable') }}">DataTable</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('ajax') }}">AJAX DataTable</a>
        </li>
    </ul>

</nav>

<div class="container-xl pt-5">
   @yield('content')
   @yield('modal')
</div>
   @yield('scripts')
</body>
</html>
