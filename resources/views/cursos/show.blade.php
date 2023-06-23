<!-- Es necesario agregar al archivo blade ejemplo "home.blade.php" -->
<!-- Para que asi laravel pueda reconocerlo -->

<!-- Plantilla -->
@extends('layouts.plantilla')

<!-- Titulo -->
@section('title', 'Home')

<!-- Contenido -->
@section('content')
{{-- se puede imprimir de dos maneras  --}}
    {{-- #1 con el echo --}}
    <h1>Hola desde cursos personalizado de: <?php echo $curso; ?></h1>
    {{-- #2 con las doble llaves --}}
    <h1>Hola desde cursos personalizado de: {{$curso}}</h1>
@endsection
<!-- Final del contenido -->