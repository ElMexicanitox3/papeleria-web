<!-- Plantilla -->
@extends('layouts.public')

<!-- Titulo -->
@section('title', 'Registro')

<!-- Contenido -->
@section('content')

    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content dark-text">

                        <div>
                            <h4 class="center-align blue-text">Registrarse</h4>
                            <p class="center-align">
                                Necesitamos algunos datos para crear tu cuenta.
                            </p>
                        </div>


                        <div class="row">
                            <form action="">
                                <div class="col s12 m12">

                                    <div>
                                        <h5 class="center-align blue-text">Personal</h3>
                                    </div>

                        
                                        @csrf

                                        <div class="input-field">
                                            <input id="name" type="text" name="name" class="validate" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            <label for="name">Nombre</label>
                                            @error('name')
                                                <div class="red-text">*{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <input type="text" id="lastname" class="validate">
                                            <label for="lastname">Apellidos</label>
                                            @error('lastname')
                                                <div class="red-text">*{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="input-field">
                                            <input id="email" type="email" name="email" class="validate" value="{{ old('email') }}" required autocomplete="email">
                                            <label for="email">Correo</label>
                                            @error('email')
                                                <div class="red-text">*{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <input id="password" type="password" name="password" class="validate" required autocomplete="new-password">
                                            <label for="password">Contraseña</label>
                                            @error('password')
                                                <div class="red-text">*{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="input-field">
                                            <input id="password_confirmation" type="password" name="password_confirmation" class="validate" required autocomplete="new-password">
                                            <label for="password_confirmation">Confirmar Contraseña</label>
                                            @error('password_confirmation')
                                                <div class="red-text">*{{ $message }}</div>
                                            @enderror
                                        </div>

                                </div>
                                
                                <div class="col s12 m6">

                                    <div>
                                        <h5 class="center-align blue-text">Empresarial</h3>
                                    </div>

                                    <div class="input-field">
                                        <input type="text" id="store_tin" class="validate" required autocomplete="store_tin" maxlength="13" minlength="12">
                                        <label for="store_tin">RFC</label>
                                        @error('store_tin')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!--name store-->
                                    <div class="input-field">
                                        <input type="text" id="store_name" class="validate" required autocomplete="store_name">
                                        <label for="store_name">Nombre de la empresa</label>
                                        @error('store_name')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!--email store-->
                                    <div class="input-field">
                                        <input type="email" id="store_email" class="validate" required autocomplete="store_email">
                                        <label for="store_email">Correo de la empresa</label>
                                        @error('store_email')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Phone store --}}
                                    <div class="input-field">
                                        <input type="text" id="store_phone" class="validate" required autocomplete="store_phone" maxlength="10" minlength="10">
                                        <label for="store_phone">Teléfono de la empresa</label>
                                        @error('store_phone')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Address store --}}
                                    <div class="input-field">
                                        <input type="text" id="store_address" class="validate" required autocomplete="store_address">
                                        <label for="store_address">Dirección de la empresa</label>
                                        @error('store_address')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                </div>

                                <div class="col s12 m6">

                                    <div>
                                        <h5 class="center-align blue-text">Sucursal</h3>
                                    </div>

                                    {{-- name branch --}}
                                    <div class="input-field">
                                        <input type="text" id="branch_name" class="validate" required autocomplete="branch_name">
                                        <label for="branch_name">Nombre de la sucursal</label>
                                        @error('branch_name')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                        
                                    {{-- email branch --}}
                                    <div class="input-field">
                                        <input type="email" id="branch_email" class="validate" required autocomplete="branch_email">
                                        <label for="branch_email">Correo de la sucursal</label>
                                        @error('branch_email')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    {{-- phone branch --}}
                                    <div class="input-field">
                                        <input type="text" id="branch_phone" class="validate" required autocomplete="branch_phone" maxlength="10" minlength="10">
                                        <label for="branch_phone">Teléfono de la sucursal</label>
                                        @error('branch_phone')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- address branch --}}
                                    <div class="input-field">
                                        <input type="text" id="branch_address" class="validate" required autocomplete="branch_address">
                                        <label for="branch_address">Dirección de la sucursal</label>
                                        @error('branch_address')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    
                                </div>
                                
                            </form>

                        </div>
                    </div>
                    <div class="card-action">
                        <a href="#" class="waves-effect waves-light btn acept">
                            <i class="material-icons left">done</i>
                            Aceptar
                        </a>
                        <a href="#" class="waves-effect waves-light btn cancel">
                            <i class="material-icons left">close</i>
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<!-- Final del contenido -->
