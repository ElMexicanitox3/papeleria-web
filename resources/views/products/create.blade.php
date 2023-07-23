<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Crear Producto')

<!-- Contenido -->
@section('content')

    @section('titleCard', 'Crear Producto')
    

    @section('contentCard')

        <form action="{{route("products.store")}}" method="post">

            @csrf
            
            <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-1">Nombre</label>
                    <input type="text" id="name" name="name" class="w-full border-2 border-black-300 rounded-md p-2" value="{{old('name')}}">
                    @error('name')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="barcode" class="block text-gray-700 text-sm font-medium mb-1">Codigo de barras</label>
                    <input type="number" id="barcode" name="barcode" class="w-full border-2 border-black-300 rounded-md p-2" value="{{old('barcode')}}">
                    @error('barcode')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-gray-700 text-sm font-medium mb-1">Categoria</label>
                    <select name="category" id="category" class="w-full border-2 border-black-300 rounded-md p-2 select2">
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->uuid }}" @if (old('category') == $category->uuid) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>
                
                
                <div class="mb-4">
                    <label for="subcategory" class="block text-gray-700 text-sm font-medium mb-1">Subcategoria</label>
                    <select name="subcategory" id="subcategory" class="w-full border-2 border-black-300 rounded-md p-2 select2">
                        <option value="">Selecciona una subcategoría</option>
                    </select>
                    @error('subcategory')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-4">
                    <label for="model" class="block text-gray-700 text-sm font-medium mb-1">Modelo</label>
                    <input type="text" id="model" name="model" class="w-full border-2 border-black-300 rounded-md p-2" value="{{old('model')}}">
                    @error('model')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="brand" class="block text-gray-700 text-sm font-medium mb-1">Marca del producto</label>
                    <select name="brand" id="brand" class="w-full border-2 border-black-300 rounded-md p-2 select2">
                        <option value="">Selecciona una marca</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->uuid }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @error('brand')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-medium mb-1">Descripción</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="w-full border-2 border-black-300 rounded-md p-2">{{old('description')}}</textarea>
                    @error('description')
                        <div class="text-red-500 text-xs">*{{ $message }}</div>
                    @enderror
                </div>

                
            </div>


            <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">

                <a href="{{ route('products.home') }}" class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600 text-center">Regresar</a>
                <button class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600" type="submit">Guardar</button>

            </div>



        </form>
    @endsection

    @include('layouts.components.card')
    
    @section('scripts')
    <script>
        $(document).ready(function() {
            // Función para cargar las subcategorías al seleccionar una categoría
            function loadSubcategories() {
                var categoryId = $('#category').val();
                var subcategoryOld = '{{ old('subcategory') }}';
                if(categoryId == '') {
                    $('#subcategory').empty();
                    $('#subcategory').append('<option value="">Selecciona una subcategoría</option>');
                    return;
                }
                var baseUrl = '{{ url('/') }}';
                
                $.ajax({
                    url: baseUrl + '/subcategory/getsucategory/' + categoryId,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $('#subcategory').empty();

                        $.each(response.subcategories, function(index, subcategory) {
                            if(subcategoryOld == subcategory.uuid) {
                                $('#subcategory').append('<option value="' + subcategory.uuid + '" selected>' + subcategory.name + '</option>');
                            } else {
                                $('#subcategory').append('<option value="' + subcategory.uuid + '">' + subcategory.name + '</option>');
                            }
                        });
                    },
                    error: function() {
                        alert('Error al cargar las subcategorías');
                    }
                });
            }
    
            // Llamar a la función al cargar la página para mostrar las subcategorías relacionadas con la categoría seleccionada (si hay una)
            loadSubcategories();
    
            // Volver a llamar a la función cuando se cambie la selección de categoría
            $('#category').on('change', function() {
                loadSubcategories();
            });
        });
    </script>
    
    
    
    @endsection
@endsection
<!-- Final del contenido -->
