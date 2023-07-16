
<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Editar Categoria')

<!-- Contenido -->
@section('content')

    @section('titleCard', 'Editar Categoria - ' . $category->name)

    @section('contentCard')
        <form action="{{route("category.update", $category->uuid)}}" method="post">

            @csrf

            @method('put')
            
            <div class="p-4 grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4">

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-1">Nombre</label>
                    <input type="text" id="name" name="name" class="w-full border-2 border-black-300 rounded-md p-2" value="{{old('categoria', $category->name)}}">
                    @error('name')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">

                <a href="{{ route('category.home') }}" class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600 text-center">Cancelar</a>
                <button class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600">Actualizar</button>

            </div>



        </form>
    @endsection

    @include('layouts.components.card')

@endsection
<!-- Final del contenido -->
