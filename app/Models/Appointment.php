<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['doctor_id','user_id', 'patient_name', 'age', 'symptoms', 'appointment_date'];

    public function files()
    {
        return $this->hasMany(AppointmentFile::class);
    }
    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
