<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Marcas de los productos')

<!-- Contenido -->
@section('content')

    <div class="container">
        {{-- Title --}}
        <div class="row">
            <div class="col s12">
                <h5 class="center-align">Marca de los productos</h5>
                <p class="center-align">Aqui podras registrar las marcas de los productos de tu empresa</p>
            </div>
            <div class="col s12">
                <a href="{{route('brands.create')}}" class="btn btn-small waves-effect waves-light blue"><i class="material-icons left">add</i>Nueva Marca</a>
            </div>
        </div>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->name }}</td>
                        <td>
                            {{-- <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-small btn-floating waves-effect waves-light blue"><i class="material-icons">edit</i></a>
                        <a href="{{ route('brands.destroy', $brand->id) }}" class="btn btn-small btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @include('includes.pagination', ['paginator' => $brands])

    </div>
@endsection
<!-- Final del contenido -->
