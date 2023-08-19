@if ($paginator->hasPages())
    <div class="pagination-container">
        <ul class="pagination">
            {{-- Enlace a la página anterior --}}
            @if ($paginator->currentPage() > 1)
                <li class="waves-effect"><a href="{{ $paginator->url(1) }}"><i class="material-icons">first_page</i></a></li>
            @else
                <li class="disabled"><i class="material-icons">first_page</i></li>
            @endif

            @if ($paginator->onFirstPage())
                <li class="disabled"><i class="material-icons">chevron_left</i></li>
            @else
                <li class="waves-effect"><a href="{{ $paginator->previousPageUrl() }}"><i
                            class="material-icons">chevron_left</i></a></li>
            @endif

            {{-- Elementos de paginación --}}
            @for ($page = 1; $page <= $paginator->lastPage(); $page++)
                {{-- Mostrar las primeras 5 páginas, las 2 últimas o las que estén cerca de la actual --}}
                @if ($page <= 5 || $page > $paginator->lastPage() - 2 || abs($page - $paginator->currentPage()) <= 1)
                    {{-- Resaltar la página actual --}}
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a>{{ $page }}</a></li>
                        {{-- Enlazar a otras páginas --}}
                    @else
                        <li class="waves-effect"><a href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
                    @endif
                    {{-- Mostrar tres puntos (...) si no estás en las primeras o últimas páginas --}}
                @elseif ($page == 6 && $paginator->currentPage() < $paginator->lastPage() - 3)
                    <li class="disabled"><a>...</a></li>
                @endif
            @endfor

            {{-- Enlace a la página siguiente --}}
            @if ($paginator->hasMorePages())
                <li class="waves-effect"><a href="{{ $paginator->nextPageUrl() }}"><i
                            class="material-icons">chevron_right</i></a></li>
                {{-- Desactivar el enlace si no hay una página siguiente --}}
            @else
                <li class="disabled"><a href="{{ $paginator->nextPageUrl() }}"><i
                            class="material-icons">chevron_right</i></a></li>
            @endif

            {{-- Botón para ir a la última página --}}
            @if ($paginator->currentPage() < $paginator->lastPage())
                <li class="waves-effect"><a href="{{ $paginator->url($paginator->lastPage()) }}"><i
                            class="material-icons">last_page</i></a></li>
            @else
                <li class="disabled"><i class="material-icons">last_page</i></li>
            @endif

            {{-- Texto que indica la página actual --}}
            <p class="center-align">Página {{ $paginator->currentPage() }} de {{ $paginator->lastPage() }}</p>
        </ul>
    </div>
@endif
