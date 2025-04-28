<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PrescriptMedicne;
use Illuminate\Http\Request;

class PrescripMedicineUploadController extends Controller
{
    public function prescriptionStore(Request $request)
    {
        $data = [];

        if ($request->hasFile('fileUpload')) {
            // Handle uploaded prescription
            $file = $request->file('fileUpload');
            $path = $file->store('prescriptions');

            $data['type'] = 'upload';
            $data['user_id'] = auth()->id();
            $data['phone'] = $request->input('phone');
            $data['file'] = $path;
            $data['medicine_duration'] = $request->input('medicine_duration');
            $data['reminder'] = $request->has('doseMorning') ? 1 : 0;

        } else {
            // Handle manual prescription
            $medicines = [];
            $data['user_id'] = auth()->id();
            $medicineNames = $request->input('medicineName');
            $doseMorning = $request->input('doseMorning');
            $doseAfternoon = $request->input('doseAfternoon');
            $doseNight = $request->input('doseNight');

            if ($medicineNames) {
                foreach ($medicineNames as $index => $name) {
                    $medicines[] = [
                        'name' => $name,
                        'doses' => [
                            'morning' => $doseMorning[$index] ?? null,
                            'afternoon' => $doseAfternoon[$index] ?? null,
                            'night' => $doseNight[$index] ?? null,
                        ]
                    ];
                }
            }

            $data['type'] = 'manual';
            $data['medicines'] = json_encode($medicines);
            $data['medicine_duration'] = $request->input('medicine_duration');
            $data['reminder'] = $request->has('reminder') ? 1 : 0;
        }

        PrescriptMedicne::create($data);

        return back()->with('success', 'Prescription saved successfully.');
    }
}
