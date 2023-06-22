<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello World';
});

// El ordne importa
// supongamos que tenemos una ruta /users/1 y otra /users/new
// si ponemos la ruta /users/new primero, al entrar a /users/1 nos va a mandar a /users/new
// porque new es un parametro
Route::get('/users/new', function () {
    return 'Crear nuevo usuario';
});

Route::get('/users/{id}', function ($id) {
    return "Mostrando detalle del usuario: {$id}";
});

// podemos poner un parametro opcional
Route::get('/saludo/{name}/{apellidos?}', function ($name, $apellidos = null) {
    // Validamos si tiene solo un nombre o nombre y apellidos
    if ($apellidos) {
        return "Hola {$name} {$apellidos}";
    }
    return "Hola {$name}";
});