<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'full_name', 'email', 'phone', 'gender', 'dob', 'state', 'experience',
        'specialization', 'license_number', 'clinic_name', 'clinic_address',
        'country', 'city', 'profile_picture', 'password', 'status'
    ];

    protected $hidden = ['password', 'remember_token'];
}
