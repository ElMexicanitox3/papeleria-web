<!-- Es necesario agregar al archivo blade ejemplo "home.blade.php" -->
<!-- Para que asi laravel pueda reconocerlo -->

<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Crear Producto')

<!-- Contenido -->
@section('content')
<div class="bg-white rounded-md shadow-md border">
    <div class="p-3 bg-gray-200">
        <h2 class="mb-4 text-xl font-bold">Editar Producto - {{$product->name}}</h2>
    </div>
    <div class="overflow-x-auto">
        <form action="{{route("products.update", $product)}}" method="post">

            @csrf

            @method('put')
            
            <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-1">Nombre</label>
                    <input type="text" id="name" name="name" class="w-full border-2 border-black-300 rounded-md p-2" value="{{old('categoria', $product->name)}}">
                    @error('name')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="barcode" class="block text-gray-700 text-sm font-medium mb-1">Codigo de barras</label>
                    <input type="number" id="barcode" name="barcode" class="w-full border-2 border-black-300 rounded-md p-2" value="{{old('categoria', $product->barcode)}}">
                    @error('barcode')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>
               
                <div class="mb-4">
                    <label for="model" class="block text-gray-700 text-sm font-medium mb-1">Modelo</label>
                    <input type="text" id="model" name="model" class="w-full border-2 border-black-300 rounded-md p-2" value="{{old('categoria', $product->model)}}">
                    @error('model')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-medium mb-1">Descripción</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="w-full border-2 border-black-300 rounded-md p-2">{{old('description', $product->description)}}</textarea>
                    @error('description')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>

            </div>


            <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">

                <a href="{{ route('products.home') }}" class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600 text-center">Cancelar</a>
                <button class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600">Actualizar</button>

            </div>



        </form>
    </div>
      
</div>
@endsection
<!-- Final del contenido -->
