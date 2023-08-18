<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    {{-- Style --}}
    <style>
        /* Var with the color */
        :root {
            --main-color: #2196F3;
        }

        /* Change Color */
        input:focus {
            border-bottom: 1px solid var(--main-color) !important;
            box-shadow: 0 1px 0 0 var(--main-color) !important;
        }

        /* Chane after focus */
        input:focus+label {
            color: var(--main-color)  !important;
        }

        .btn.acept{
            background-color: var(--main-color) !important;
        }

        .btn.cancel{
            background-color: #F44336 !important;
        }

    </style>

</head>

<body>

    <nav>
        <div class="nav-wrapper blue">
            {{-- <a href="#!" class="brand-logo"><img src="{{ asset('images/p-1.png') }}" alt="10" srcset=""></a> --}}
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{route('home.login')}}">Iniciar Sesión</a></li>
                <li><a href="{{route('home.register')}}">Registrarse</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="{{route('home.login')}}">Iniciar Sesión</a></li>
        <li><a href="{{route('home.register')}}">Registrarse</a></li>
    </ul>


    @yield('content')
    {{-- Scripts --}}

    {{-- Messages --}}
    @if (session('error'))
        <script>
            M.toast({html: '{{ session('error') }}', classes: 'red darken-2'});
        </script>
    @endif

    @if (session('success'))
        <script>
            M.toast({html: '{{ session('error') }}', classes: 'green darken-2'});
        </script>
    @endif

</body>
@extends('layouts.footer')
<!-- Script de java -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);

        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems);
    });
</script>

</html>
