<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'brand_id',
        'product_slug',
        'product_name',
        'generic_name',
        'side_effects',
        'medicine_type',
        'description',
        'thumbnail',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function category(){
        return $this->belongsTo(Category::class,'cat_id','id');
    }
    public function Stock()
    {
        return $this->hasMany(ProductStock::class);
    }
    public function totalStock()
    {
        return $this->hasMany(ProductStock::class)
                    ->sum('product_quantity');
    }

}
