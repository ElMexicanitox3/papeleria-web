<!-- Plantilla -->
@extends('layouts.public')

<!-- Titulo -->
@section('title', 'Registro')

<!-- Contenido -->
@section('content')

    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <form action="{{ route('home.loginUser') }}" method="POST">
                    <div class="card z-depth-5">
                        <div class="card-content">

                            <span class="card-title">
                                <h3 class="center-align blue-text">Inicia Sesion</h3>
                                <p class="center-align">
                                    Ingresa tus datos para iniciar sesion
                                </p>
                            </span>
            
                            <div class="row">
                                <div class="col s12 m12">


                                    @csrf

                                    <div class="input-field">
                                        <input id="email" type="text" name="email" class="validate" value="{{ old('email') }}"  autocomplete="email" autofocus>
                                        <label for="email">Correo</label>
                                        @error('email')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>
            
                                    <div class="input-field">
                                        <input id="password" type="password" name="password" class="validate" autocomplete="password" autofocus>
                                        <label for="password">Contraseña</label>
                                        @error('password')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>
                        
            
                                </div>
                            </div>

                        </div>


                        <div class="card-action">
                            <button type="submit" class="waves-effect waves-light btn acept">
                                <i class="material-icons left">done</i>
                                Iniciar Sesion
                            </button>
                            <a href="{{ route('home.index') }}" class="waves-effect waves-light btn cancel">
                                <i class="material-icons left">close</i>
                                Cancelar
                            </a>
                        </div>

                        
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
<!-- Final del contenido -->
