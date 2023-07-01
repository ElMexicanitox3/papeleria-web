<!-- Es necesario agregar al archivo blade ejemplo "home.blade.php" -->
<!-- Para que asi laravel pueda reconocerlo -->

<!-- Plantilla -->
@extends('layouts.plantilla')

<!-- Titulo -->
@section('title', 'Cruso Edit')

<!-- Contenido -->
@section('content')
    <h1>En esta pagina podras editar el curso</h1>
    <form action="{{route('cursos.update', $curso)}}" method="POST">
        
        {{-- el csrf es como un token --}}
        @csrf

        {{-- Laravel de put --}}
        @method('put')

        <label>Nombre:
            <input type="text" name="name" value="{{$curso->name}}">
        </label>
        <br>
        <label>
            descripcion:
            <textarea name="descripcion" rows="5">{{$curso->descripcion}}</textarea>
        </label>
        <br>
        <label>
            Categoria:
            <input type="text" name="categoria" value="{{$curso->categoria}}">
        </label>
        <br>
        <button type="submit">Actalizar Formulario</button>
    </form>
@endsection
<!-- Final del contenido -->