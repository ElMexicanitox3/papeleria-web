<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        return 'Hola desde cursos';
    }

    public function create()
    {
        return 'Crear nuevo curso';
    }

    public function show($curso)
    {
        return 'Bienvenido al curso: ' . $curso;
    }
}
