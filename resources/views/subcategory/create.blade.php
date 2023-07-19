<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Crear SubCategoria')

<!-- Contenido -->
@section('content')

    @section('titleCard', 'Crear SubCategoria')

    @section('contentCard')
        <form action="{{route("subcategory.store")}}" method="post">

            @csrf
            
            <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">

                <div class="mb-4">
                    <!-- Select with the categories -->
                    <label for="category" class="block text-gray-700 text-sm font-medium mb-1">Categoria</label>
                    <select name="category" id="category" class="w-full border-2 border-black-300 rounded-md p-2 select2">
                        <option value="">Selecciona una categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->uuid }}" @if (old('category') == $category->uuid ) selected="selected" @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-1">Nombre de la subcategoria</label>
                    <input type="text" id="name" name="name" class="w-full border-2 border-black-300 rounded-md p-2" value="{{old('name')}}">
                    @error('name')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>

            </div>


            <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">

                <a href="{{ route('category.home') }}" class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600 text-center">Regresar</a>
                <button class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600" type="submit">Guardar</button>

            </div>

        </form>
    @endsection

    @include('layouts.components.card')


@endsection
<!-- Final del contenido -->
