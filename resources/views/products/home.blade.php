<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Productos')

<!-- Contenido -->
@section('content')

    @section('titleCard', 'Productos')

    @section('buttonsCard')
        <a href="{{ route('products.create') }}"
            class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600">Agregar Producto</a>
    @endsection

    @section('contentCard')
        <table class="min-w-full divide-y divide-gray-400">
            <thead>
                <tr>
                    <th class="">Codigo Barras</th>
                    <th class="">Nombre</th>
                    <th class="">Marca</th>
                    <th class="">Categoria / Subcategoria</th>
                    <th class="">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <!-- Filas de la tabla -->
                @foreach ($products as $product)
                    <tr>
                        <th>{{ $product->barcode }}</th>
                        <th>{{ $product->name }}</th>
                        <th>{{ $product->brand->name }}</th>
                        <th>{{ $product->subcategory->category->name }} / {{ $product->subcategory->name }}</th>
                        {{-- Botones de crud --}}
                        <th>
                            <div class="flex justify-center items-center">

                                <a href=""
                                    class="p-2 rounded-md bg-blue-500 hover:bg-blue-600 flex items-center mr-2">
                                    <span class="material-icons text-white mr-1">visibility</span>
                                    <span class="text-white">Ver</span>
                                </a>

                                <a href="{{ route('products.edit', $product->uuid) }}"
                                    class="p-2 rounded-md bg-blue-500 hover:bg-blue-600 flex items-center mr-2">
                                    <span class="material-icons text-white mr-1">edit</span>
                                    <span class="text-white">Editar</span>
                                </a>

                                @if ($product->active)
                                    <form action="{{ route('products.desactivate', $product->uuid) }}" method="post">

                                        @csrf

                                        <input type="hidden" name="uuid" id="uuid"
                                            value="{{ $product->uuid }}">

                                        <!-- Boton de desactivar -->
                                        <button type="submit"
                                            class="p-2 rounded-md bg-red-500 hover:bg-red-600 flex items-center mr-2">
                                            <span class="material-icons text-white mr-1">highlight_off</span>
                                            <span class="text-white">Desactivar</span>
                                        </button>

                                    </form>
                                @else
                                    <form action="{{ route('products.activate', $product->uuid) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="uuid" id="uuid"
                                            value="{{ $product->uuid }}">
                                        <button type="submit"
                                            class="p-2 rounded-md bg-green-500 hover:bg-green-600 flex items-center mr-2">
                                            <span class="material-icons text-white mr-1">check_circle</span>
                                            <span class="text-white">Activar</span>
                                        </button>
                                    </form>
                                @endif


                            </div>
                        </th>
                    </tr>
                @endforeach
                <!-- Otras filas... -->
            </tbody>


        </table>
    @endsection

    @section('footerCard')
        {{ $products->links() }}
    @endsection

    @include('layouts.components.card')
    
@endsection
<!-- Final del contenido -->


