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
        <div class="max-w-xl w-full p-6 bg-white shadow-md">
            <h2 class="text-2xl font-semibold mb-6">Registrase</h2>
            <form action="{{ route('home.newUser') }}" method="POST">

                @csrf

                <div class="mb-4">
                    <div>
                        <label for="name" class="block text-gray-700 text-sm font-medium mb-1">Nombre(s)</label>
                        <input type="text" id="name" name="name"
                            class="w-full border-2 border-black-300 rounded-md p-2" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div>
                        <label for="lastname" class="block text-gray-700 text-sm font-medium mb-1">Apellidos</label>
                        <input type="text" id="lastname" name="lastname"
                            class="w-full border-2 border-black-300 rounded-md p-2" value="{{ old('lastname') }}">
                    </div>
                    @error('lastname')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-1">Correo electrónico</label>
                    <input type="email" id="email" name="email"
                        class="w-full border-2 border-black-300 rounded-md p-2" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-medium mb-1">Contraseña</label>
                    <input type="password" id="password" name="password"
                        class="w-full border-2 border-black-300 rounded-md p-2" value="{{ old('password') }}">
                    @error('password')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-1">Confirmar
                        Contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full border-2 border-black-300 rounded-md p-2" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="{{ $buttonClasses }}">Iniciar sesión</button>

            </form>

            <div class="mt-6">
                <a href="{{ route('home.login') }}" class="text-blue-500 hover:text-blue-700 text-sm font-semibold">¿tienes
                    una cuenta? Inicia Sesion</a>
            </div>

        </div>
    </div>

@endsection
<!-- Final del contenido -->
