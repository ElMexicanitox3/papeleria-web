<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    //  Atributo personalizado
    protected function name(): Attribute {
        return new Attribute(

            // Accesor de atributo #1
            // get: function ($value) {
            //     return ucwords($value);
            // }, 

            // Accesor de atributo #2 manera alternativa
            get: fn($value) => ucwords($value),

            // Mutador de atributo
            // set: function ($value) {
            //     return strtolower($value);
            // },

            // Mutador de atributo manera alternativa
            set: fn($value) => strtolower($value)
        );
    }
}
