<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        return view('cursos.index');
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function show($curso)
    {
        // Forma 1 es un array asociativo
        // return view('cursos.show', ['curso' => $curso]);

        // Forma 2 es una funcion pero tiene que concordar con el nombre de la variable
        // Que sea igual al nombre de la variable que se esta pasando
        // return view('cursos.show', compact('curso'));

        return view('cursos.show', compact('curso'));


    }
}
