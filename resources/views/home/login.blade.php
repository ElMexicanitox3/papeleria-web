<!-- Plantilla -->
@extends('layouts.public')

<!-- Titulo -->
@section('title', 'Registro')

<!-- Contenido -->
@section('content')

<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-sm-12 col-md-6 text-center">
            {{-- icono --}}
            <img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 100px;"> 
            {{-- texto de bienvenida --}}
            <h3 class="fw-bold">Paysave</h3>
            <h3 class="fw-italic">Te ayuda a ahorrar y ahorrar tiempo de busqueda de precios</h3>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <form action="{{ route('home.loginUser') }}" method="POST">
                <div class="card shadow-lg">
                    <div class="card-body">

                        <h3 class="card-title text-center text-primary">Inicia Sesión</h3>
                        <p class="card-text text-center">Ingresa tus datos para iniciar sesión</p>

                        <div class="row">
                            <div class="col-12">


                                @csrf

                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input id="email" type="text" name="email" class="form-control" value="{{ old('email') }}" autocomplete="email" autofocus>
                                    @error('email')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input id="password" type="password" name="password" class="form-control" autocomplete="password" autofocus>
                                    @error('password')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                        </div>

                    </div>


                    <div class="card-footer">
                        
                        <div class="d-grid gap-2 mb-3">
                            <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
                        </div>
                        <p class="text-center"><a href="#">¿Olvidates tu contraseña?</a></p>
                        <hr>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <a class="btn btn-success" href="{{route('home.register')}}">Crear Cuenta</a>
                        </div>

                    </div>

                    
                </div>
            </form>
        </div>

    </div>
</div>


@endsection
<!-- Final del contenido -->
