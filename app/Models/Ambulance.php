<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'contact_number',
        'vehicle_number',
        'driver_name',
        'driver_contact',
        'location',
        'availability',
        'price_per_km',
        'image'
    ];

}
