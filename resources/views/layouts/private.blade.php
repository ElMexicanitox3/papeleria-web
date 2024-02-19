<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f92379971f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">



    <!-- Jquery -->

    {{-- Style --}}
    <style>
        /* Var with the color */
        :root {
            --main-color: #2196F3;
            --active-color: #64b5f6;
        }

        /* Change Color */
        input:focus {
            border-bottom: 1px solid var(--main-color) !important;
            box-shadow: 0 1px 0 0 var(--main-color) !important;
        }

        /* Chane after focus */
        input:focus+label {
            color: var(--main-color) !important;
        }

        .btn.acept {
            background-color: var(--main-color) !important;
        }

        .btn.cancel {
            background-color: #F44336 !important;
        }

        .logout {
            cursor: pointer;
            background-color: #F44336 !important;
            color: #ffffff !important;
        }

        .navbar-toggler, .n-toggler {
          order: -1;
        }

    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            
            <a href="#" class="n-toggler me-auto" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </a>

        </div>
    </nav>
      
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Side Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Configuración</a>
                </li>
            </ul>
        </div>
    </div>
    
      



      

 
    

    {{-- <main style="flex: 1;">
        @yield('content')
    </main> --}}


    {{-- Messages --}}
    @if (session('error'))
        <script>
            M.toast({
                html: '{{ session('error') }}',
                classes: 'red darken-2'
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            M.toast({
                html: '{{ session('success') }}',
                classes: 'green darken-2'
            });
        </script>
    @endif

</body>
@extends('layouts.footer')
<!-- Script de java -->
@yield('script')
<script>



    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);

        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems);

        var elems = document.querySelectorAll('.collapsible');
        var instances = M.Collapsible.init(elems);

        var elems = document.querySelectorAll('.tooltipped');
        var instances = M.Tooltip.init(elems);

        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);

        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);

    });
</script>

</html>
