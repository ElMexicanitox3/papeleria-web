<div class="bg-white rounded-md shadow-md border">
    <div class="p-3 bg-gray-200">
        <h2 class="mb-4 text-xl font-bold">@yield('titleCard')</h2>
    </div>
    {{-- Poner una condicional para que se renderize este div --}}
    <div class="py-6 px-2">
        @yield('buttonsCard')
    </div>

    {{-- @if ($mostrarBotones)
        @section('buttonsCard')
            <!-- Contenido de los botones -->
        @endsection
    @endif --}}

    <div class="overflow-x-auto">
        @yield('contentCard')
    </div>

    @yield('footerCard')

</div>