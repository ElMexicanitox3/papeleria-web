<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    // php artisan make:model Curso

    use HasFactory;

    // Tabla que va a modificar
    // protected $table = "users";

    // Campos que se pueden modificar
    // solo por asignacion masiva
    protected $fillable = ['name', 'descripcion', 'categoria'];

    // Campos que no se pueden modificar
    // protected $guarded = ['status'];

    // basicamente filtra los campos que se pueden modificar
    // Y guarda los que no se pueden modificar

}
