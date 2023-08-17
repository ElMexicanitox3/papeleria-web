<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class StoreModel extends Model
{
    use HasFactory;
    
    protected $table = 'store';

    protected $fillable = [
        'uuid',
        'tin',
        'name',
        'email',
        'phone',
        'address',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
