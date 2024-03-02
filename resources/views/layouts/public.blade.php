<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f92379971f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">


    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    {{-- Style --}}
    <style>
        /* Var with the color */
        :root {
            --main-color: #2196F3;
        }
        
        .ptxt {
            color: var(--main-color) !important;
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

        .btn.acept, .primary-color {
            background-color: var(--main-color) !important;
        }

        .wtxt {
            color: white !important;
        }

        .btn.cancel{
            background-color: #F44336 !important;
        }

    </style>

</head>

<body style="display: flex; flex-direction: column; min-height: 100vh; margin: 0;">

  

    <nav class="navbar navbar-expand-lg bg-primary primary-color" data-bs-theme="dark" >
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home.index')}}"><img src="{{ asset('images/logos-b.png') }}" style="margin-top: -5px; height: 30px;" alt="">PaySave</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home.index')}}">Inicio</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home.login')}}">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home.register')}}">Registrarse</a>
            </li>
            
        </ul>
        {{-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
        </div>
    </div>
    </nav>

    
    <main style="flex: 1;">
        @yield('content')
    </main>

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
