<!-- Es necesario agregar al archivo blade ejemplo "home.blade.php" -->
<!-- Para que asi laravel pueda reconocerlo -->

<!-- Plantilla -->
@extends('layouts.plantilla')

<!-- Titulo -->
@section('title', 'Curso '. $curso->name)

<!-- Contenido -->
@section('content')
{{-- se puede imprimir de dos maneras  --}}
    {{-- #1 con el echo --}}
    {{-- <h1>Hola desde cursos personalizado de: <?php //echo $curso; ?></h1> --}}
    {{-- #2 con las doble llaves --}}
    <h1>Hola desde cursos personalizado de: {{$curso->name}}</h1>
    <a href="{{route('cursos.index')}}">Volver a cursos</a>
    <p><strong>Categoria: </strong>{{$curso->categoria}}</p>
    {{$curso->descripcion}}
@endsection
<!-- Final del contenido -->