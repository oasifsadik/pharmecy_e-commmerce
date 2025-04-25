<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    use HasFactory;
    protected $table = 'lab_tests';
    protected $fillable =[
        'name',
        'hospital_name',
        'hospital_division',
        'hospital_district',
        'hospital_upazila',
        'hospital_union',
        'hospital_ward',
        'hospital_address',
        'hospital_post_code',
        'hospital_phone',
        'hospital_email',
        'hospital_website',
        'description',
        'price',
        'test_code',
        'image',
        'status',
    ];
}
