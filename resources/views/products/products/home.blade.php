<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Productos')

<!-- Contenido -->
@section('content')

<div class="container">

    <div class="row">
        <div class="col s12">
            <h5 class="center-align">Productos</h5>
            <p class="center-align">Aqui podras visualizar los productos</p>
        </div>
        <div class="col s12 m12">
            @include('includes.btn-small', ['alingicon'=>'left', 'text'=>'Nuevo Producto','icon' => 'add', 'color'=> 'blue',  'href' => route('products.create')])
        </div>
    </div>

    <table class="highlight">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Codigo de barras</th>
                <th>Categoria</th>
                <th>Subcategoria</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    {{ $product->name }}
                </td>
                <td>
                    {{ $product->barcode }}
                </td>
                <td>
                    {{ $product->subcategory->category->name }}
                </td>
                <td>
                    {{ $product->subcategory->name }}
                </td>
                <td>
                    @include('includes.btn-small', ['href'=>route('products.edit', $product->uuid),'icon' => 'edit', 'mesagge_tootip' => 'Editar Producto'])

                    @if($product->active)
                        @include('includes.btn-small', ['icon' => 'block', 'mesagge_tootip' => 'Desactivar producto', 'color' => 'red', 'modaltrigger' => 'del'.$product->uuid])
                    @else
                        @include('includes.btn-small', ['icon' => 'check', 'mesagge_tootip' => 'Activar producto', 'color' => 'green', 'modaltrigger' => 'act'.$product->uuid])
                    @endif
                </td>
            </tr>

                @include('includes.desicion-custom-modal', [
                    'id' => 'del'.$product->uuid,
                    'title' => 'Desactivar Producto',
                    'text' => '¿Estas seguro de desactivar el Producto "'.$product->name.'"?',
                    'action' => route('products.desactivate', $product->uuid),
                    'value' => $product->uuid
                ])

                @include('includes.desicion-custom-modal', [
                    'id' => 'act'.$product->uuid,
                    'title' => 'Activar Producto',
                    'text' => '¿Estas seguro de activar el Producto "'.$product->name.'"?',
                    'action' => route('products.activate', $product->uuid),
                    'value' => $product->uuid
                ])

            @endforeach
        </tbody>
    </table>


</div>

@endsection
<!-- Final del contenido -->
