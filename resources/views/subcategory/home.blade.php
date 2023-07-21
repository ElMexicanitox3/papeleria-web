<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Subcategorias')

<!-- Contenido -->
@section('content')

    @section('titleCard', 'Subcategorias')

    @section('buttonsCard')
        <a href="{{ route('subcategory.create') }}"
            class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600">Agregar Sub categoria</a>
    @endsection

    @section('contentCard')
        <table class="min-w-full divide-y divide-gray-400">
            <thead>
                <tr>
                    <th class="">Categoria</th>
                    <th class="">Nombre</th>
                    <th class="">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Filas de la tabla -->
                @foreach ($subcategory as $sub)
                    <tr>
                        {{-- Attempt to read property "name" on null--}}
                        <th>{{ $sub->category->name ?? "Sin categoria" }}</th>
                        <th>{{ $sub->name }}</th>
                        <th>
                            <div class="flex justify-center items-center">

                                <a href="{{ route('subcategory.edit', $sub->uuid) }}"
                                    class="p-2 rounded-md bg-blue-500 hover:bg-blue-600 flex items-center mr-2">
                                    <span class="material-icons text-white mr-1">edit</span>
                                    <span class="text-white">Editar</span>
                                </a>

                                @if ($sub->active)
                                    <form action="{{ route('category.desactivate', $sub->uuid) }}" method="post">

                                        @csrf

                                        <input type="hidden" name="uuid" id="uuid"
                                            value="{{ $sub->uuid }}">

                                        <!-- Boton de desactivar -->
                                        <button type="submit"
                                            class="p-2 rounded-md bg-red-500 hover:bg-red-600 flex items-center mr-2">
                                            <span class="material-icons text-white mr-1">highlight_off</span>
                                            <span class="text-white">Desactivar</span>
                                        </button>

                                    </form>
                                @else
                                    <form action="{{ route('category.activate', $sub->uuid) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="uuid" id="uuid"
                                            value="{{ $sub->uuid }}">
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
        {{ $subcategory->links() }}
    @endsection
    
    @include('layouts.components.card')

@endsection
<!-- Final del contenido -->
