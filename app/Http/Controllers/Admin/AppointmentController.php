<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentFile;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_name' => 'required|string|max:255',
            'age' => 'required|string|max:10',
            'symptoms' => 'nullable|string',
            'appointment_date' => 'required|date',
            'report_files.*' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

       $appointment = Appointment::create([
            'doctor_id' => $request->doctor_id,
            'user_id' => auth()->id(),
            'patient_name' => $request->patient_name,
            'age' => $request->age,
            'symptoms' => $request->symptoms,
            'appointment_date' => $request->appointment_date,
        ]);
        if ($request->hasFile('report_files')) {
            foreach ($request->file('report_files') as $file) {
                $path = $file->store('appointment_reports', 'public');
                AppointmentFile::create([
                    'appointment_id' => $appointment->id,
                    'file_path' => $path
                ]);
            }
        }

        return back()->with('success', 'Appointment booked successfully!');
    }

    public function appoinmentList(){
        $appointmentList = Appointment::where('doctor_id', auth()->id())->get();
        return view('doctors.appointmentList',compact('appointmentList'));
    }
    public function create(){
        $appointments = Appointment::where('doctor_id', auth()->id())->get();
        return view('doctors.prescribe',compact('appointments'));
    }
}
