<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbulanceReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ambulance_id',
        'rating',
        'comments'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ambulance()
    {
        return $this->belongsTo(Ambulance::class);
    }
}
