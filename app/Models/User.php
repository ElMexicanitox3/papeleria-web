<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Atributute
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Model
{
    use HasFactory;

    // protected function password(): Attribute {
    //     return new Attribute(

    //         set: fn($value) => strtolower($value),
    //     );
    // }

}
