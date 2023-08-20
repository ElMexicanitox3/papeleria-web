<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Crear Marca')

<!-- Contenido -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <form action="{{ route('brands.store') }}" method="POST">
                    <div class="card z-depth-5">

                        <div class="card-content">

                            <span class="card-title">
                                <h3 class="center-align blue-text">Nombre de la marca</h3>
                                <p class="center-align">
                                    Ingresa el nombre de la marca
                                </p>
                            </span>

                            <div class="row">
                                <div class="col s12 m12">
                                    @csrf
                                    @include('includes.input-field', ['name' => 'name', 'label' => 'Nombre de la marca'])
                                </div>
                            </div>

                        </div>


                        <div class="card-action">
                            <button type="submit" class="waves-effect waves-light btn acept">
                                <i class="material-icons left">done</i>
                                Guardar
                            </button>
                            <a href="{{ route('brands.index') }}" class="waves-effect waves-light btn cancel">
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
