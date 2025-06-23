<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\AppointmentFile;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $doctorId = Auth::id();

        // Get all patients who have appointments with this doctor
        $appointments = Appointment::where('doctor_id', $doctorId)->get();

        // Default: select first patient (or use ?patient_id= in URL)
        $selectedPatientId = $request->get('patient_id') ?? $appointments->first()?->id;

        // $messages = $selectedPatientId
        //     ? ChatMessage::where('doctor_id', $doctorId)
        //         ->where('appointment_id', $selectedPatientId)
        //         ->orderBy('created_at')
        //         ->get()
        //     : collect();

        $appointmentFiles = $selectedPatientId
            ? AppointmentFile::where('appointment_id', $selectedPatientId)->get()
            : collect();

        return view('doctors.chat', [
            'patients' => $appointments,
            // 'messages' => $messages,
            'files' => $appointmentFiles,
            'activePatient' => $appointments->where('id', $selectedPatientId)->first(),
        ]);
    }
}

