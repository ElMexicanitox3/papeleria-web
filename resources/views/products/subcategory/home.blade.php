<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Subcategorias')

<!-- Contenido -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
            <h5 class="center-align">Subcategorias de los productos</h5>
            <p class="center-align">Aqui podras registrar las Subcategorias de los productos</p>
        </div>
        <div class="col s12">
            @include('includes.btn-small', ['alingicon'=>'left', 'text'=>'Nueva Subcategoria','icon' => 'add', 'color'=> 'blue',  'href' => route('subcategory.create')])
        </div>
    </div>
    <table class="highlight">
        <thead>
            <tr>
                <th>Subcategoria</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($subcategories as $subcategory)

                <tr>
                    <td>{{$subcategory->name}}</td>
                    <td>{{$subcategory->category->name}}</td>
                    <td>
                        @include('includes.btn-small', ['href'=>route('subcategory.edit', $subcategory->uuid),'icon' => 'edit', 'mesagge_tootip' => 'Editar Subcategoria'])
                        @if($subcategory->active)
                            @include('includes.btn-small', ['icon' => 'block', 'mesagge_tootip' => 'Desactivar marca', 'color' => 'red', 'modaltrigger' => 'del'.$subcategory->uuid])
                        @else
                            @include('includes.btn-small', ['icon' => 'check', 'mesagge_tootip' => 'Activar marca', 'color' => 'green', 'modaltrigger' => 'act'.$subcategory->uuid])
                        @endif
                    </td>
                </tr>

                @include('includes.desicion-custom-modal', [
                    'id' => 'del'.$subcategory->uuid,
                    'title' => 'Desactivar subcategoria',
                    'text' => '¿Estas seguro de desactivar la subcategoria "'.$subcategory->name.'"?',
                    'action' => route('category.desactivate', $subcategory->uuid),
                    'value' => $subcategory->uuid
                ])

                @include('includes.desicion-custom-modal', [
                    'id' => 'act'.$subcategory->uuid,
                    'title' => 'Activar subcategoria',
                    'text' => '¿Estas seguro de activar la subcategoria "'.$subcategory->name.'"?',
                    'action' => route('category.activate', $subcategory->uuid),
                    'value' => $subcategory->uuid
                ])

            @endforeach
        </tbody>
    </table>

    @include('includes.pagination', ['paginator' => $subcategories])

</div>
@endsection
<!-- Final del contenido -->
