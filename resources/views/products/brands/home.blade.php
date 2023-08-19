<!-- Plantilla -->
@extends('layouts.private')

<!-- Titulo -->
@section('title', 'Marcas de los productos')

<!-- Contenido -->
@section('content')
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->name }}</td>
                        <td>
                            {{-- <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-small btn-floating waves-effect waves-light blue"><i class="material-icons">edit</i></a>
                        <a href="{{ route('brands.destroy', $brand->id) }}" class="btn btn-small btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($brands->hasPages())
            <div class="pagination-container">
                <ul class="pagination">
                    {{-- Enlace a la página anterior --}}
                    @if ($brands->currentPage() > 1)
                        <li class="waves-effect"><a href="{{ $brands->url(1) }}"><i class="material-icons">first_page</i></a></li>
                    @else
                        <li class="disabled"><i class="material-icons">first_page</i></li>
                    @endif

                    @if ($brands->onFirstPage())
                        <li class="disabled"><i class="material-icons">chevron_left</i></li>
                    @else
                        <li class="waves-effect"><a href="{{ $brands->previousPageUrl() }}"><i
                                    class="material-icons">chevron_left</i></a></li>
                    @endif

                    {{-- Elementos de paginación --}}
                    @for ($page = 1; $page <= $brands->lastPage(); $page++)
                        {{-- Mostrar las primeras 5 páginas, las 2 últimas o las que estén cerca de la actual --}}
                        @if ($page <= 5 || $page > $brands->lastPage() - 2 || abs($page - $brands->currentPage()) <= 1)
                            {{-- Resaltar la página actual --}}
                            @if ($page == $brands->currentPage())
                                <li class="active"><a>{{ $page }}</a></li>
                                {{-- Enlazar a otras páginas --}}
                            @else
                                <li class="waves-effect"><a href="{{ $brands->url($page) }}">{{ $page }}</a></li>
                            @endif
                            {{-- Mostrar tres puntos (...) si no estás en las primeras o últimas páginas --}}
                        @elseif ($page == 6 && $brands->currentPage() < $brands->lastPage() - 3)
                            <li class="disabled"><a>...</a></li>
                        @endif
                    @endfor

                    {{-- Enlace a la página siguiente --}}
                    @if ($brands->hasMorePages())
                        <li class="waves-effect"><a href="{{ $brands->nextPageUrl() }}"><i
                                    class="material-icons">chevron_right</i></a></li>
                        {{-- Desactivar el enlace si no hay una página siguiente --}}
                    @else
                        <li class="disabled"><a href="{{ $brands->nextPageUrl() }}"><i
                                    class="material-icons">chevron_right</i></a></li>
                    @endif

                     {{-- Botón para ir a la última página --}}
                    @if ($brands->currentPage() < $brands->lastPage())
                        <li class="waves-effect"><a href="{{ $brands->url($brands->lastPage()) }}"><i class="material-icons">last_page</i></a></li>
                    @else
                        <li class="disabled"><i class="material-icons">last_page</i></li>
                    @endif
                </ul>
            </div>
        @endif








    </div>
@endsection
<!-- Final del contenido -->
