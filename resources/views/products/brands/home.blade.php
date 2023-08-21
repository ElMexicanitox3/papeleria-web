<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Marcas de los productos')

<!-- Contenido -->
@section('content')

    <div class="container">
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
                            @include('includes.btn-small', ['icon' => 'edit', 'mesagge_tootip' => 'Editar marca'])
                            @if($brand->active)
                                @include('includes.btn-small', ['icon' => 'block', 'mesagge_tootip' => 'Desactivar marca', 'color' => 'red', 'modaltrigger' => 'del'.$brand->uuid])
                            @else
                                @include('includes.btn-small', ['icon' => 'check', 'mesagge_tootip' => 'Activar marca', 'color' => 'green', 'modaltrigger' => 'act'.$brand->uuid])
                            @endif
                        </td>
                    </tr>

                    @include('includes.desicion-custom-modal', [
                        'id' => 'del'.$brand->uuid,
                        'title' => 'Desactivar marca',
                        'text' => '¿Estas seguro de desactivar la marca "'.$brand->name.'"?',
                        'action' => route('brands.desactivate', $brand->uuid),
                        'value' => $brand->uuid
                    ])

                    @include('includes.desicion-custom-modal', [
                        'id' => 'act'.$brand->uuid,
                        'title' => 'Activar marca',
                        'text' => '¿Estas seguro de activar la marca "'.$brand->name.'"?',
                        'action' => route('brands.activate', $brand->uuid),
                        'value' => $brand->uuid
                    ])

                @endforeach
            </tbody>
        </table>

        @include('includes.pagination', ['paginator' => $brands])

    </div>
@endsection
<!-- Final del contenido -->
