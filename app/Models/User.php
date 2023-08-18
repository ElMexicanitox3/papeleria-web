<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use HasFactory;

    // table users
    protected $table = 'users';

    protected $fillable = [
        // otros campos del modelo
        'uuid',
        'name',
        'lastname',
        'email',
        'password',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    protected function password(): Attribute {
        return new Attribute(
            set: fn($value) => Hash::make($value),
        );
    }

    
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}

