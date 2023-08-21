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

        :not(label).active {
            color: #ffffff !important;
            background-color: var(--active-color) !important;
        }

        .selectdMenu {
            color: #ffffff !important;
            background-color: var(--main-color) !important;
        }

        .selectdSubMenu, .selectdSubMenu>i.material-icons{
            color: #ffffff !important;
            background-color: var(--active-color) !important;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px; /* Puedes ajustar este margen según tus preferencias */
        }

        table.highlight>tbody>tr:hover {
            /* background-color: var(--active-color) !important; */
        }

        table.highlight>tbody>tr {
            /* color: white !important; <!-- you could ignore the !important here since materialize doesn't give a default color --> */
        }

        


        @media only screen and (max-width: 992px) {
            header, body {
                padding-left: 0px;
            }

            .desicion-custom-modal {
                max-width: 90%; /* Define el ancho máximo del modal */
                width: auto !important;
                margin: 10% auto; /* Centrar verticalmente y ajustar el margen horizontal */
                height: auto !important;
                max-height: 70vh; /* Limitar la altura máxima y permitir el desplazamiento si es necesario */
            }
        }

        @media screen and (min-width: 1024px) {

            .sidenav .sidenav-fixed {
                transform: translateX(0px);
            }

            .desicion-custom-modal {
                max-width: 30%; /* Define el ancho máximo del modal */
                width: auto !important;
                margin: 10% auto; /* Centrar verticalmente y ajustar el margen horizontal */
                height: auto !important;
                max-height: 70vh; /* Limitar la altura máxima y permitir el desplazamiento si es necesario */
            }
        }
    </style>

</head>

<body style="display: flex; flex-direction: column; min-height: 100vh; margin: 0;">

    <nav>
        <div class="nav-wrapper blue">
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>



    <ul class="sidenav sidenav-fixed" id="mobile-demo" style="transform: translateX(0%) !important">
        <ul class="collapsible">
            <li>
                <a href="{{route('dashboard')}}" class="collapsible-header {{ request()->routeIs('dashboard') ? 'selectdMenu' : '' }}"><i class="material-icons">space_dashboard</i>Dashboard</A>
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
                <div class="collapsible-header {{ request()->is('products/*') ? 'selectdMenu' : '' }}"><i class="material-icons">shopping_cart</i>Productos</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{route('brands.index')}}" class="{{ request()->is('products/brands*') ? 'selectdSubMenu' : '' }}"><i class="material-icons">shopping_cart</i>Marcas</a></li>
                        <li><a href="auto-init.html"><i class="material-icons">category</i>Categorias</a></li>
                        <li><a href="auto-init.html"><i class="material-icons">category</i>Subcategorias</a></li>
                        <li><a href="auto-init.html"><i class="material-icons">inventory_2</i>Productos</a></li>
                    </ul>
                </div>
                <div class="collapsible-header logout"><i class="material-icons">logout</i>Cerrar Sesion</div>
            </li>
        </ul>


    </ul>

    <main style="flex: 1;">
        @yield('content')
    </main>


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

        var elems = document.querySelectorAll('.tooltipped');
        var instances = M.Tooltip.init(elems);

        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);

    });
</script>

</html>
