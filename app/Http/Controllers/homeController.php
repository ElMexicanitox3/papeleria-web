<?php

// El nombre del espacio debe ser el mismo que el nombre de la carpeta
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // El metodo __invoke se ejecuta cuando se llama al controlador
    public function __invoke()
    {
        // return view('welcome');
        return "Hola desde el controlador";
    }
}
