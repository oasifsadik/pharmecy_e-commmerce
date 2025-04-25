<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'lab_test_id',
        'name',
        'email',
        'phone',
        'address',
        'date',
        'time',
        'status',
        'payment_status',
        'transaction_id',
    ];
    public function labTest()
    {
        return $this->belongsTo(LabTest::class);
    }

}
