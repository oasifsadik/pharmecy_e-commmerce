<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',  // Add product_id to the fillable array
        'product_quantity',
        'manufacture_date',
        'expiry_date',
        'inner_packet',
        'single_unit',
        'buying_price',
        'selling_price',
        'inner_packet_price',
        'single_unit_price',
        'discount_price',
        'discount_type',
        'discount_value',
        'bottle_size',
        'color',
        'size',
    ];
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
