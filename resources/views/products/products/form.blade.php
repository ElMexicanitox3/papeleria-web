@extends('layouts.private')

@section('title', isset($product) ? 'Editar Producto' : 'Crear Producto')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col s12">
                <h5 class="center-align">{{ isset($product) ? 'Editar Producto' : 'Crear Producto' }}</h5>
                <p class="center-align">{{ isset($product) ? 'Aqui podras editar tu producto' : 'Aqui podras crear el producto' }}</p>
            </div>
        </div>

        <form action="{{ isset($product) ? route('products.update', $product->uuid) : route('products.store') }}" method="POST" enctype="multipart/form-data">
            
            @method(isset($product) ? 'put' : 'post')  
            @csrf

            <div class="row">

                <div class="col s12 m6">
                    @include('includes.select-field', [
                        'name' => 'category',
                        'label' => 'Categoria',
                        'defaultoption' => 'Selecciona una categoria',
                        'options' => $categories,
                        'defaultvalue' => isset($product) ? $product->subcategory->category->uuid : ''
                    ])
                </div>
                
                <div class="col s12 m6">
                    @include('includes.select-field', [
                        'name' => 'subcategory',
                        'label' => 'Subcategoria',
                        'defaultoption' => 'Selecciona una subcategoria',
                        'defaultvalue' => ''
                    ])
                </div>

                <div class="col s12 m6">
                    @include('includes.select-field', [
                        'name' => 'brand',
                        'label' => 'Marca del producto',
                        'defaultoption' => 'Selecciona una marca',
                        'options' => $brands,
                        'defaultvalue' => isset($product) ? $product->brand_id : ''
                    ])
                </div>
                
                <div class="col s12 m6">
                    @include(
                        'includes.input-field', 
                        [
                            'name' => 'barcode', 
                            'label' => 'Codigo de barras del producto', 
                            'defaultvalue'=> isset($product) ? $product->barcode : ''
                        ]
                    )
                </div>

                
                <div class="col s12 m6">
                    @include(
                        'includes.input-field', 
                        [
                            'name' => 'model', 
                            'label' => 'Modelo del producto', 
                            'defaultvalue'=> isset($product) ? $product->model : ''
                        ]
                    )
                </div>
                
                <div class="col s12 m6">
                    @include(
                        'includes.input-field', 
                        [
                            'name' => 'description', 
                            'label' => 'Descripcion del producto', 
                            'defaultvalue'=> isset($product) ? $product->description : ''
                        ]
                    )
                </div>
                
                
                <div class="col s12 m12">
                    @include('includes.input-field', ['name' => 'name', 'label' => 'Nombre del producto', 'defaultvalue'=> isset($product) ? $product->name : ''])
                </div>

                <div class="card-action">
                    <button type="submit" class="waves-effect waves-light btn acept">
                        <i class="material-icons left">done</i>
                        Guardar
                    </button>
                    <a href="{{ route('products.index') }}" class="waves-effect waves-light btn cancel">
                        <i class="material-icons left">close</i>
                        Cancelar
                    </a>
                </div>


            </div>


        </form>


    </div>
    
    @section('script')
    <script>

        var oldSubcategory = "{{isset($product) ? $product->subcategory->uuid : old('subcategory')}}";
        var oldCategory = "{{isset($product) ? $product->subcategory->category->uuid : old('category')}}";

        $("#category").on('change', function (e) { 
            e.preventDefault();
            var uuid = $(this).val();
            var url = "{{ route('subcategory.get-subcategory', ":uuid") }}";
            url = url.replace(':uuid', uuid);
            // Ajax to get subcategories
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (response) {
                    $("#subcategory").empty();

                    const selected = (oldSubcategory != "") ? 'selected' : '';
                    $("#subcategory").append(`<option value="" ${selected}>Selecciona una subcategoria</option>`);

                    $.each(response, function (indexInArray, valueOfElement) {
                        const selected = (oldSubcategory == valueOfElement.uuid) ? 'selected' : '';
                        $("#subcategory").append(`<option value="${valueOfElement.uuid}" ${selected}>${valueOfElement.name}</option>`);
                    });

                    $('select').formSelect();
                }
            });
        });
        

        $(document).ready(function(){
            if (oldCategory != "") {
                $("#category").change();
            }

        });

    </script>
    @endsection


@endsection