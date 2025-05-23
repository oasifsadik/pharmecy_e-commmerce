<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable =
    [
        'brand_name',
        'brand_description'
    ];

    public function product(){
        return $this->hasMany(Product::class,'brand_id');
    }

}
