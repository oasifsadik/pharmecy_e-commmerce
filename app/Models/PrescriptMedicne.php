<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptMedicne extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'type',
        'phone',
        'file',
        'medicines',
        'medicine_duration',
        'reminder'
    ];

    protected $casts = [
        'medicines' => 'array',
        'reminder' => 'boolean',
    ];
}
