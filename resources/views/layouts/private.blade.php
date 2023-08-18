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

        header,

        body {
            padding-left: 300px;
        }

        .active {
            color: #ffffff !important;
            background-color: var(--active-color) !important;
        }

        .selectdMenu {
            color: #ffffff !important;
            background-color: var(--main-color) !important;
        }

        @media only screen and (max-width: 992px) {
            header, body {
                padding-left: 0px;
            }
        }

        @media screen and (min-width: 1024px) {

            .sidenav .sidenav-fixed {
                transform: translateX(0px);
            }
        }
    </style>

</head>

<body>

    <nav>
        <div class="nav-wrapper blue">
            {{-- <a href="#!" class="brand-logo"><img src="{{ asset('images/p-1.png') }}" alt="10" srcset=""></a> --}}
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ route('home.register') }}">Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>



    <ul class="sidenav sidenav-fixed" id="mobile-demo" style="transform: translateX(0%) !important">
        <ul class="collapsible">
            <li>
                <div class="collapsible-header {{ request()->routeIs('dashboard') ? 'selectdMenu' : '' }}"><i
                        class="material-icons">space_dashboard</i>Dashboard</div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">store</i>Empresa</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="auto-init.html"><i class="material-icons">info</i>Informacion</a></li>
                        <li><a href="auto-init.html"><i class="material-icons">storefront</i>Sucursales</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">groups</i>Personal</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="auto-init.html"><i class="material-icons">groups</i>Lista de Personal</a></li>
                        <li><a href="auto-init.html"><i class="material-icons">person_add</i>Agregar Personal</a></li>
                        <li><a href="auto-init.html"><i class="material-icons">storefront</i>Asignar Sucursal</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">shopping_cart</i>Productos</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="auto-init.html"><i class="material-icons">shopping_cart</i>Marcas</a></li>
                        <li><a href="auto-init.html"><i class="material-icons">category</i>Categorias</a></li>
                        <li><a href="auto-init.html"><i class="material-icons">category</i>Subcategorias</a></li>
                        <li><a href="auto-init.html"><i class="material-icons">inventory_2</i>Productos</a></li>
                    </ul>
                </div>
                <div class="collapsible-header logout"><i class="material-icons">logout</i>Cerrar Sesion</div>
            </li>
        </ul>


    </ul>


    @yield('content')


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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);

        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems);

        var elems = document.querySelectorAll('.collapsible');
        var instances = M.Collapsible.init(elems);

    });
</script>

</html>
