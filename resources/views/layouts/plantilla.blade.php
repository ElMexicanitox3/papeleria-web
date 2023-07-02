<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>
    @vite('resources/css/app.css')
</head>

<style>
    .logo-img {
    width: 190px; /* Ajusta el ancho deseado */
    height: 50px; /* Ajusta la altura deseada */
    margin-top: 10px; /* Ajusta el margen superior deseado */
    margin-bottom: 10px; /* Ajusta el margen inferior deseado */
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
                    <a href="#" class="flex-shrink-0 text-white">
                        <img class="logo-img" src="{{ asset('images/p-1.png') }}" alt="5">
                    </a>
                </div>
                <div class="hidden sm:block">
                    <a href="#"class="{{$linkClasses}}">Inicio</a>
                    <a href="#"class="{{$linkClasses}}">Acerca de</a>
                    <a href="#"class="{{$linkClasses}}">Contacto</a>
                    <a type="button" class="{{$buttonClasses}}">Iniciar Sesion</a>
                    <a type="button" class="{{$buttonClasses}}">Registrase</a>
                </div>
                <div class="block sm:hidden">
                    <button type="button" id="menu-toggle" class="text-gray-600 hover:bg-gray-700 hover:text-white focus:outline-none focus:bg-gray-700 focus:text-white px-3 py-2 rounded-md text-sm font-medium">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div id="menu" class="hidden sm:hidden">
                <a href="#"class="block text-black-100 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">Inicio</a>
                <a href="#"class="block text-black-100 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">Acerca de</a>
                <a href="#"class="block text-black-100 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">Contacto</a>
                <a href="#"class="text-black-100 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Registrate</a>
                <a href="#"class="text-black-100 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Iniciar Sesión</a>
            </div>
        </div>
    </nav>


    



    @yield('content')
    {{-- Scripts --}}
</body>
<script>
    document.getElementById("menu-toggle").addEventListener("click", function() {
      var menu = document.getElementById("menu");
      menu.classList.toggle("hidden");
    });
  </script>
</html>
