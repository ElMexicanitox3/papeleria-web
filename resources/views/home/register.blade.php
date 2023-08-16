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
                    <form action="{{ route('home.newUser') }}" method="POST">
                        @csrf
                        <div class="card-content dark-text">

                            <div>
                                <h4 class="center-align blue-text">Registrarse</h4>
                                <p class="center-align">
                                    Necesitamos algunos datos para crear tu cuenta.
                                </p>
                            </div>


                            <div class="row">
                                <div class="col s12 m12">

                                    <div>
                                        <h5 class="center-align blue-text">Personal</h3>
                                    </div>


                                    

                                    <div class="input-field">
                                        <input id="name" type="text" name="name" class="validate"
                                            value="{{ old('name') }}"  autocomplete="name" autofocus>
                                        <label for="name">Nombre</label>
                                        @error('name')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-field">
                                        <input type="text" id="lastname" name="lastname" class="validate" value="{{old('lastname')}}">
                                        <label for="lastname">Apellidos</label>
                                        @error('lastname')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="input-field">
                                        <input id="email" type="email" name="email" class="validate"
                                            value="{{ old('email') }}"  autocomplete="email">
                                        <label for="email">Correo</label>
                                        @error('email')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-field">
                                        <input id="password" type="password" name="password" class="validate" 
                                            autocomplete="new-password">
                                        <label for="password">Contraseña</label>
                                        @error('password')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-field">
                                        <input id="password_confirmation" type="password" name="password_confirmation"
                                            class="validate"  autocomplete="new-password">
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
                                        <input type="text" id="store_tin" name="store_tin" class="validate"  value="{{ old('store_tin') }}"
                                            autocomplete="store_tin" maxlength="13" minlength="12">
                                        <label for="store_tin">RFC</label>
                                        @error('store_tin')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!--name store-->
                                    <div class="input-field">
                                        <input type="text" id="store_name" name="store_name" class="validate"  value="{{ old('store_name') }}"
                                            autocomplete="store_name">
                                        <label for="store_name">Nombre de la empresa</label>
                                        @error('store_name')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!--email store-->
                                    <div class="input-field">
                                        <input type="email" id="store_email" name="store_email" class="validate"  value="{{ old('store_email') }}"
                                            autocomplete="store_email">
                                        <label for="store_email">Correo de la empresa</label>
                                        @error('store_email')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Phone store --}}
                                    <div class="input-field">
                                        <input type="text" id="store_phone" name="store_phone" class="validate"  value="{{ old('store_phone') }}"
                                            autocomplete="store_phone" maxlength="10" minlength="10">
                                        <label for="store_phone">Teléfono de la empresa</label>
                                        @error('store_phone')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Address store --}}
                                    <div class="input-field">
                                        <input type="text" id="store_address" name="store_address" class="validate"  value="{{ old('store_address') }}"
                                            autocomplete="store_address">
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
                                        <input type="text" id="branch_name" name="branch_name" class="validate"  value="{{ old('branch_name') }}"
                                            autocomplete="branch_name">
                                        <label for="branch_name">Nombre de la sucursal</label>
                                        @error('branch_name')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- email branch --}}
                                    <div class="input-field">
                                        <input type="email" id="branch_email" name="branch_email" class="validate"  value="{{ old('branch_email') }}"
                                            autocomplete="branch_email">
                                        <label for="branch_email">Correo de la sucursal</label>
                                        @error('branch_email')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- phone branch --}}
                                    <div class="input-field">
                                        <input type="text" id="branch_phone" name="branch_phone" class="validate"  value="{{ old('branch_phone') }}"
                                            autocomplete="branch_phone" maxlength="10" minlength="10">
                                        <label for="branch_phone">Teléfono de la sucursal</label>
                                        @error('branch_phone')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- address branch --}}
                                    <div class="input-field">
                                        <input type="text" id="branch_address" name="branch_address" class="validate"  value="{{ old('branch_address') }}"
                                            autocomplete="branch_address">
                                        <label for="branch_address">Dirección de la sucursal</label>
                                        @error('branch_address')
                                            <div class="red-text">*{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>


                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="waves-effect waves-light btn acept">
                                <i class="material-icons left">done</i>
                                Aceptar
                            </button>
                            <a href="{{ route('home.index') }}" class="waves-effect waves-light btn cancel">
                                <i class="material-icons left">close</i>
                                Cancelar
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
<!-- Final del contenido -->
