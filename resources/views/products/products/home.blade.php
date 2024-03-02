<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Productos')
@section('title-header', 'Productos')
@section('message-header', 'Aqui podras visualizar los productos')

<!-- Contenido -->
@section('content')
    
    <table class="table table-hover">

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
                        @include('includes.btn-small', ['icon' => 'block', 'mesagge_tootip' => 'Desactivar producto', 'color' => 'danger', 'modaltrigger' => 'del'.$product->uuid])
                    @else
                        @include('includes.btn-small', ['icon' => 'check', 'mesagge_tootip' => 'Activar producto', 'color' => 'success', 'modaltrigger' => 'act'.$product->uuid])
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

@endsection
<!-- Final del contenido -->
