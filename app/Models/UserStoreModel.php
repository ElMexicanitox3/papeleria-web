<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserStoreModel extends Model
{
    use HasFactory;

    protected $table = 'user_store';

    protected $fillable = [
        'uuid',
        'user_id',
        'store_id',
        'is_owner',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
