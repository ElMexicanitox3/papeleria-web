<!-- Plantilla -->
@extends('layouts.public')

<!-- Titulo -->
@section('title', 'Registro')

<!-- Contenido -->
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <form action="{{ route('home.newUser') }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div>
                            <h4 class="text-center text-primary">Registrarse</h4>
                            <p class="text-center">
                                Necesitamos algunos datos para crear tu cuenta.
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <div>
                                    <h5 class="text-center text-primary">Personal</h5>
                                </div>

                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" autocomplete="name" autofocus>
                                    @error('name')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Apellidos</label>
                                    <input type="text" id="lastname" name="lastname" class="form-control" value="{{ old('lastname') }}">
                                    @error('lastname')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" autocomplete="email">
                                    @error('email')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input id="password" type="password" name="password" class="form-control" autocomplete="new-password">
                                    @error('password')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirmar Contraseña</label>
                                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
                                    @error('password_confirmation')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-6">

                                <div>
                                    <h5 class="text-center text-primary">Empresarial</h5>
                                </div>

                                <div class="form-group">
                                    <label for="store_tin">RFC</label>
                                    <input type="text" id="store_tin" name="store_tin" class="form-control" value="{{ old('store_tin') }}" autocomplete="store_tin" maxlength="13" minlength="12">
                                    @error('store_tin')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="store_name">Nombre de la empresa</label>
                                    <input type="text" id="store_name" name="store_name" class="form-control" value="{{ old('store_name') }}" autocomplete="store_name">
                                    @error('store_name')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="store_email">Correo de la empresa</label>
                                    <input type="email" id="store_email" name="store_email" class="form-control" value="{{ old('store_email') }}" autocomplete="store_email">
                                    @error('store_email')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="store_phone">Teléfono de la empresa</label>
                                    <input type="text" id="store_phone" name="store_phone" class="form-control" value="{{ old('store_phone') }}" autocomplete="store_phone" maxlength="10" minlength="10">
                                    @error('store_phone')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="store_address">Dirección de la empresa</label>
                                    <input type="text" id="store_address" name="store_address" class="form-control" value="{{ old('store_address') }}" autocomplete="store_address">
                                    @error('store_address')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-6">

                                <div>
                                    <h5 class="text-center text-primary">Sucursal</h5>
                                </div>

                                <div class="form-group">
                                    <label for="branch_name">Nombre de la sucursal</label>
                                    <input type="text" id="branch_name" name="branch_name" class="form-control" value="{{ old('branch_name') }}" autocomplete="branch_name">
                                    @error('branch_name')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="branch_email">Correo de la sucursal</label>
                                    <input type="email" id="branch_email" name="branch_email" class="form-control" value="{{ old('branch_email') }}" autocomplete="branch_email">
                                    @error('branch_email')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="branch_phone">Teléfono de la sucursal</label>
                                    <input type="text" id="branch_phone" name="branch_phone" class="form-control" value="{{ old('branch_phone') }}" autocomplete="branch_phone" maxlength="10" minlength="10">
                                    @error('branch_phone')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="branch_address">Dirección de la sucursal</label>
                                    <input type="text" id="branch_address" name="branch_address" class="form-control" value="{{ old('branch_address') }}" autocomplete="branch_address">
                                    @error('branch_address')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            Registrarse
                        </button>
                        <a href="{{ route('home.index') }}" class="btn btn-secondary">
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
