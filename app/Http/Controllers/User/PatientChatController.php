<?php

namespace App\Http\Controllers\User;

use App\Models\Appointment;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PatientChatController extends Controller
{
    public function index(Request $request, $doctorId = null)
    {
        $userId = Auth::guard('web')->id();

        // All appointments for this patient with related doctor
        $appointments = Appointment::with('doctor')
            ->where('user_id', $userId)
            ->get();

        // Group appointments by doctor_id to avoid duplicates in sidebar
        $doctorAppointments = $appointments->groupBy('doctor_id');

        // Select doctor ID from URL or fallback to first doctor
        $selectedDoctorId = $doctorId ?? $appointments->first()?->doctor_id;

        // Get the appointment between this user and selected doctor
        $selectedAppointment = $appointments->where('doctor_id', $selectedDoctorId)->first();

        // Load chat messages for selected appointment, or empty collection
        $messages = $selectedAppointment
            ? ChatMessage::where('appointment_id', $selectedAppointment->id)
                ->orderBy('created_at')
                ->get()
            : collect();

        return view('medWebsite.profile.chat', [
            'doctors' => $doctorAppointments,
            'activeAppointment' => $selectedAppointment,
            'messages' => $messages,
            'selectedDoctorId' => $selectedDoctorId,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:appointments,id',
            'text' => 'required|string|max:1000',
        ]);

        $appointment = Appointment::findOrFail($request->patient_id);

        ChatMessage::create([
            'appointment_id' => $appointment->id,
            'doctor_id' => $appointment->doctor_id,
            'user_id' => $appointment->user_id,
            'sender' => 'patient',
            'text' => $request->text,
        ]);

        return response()->json(['status' => 'success']);
    }

    public function fetchMessages($appointmentId)
    {
        $messages = ChatMessage::where('appointment_id', $appointmentId)
            ->orderBy('created_at')
            ->get();

        return response()->json($messages);
    }
}
