<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;


class BranchModel extends Model
{
    use HasFactory;

    protected $table = 'store_branches';

    protected $fillable = [
        'uuid',
        'store_id',
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
