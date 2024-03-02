<?php

namespace App\Models\Products\products;

use App\Models\Products\brands\BrandsModel;
use App\Models\Products\category\CategoryModel;
use App\Models\Products\subcategory\SubCategoryModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    protected $fillable = [
        'uuid',
        'subcategory_id',
        'brand_id',
        'barcode',
        'model',
        'name',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategoryModel::class, 'subcategory_id');
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
