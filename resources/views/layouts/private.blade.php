<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<style>
    .logo-img {
        width: 190px;
        /* Ajusta el ancho deseado */
        height: 50px;
        /* Ajusta la altura deseada */
        margin-top: 10px;
        /* Ajusta el margen superior deseado */
        margin-bottom: 10px;
        /* Ajusta el margen inferior deseado */
        /* Otros estilos que desees aplicar */
    }
</style>

<body>
    @php
        $linkClasses = 'text-black-100 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium';
        $buttonClasses = 'text-white bg-gray-700 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-gray-400 dark:hover:bg-gray-700 dark:focus:ring-blue-700';
    @endphp
    <nav class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex-shrink-0 text-white">
                        <img class="logo-img" src="{{ asset('images/p-1.png') }}" alt="5">
                    </a>
                </div>
                <div class="hidden sm:block">
                    <a href="{{ route('dashboard') }}" type="button" class="{{ $buttonClasses }}">Cerrar Sesion</a>
                </div>
                <div class="block sm:hidden close-session">
                    <button type="button" id="toggleSidebarBtn"
                        class="text-gray-600 hover:bg-gray-700 hover:text-white focus:outline-none focus:bg-gray-700 focus:text-white px-3 py-2 rounded-md text-sm font-medium">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div id="menu" class="hidden sm:hidden">
                <a href="{{ route('dashboard') }}"class="block {{ $linkClasses }}">Cerrar Sesion</a>
            </div>
        </div>
    </nav>

    <div class="flex h-screen bg-gray-100">
        <div id="sidebar" class="flex flex-col flex-shrink-0 w-64 bg-white shadow">
            <!-- Logo o título del sidebar -->
            <div class="flex items-center justify-center h-16 bg-gray-200">
                <span class="text-xl font-bold">Bienvenido</span>
            </div>

            <!-- Enlaces del sidebar -->
            <div class="flex flex-col flex-grow items-center p-4">

                <a href="{{ route('dashboard') }}"
                    class="flex items-center w-full {{ request()->is('dashboard') ? 'bg-indigo-100 ' : 'hover:text-indigo-600' }}">
                    <span class="material-icons">dashboard</span>
                    <span class="ml-2 text-lg">Dashboard</span>
                </a>

                <a href="{{ route('products.home') }}"
                    class="flex items-center w-full mt-2 {{ request()->routeIs('products.home') ||str_starts_with(request()->route()->getName(),'products.create')? 'bg-indigo-100': 'hover:text-indigo-600' }}">
                    <span class="material-icons">inventory_2</span>
                    <span class="ml-2 text-lg">Productos</span>
                </a>

                <a href="{{ route('category.home') }}"
                    class="flex items-center w-full mt-2 {{ request()->routeIs('category.home') ||str_starts_with(request()->route()->getName(),'category.create')? 'bg-indigo-100': 'hover:text-indigo-600' }}">
                    <span class="material-icons">category</span>
                    <span class="ml-2 text-lg">Categorias</span>
                </a>


            </div>

        </div>

        <!-- Contenido principal -->
        <div class="flex flex-col flex-grow">
            <!-- Contenido de la página -->
            <div class="p-4">
                @yield('content')
            </div>
        </div>
    </div>


    {{-- Scripts --}}

    @extends('layouts.footer')

</body>
<script>
    const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
    const sidebar = document.getElementById('sidebar');

    // Verificar el tamaño de la pantalla al cargar y redimensionar la página
    function checkScreenWidth() {
        if (window.innerWidth < 768) { // Cambia este valor según tus necesidades
            sidebar.classList.add('hidden');
            close - session.classList.add('hidden');
        } else {
            sidebar.classList.remove('hidden');
            close - session.classList.remove('hidden');
        }
    }

    // Escuchar el evento de redimensionamiento de la pantalla
    window.addEventListener('resize', checkScreenWidth);

    // Mostrar u ocultar el sidebar al hacer clic en el botón
    toggleSidebarBtn.addEventListener('click', function() {
        sidebar.classList.toggle('hidden');
    });

    // Verificar el tamaño de la pantalla al cargar la página
    checkScreenWidth();
</script>

</html>
