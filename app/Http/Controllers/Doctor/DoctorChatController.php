<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Appointment;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:appointments,id',
            'text' => 'nullable|string',
        ]);

        $appointment = Appointment::find($request->patient_id);

        $message = ChatMessage::create([
            'appointment_id' => $appointment->id,
            'doctor_id' => $appointment->doctor_id,
            'user_id' => $appointment->user_id,
            'sender' => 'doctor',
            'text' => $request->text,
        ]);

        return response()->json(['message' => 'Message sent!', 'data' => $message]);
    }

    public function fetchMessages($appointmentId)
    {
        $messages = ChatMessage::where('appointment_id', $appointmentId)->orderBy('created_at')->get();

        return response()->json($messages);
    }


}
