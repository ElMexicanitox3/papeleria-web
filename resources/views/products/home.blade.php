<!-- Es necesario agregar al archivo blade ejemplo "home.blade.php" -->
<!-- Para que asi laravel pueda reconocerlo -->

<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Productos')

<!-- Contenido -->
@section('content')
    <div class="bg-white rounded-md shadow-md border">
        <div class="p-3 bg-gray-200">
            <h2 class="mb-4 text-xl font-bold">Productos</h2>
        </div>
        <div class="py-6 px-2">
            {{-- <a href="{{ route('products.create') }}" class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600">Agregar Producto</a> --}}
            <a href="{{ route('products.create') }}" class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600">Agregar Producto</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-400">
              <thead>
                <tr>
                  <th class="">Codigo Barras</th>
                  <th class="">Nombre</th>
                  <th class="">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <!-- Filas de la tabla -->
                @foreach ($products as $product)
                    <tr>
                      <th>{{$product->barcode}}</th>
                      <th>{{$product->name}}</th>
                      {{-- Botones de crud --}}
                      <th>
                          <div class="flex justify-center">
                            <!-- Botón Ver -->
                            <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                              Ver
                            </a>

                            <!-- Botón Editar -->
                            <a href="" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                              Editar
                            </a>

                          </div>
                      </th>
                    </tr>
                @endforeach
                <!-- Otras filas... -->
              </tbody>
            </table>

        </div>

        {{ $products->links() }}
          
    </div>
@endsection
<!-- Final del contenido -->
