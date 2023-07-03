<!-- Es necesario agregar al archivo blade ejemplo "home.blade.php" -->
<!-- Para que asi laravel pueda reconocerlo -->

<!-- Plantilla -->
@extends('layouts.plantilla')

<!-- Titulo -->
@section('title', 'Home')

<!-- Contenido -->
@section('content')

    @php
        $linkClasses = 'text-black-100 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium';
        $buttonClasses = 'text-white bg-gray-700 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-gray-400 dark:hover:bg-gray-700 dark:focus:ring-blue-700';  
    @endphp

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="max-w-md w-full p-6 bg-white shadow-md">
            <h2 class="text-2xl font-semibold mb-6">Iniciar sesión</h2>
            <form action="{{route('home.loginUser')}}" method="POST">

                {{-- el csrf es como un token --}}
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-1">Correo electrónico</label>
                    <input type="email" id="email" name="email" class="w-full border border-black-300 rounded-md p-2" value="{{old('email')}}">
                    @error('email')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-medium mb-1">Contraseña</label>
                    <input type="password" id="password" name="password" class="w-full border border-black-300 rounded-md p-2">
                    @error('password')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="{{$buttonClasses}}">Iniciar sesión</button>
            </form>

            <div class="mt-6">
                <a href="{{route('home.register')}}" class="text-blue-500 hover:text-blue-700 text-sm font-semibold">¿No tienes una cuenta? Registrate</a>
            </div>

            {{-- Olvidate la contraseña --}}
            <div class="mt-6">
                <a href="{{route('home.register')}}" class="text-blue-500 hover:text-blue-700 text-sm font-semibold">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </div>

@endsection
<!-- Final del contenido -->
