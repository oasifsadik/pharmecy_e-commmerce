<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = ['appointment_id', 'doctor_id', 'user_id', 'sender', 'text', 'file'];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
