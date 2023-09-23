<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', isset($category) ? 'Editar categoria' : 'Crear categoria')

<!-- Contenido -->
@section('content')

    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <form action="{{ isset($category) ? route('category.update', $category->uuid) : route('category.store') }}" method="POST">

                    <div class="card z-depth-5">

                        <div class="card-content">

                            <span class="card-title">
                                <h3 class="center-align blue-text">Nombre de la cateogria</h3>
                                <p class="center-align">
                                    Ingresa el nombre de la categoria
                                </p>
                            </span>

                            <div class="row">
                                <div class="col s12 m12">
                                    @method(isset($category) ? 'put' : 'post')  
                                    @csrf
                                    @include('includes.input-field', ['name' => 'name', 'label' => 'Nombre de la categoria', 'defaultvalue'=> isset($category) ? $category->name : ''])
                                </div>
                            </div>

                        </div>


                        <div class="card-action">
                            <button type="submit" class="waves-effect waves-light btn acept">
                                <i class="material-icons left">done</i>
                                Guardar
                            </button>
                            <a href="{{ route('category.index') }}" class="waves-effect waves-light btn cancel">
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
