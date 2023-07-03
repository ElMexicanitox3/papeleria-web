<?php

use App\Http\Controllers\HomeController;
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


Route::controller(HomeController::class)->group(function(){
    // Route::get('cursos', 'index')->name('cursos.index');
    // Route::get('cursos/create','create')->name('cursos.create');
    // Route::post('cursos', 'store')->name('cursos.store');
    // Route::get('cursos/{curso}', 'show')->name('cursos.show');
    // Route::get('cursos/{curso}/edit', 'edit')->name('cursos.edit');
    // Route::put('cursos/{curso}', 'update')->name('cursos.update');
    
    Route::get('/', 'index')->name('home.index');
    Route::get('login', 'login')->name('home.login');
    Route::post('login', 'loginUser')->name('home.loginUser');
    Route::get('register', 'register')->name('home.register');
    Route::post('register', 'newUser')->name('home.newUser');
});