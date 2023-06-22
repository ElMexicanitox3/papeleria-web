<?php

use Illuminate\Support\Facades\Route;

// Agreamos el nombre del controlador y el metodo que queremos que se ejecute
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/', HomeController::class);

// Podemos agrupar las rutas de un controlador
Route::controller(CursoController::class)->group(function(){
    Route::get('cursos', 'index');
    Route::get('cursos/create','create');
    Route::get('cursos/{curso}', 'show');
});


// El ordne importa
// supongamos que tenemos una ruta /users/1 y otra /users/new
// si ponemos la ruta /users/new primero, al entrar a /users/1 nos va a mandar a /users/new
// porque new es un parametro
// Route::get('/curso/new', function () {
//     return 'Crear nuevo usuario';
// });

// Route::get('/curso/{id}', function ($id) {
//     return "Mostrando detalle del usuario: {$id}";
// });

// // podemos poner un parametro opcional
// Route::get('/curso/{name}/{apellidos?}', function ($name, $apellidos = null) {
//     // Validamos si tiene solo un nombre o nombre y apellidos
//     if ($apellidos) {
//         return "Hola {$name} {$apellidos}";
//     }
//     return "Hola {$name}";
// });
