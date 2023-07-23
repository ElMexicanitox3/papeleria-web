<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        // otros campos del modelo
        'uuid',
        'barcode',
        'model',
        'name',
        'description',
        'subcategory_id',
        'brand_id',
    ];

    public function subcategory()
    {
        return $this->belongsTo(SubcategoryModel::class, 'subcategory_id');
    }

    public function brand()
    {
        return $this->belongsTo(BrandsModel::class, 'brand_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
