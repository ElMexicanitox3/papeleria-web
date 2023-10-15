<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', isset($subcategory) ? 'Editar categoria' : 'Crear categoria')

<!-- Contenido -->
@section('content')

    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <form action="{{ isset($subcategory) ? route('subcategory.update', $subcategory->uuid) : route('subcategory.store') }}" method="POST">
                    
                    @csrf
                    @method(isset($subcategory) ? 'put' : 'post')  

                    <div class="card z-depth-5">

                        <div class="card-content">

                            <span class="card-title">
                                <h3 class="center-align blue-text">Nombre de la subcateogria</h3>
                                <p class="center-align">
                                    Ingresa el nombre de la subcateogria
                                </p>
                            </span>

                            <div class="row">
                                <div class="col s12 m12">
                                    @include('includes.select-field', [
                                        'name' => 'category',
                                        'label' => 'Categoria',
                                        'defaultoption' => 'Selecciona una categoria',
                                        'options' => $categories,
                                        'defaultvalue' => isset($subcategory) ? $subcategory->category->uuid : ''
                                    ])
                                </div>
                                <div class="col s12 m12">
                                    @include('includes.input-field', ['name' => 'subcategory', 'label' => 'Nombre de la subcateogria', 'defaultvalue'=> isset($subcategory) ? $subcategory->name : ''])
                                </div>
                            </div>

                        </div>


                        <div class="card-action">
                            <button type="submit" class="waves-effect waves-light btn acept">
                                <i class="material-icons left">done</i>
                                Guardar
                            </button>
                            <a href="{{ route('subcategory.index') }}" class="waves-effect waves-light btn cancel">
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
