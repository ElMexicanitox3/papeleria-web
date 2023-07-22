<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Marcas')

<!-- Contenido -->
@section('content')

    @section('titleCard', 'Marcas de los productos')

    @section('buttonsCard')
        <a href="{{ route('brands.create') }}" class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600">Agregar Marca</a>
    @endsection

    @section('contentCard')
        <table class="min-w-full divide-y divide-gray-400">
            <thead>
                <tr>
                    <th class="">Nombre</th>
                    <th class="">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Filas de la tabla -->
                @foreach ($brands as $brand)
                    <tr>
                        {{-- Attempt to read property "name" on null--}}
                        <th>{{ $brand->name }}</th>
                        <th>
                            <div class="flex justify-center items-center">

                                <a href="{{ route('brands.edit', $brand->uuid) }}"
                                    class="p-2 rounded-md bg-blue-500 hover:bg-blue-600 flex items-center mr-2">
                                    <span class="material-icons text-white mr-1">edit</span>
                                    <span class="text-white">Editar</span>
                                </a>

                                @if ($brand->active)
                                    <form action="{{ route('brands.desactivate', $brand->uuid) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="uuid" id="uuid"
                                            value="{{ $brand->uuid }}">
                                        <button type="submit"
                                            class="p-2 rounded-md bg-red-500 hover:bg-red-600 flex items-center mr-2">
                                            <span class="material-icons text-white mr-1">highlight_off</span>
                                            <span class="text-white">Desactivar</span>
                                        </button>

                                    </form>
                                @else
                                    <form action="{{ route('brands.activate', $brand->uuid) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="uuid" id="uuid"
                                            value="{{ $brand->uuid }}">
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

    @endsection
    
    @include('layouts.components.card')

@endsection
<!-- Final del contenido -->
