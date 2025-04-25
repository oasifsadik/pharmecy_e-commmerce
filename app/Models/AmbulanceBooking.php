<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbulanceBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ambulance_id',
        'contact_number',
        'pickup_location',
        'drop_location',
        'pickup_time',
        'distance',
        'price',
        'status',
    ];

    public function ambulance()
    {
        return $this->belongsTo(Ambulance::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
