<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Categorias')

<!-- Contenido -->
@section('content')

<div class="container">
    <div class="row">
        <div class="col s12">
            <h5 class="center-align">Categorias de los productos</h5>
            <p class="center-align">Aqui podras registrar las categorias de los productos</p>
        </div>
        <div class="col s12">
            @include('includes.btn-small', ['alingicon'=>'left', 'text'=>'Nueva Categoria','icon' => 'add', 'color'=> 'blue',  'href' => route('category.create')])
        </div>
    </div>
    <table class="highlight">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)

                <tr>
                    <td>{{$category->name}}</td>
                    <td>
                        @include('includes.btn-small', ['href'=>route('category.edit', $category->uuid),'icon' => 'edit', 'mesagge_tootip' => 'Editar marca'])
                        @if($category->active)
                            @include('includes.btn-small', ['icon' => 'block', 'mesagge_tootip' => 'Desactivar marca', 'color' => 'red', 'modaltrigger' => 'del'.$category->uuid])
                        @else
                            @include('includes.btn-small', ['icon' => 'check', 'mesagge_tootip' => 'Activar marca', 'color' => 'green', 'modaltrigger' => 'act'.$category->uuid])
                        @endif
                    </td>
                </tr>

                @include('includes.desicion-custom-modal', [
                    'id' => 'del'.$category->uuid,
                    'title' => 'Desactivar marca',
                    'text' => '¿Estas seguro de desactivar la marca "'.$category->name.'"?',
                    'action' => route('category.desactivate', $category->uuid),
                    'value' => $category->uuid
                ])

                @include('includes.desicion-custom-modal', [
                    'id' => 'act'.$category->uuid,
                    'title' => 'Activar marca',
                    'text' => '¿Estas seguro de activar la marca "'.$category->name.'"?',
                    'action' => route('category.activate', $category->uuid),
                    'value' => $category->uuid
                ])

            @endforeach
        </tbody>
    </table>

    @include('includes.pagination', ['paginator' => $categories])

</div>

@endsection
<!-- Final del contenido -->
