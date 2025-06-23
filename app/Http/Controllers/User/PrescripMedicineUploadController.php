<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PrescriptMedicne;
use App\Models\Order;
use Illuminate\Http\Request;


class PrescripMedicineUploadController extends Controller
{
    public function sd(){
        return "sdvn";
    }
    // public function prescriptionStore(Request $request)
    // {
    //     $data = [];
    //     $user = auth()->user();
    //     if ($request->hasFile('fileUpload')) {
    //         // Handle uploaded prescription vmfijnvijvn
    //         $file = $request->file('fileUpload');
    //         $path = $file->store('prescriptions');

    //         $data['type'] = 'upload';
    //         $data['user_id'] = auth()->id();
    //         $data['phone'] = $request->input('phone');
    //         $data['file'] = $path;
    //         $data['medicine_duration'] = $request->input('medicine_duration');
    //         $data['reminder'] = $request->has('doseMorning') ? 1 : 0;

    //     } else {
    //         // Handle manual prescription
    //         $medicines = [];
    //         $data['user_id'] = auth()->id();
    //         $medicineNames = $request->input('medicineName');
    //         $doseMorning = $request->input('doseMorning');
    //         $doseAfternoon = $request->input('doseAfternoon');
    //         $doseNight = $request->input('doseNight');

    //         if ($medicineNames) {
    //             foreach ($medicineNames as $index => $name) {
    //                 $medicines[] = [
    //                     'name' => $name,
    //                     'doses' => [
    //                         'morning' => $doseMorning[$index] ?? null,
    //                         'afternoon' => $doseAfternoon[$index] ?? null,
    //                         'night' => $doseNight[$index] ?? null,
    //                     ]
    //                 ];
    //             }
    //         }

    //         $data['type'] = 'manual';
    //         $data['medicines'] = json_encode($medicines);
    //         $data['medicine_duration'] = $request->input('medicine_duration');
    //         $data['reminder'] = $request->has('reminder') ? 1 : 0;
    //     }

    //     PrescriptMedicne::create($data);
    //     Order::create([
    //     'user_id' => $user->id,
    //     'country' => $user->country,
    //     'first_name' => $user->first_name,
    //     'last_name' => $user->last_name,
    //     'email' => $user->email,
    //     'company_name' => $user->company_name,
    //     'address' => $user->address,
    //     'street_address' => $user->street_address,
    //     'city' => $user->city,
    //     'state_county' => $user->state_county,
    //     'postcode' => $user->postcode,
    //     'phone' => $user->phone,
    //     'payment_method' => $request->input('payment_method', 'Prescription'), // fallback method
    //     'status' => 'Pending',
    //     'tracking_no' => $user->first_name . rand(1000, 9999),
    // ]);
    //     return back()->with('success', 'Prescription saved successfully.');
    // }
    public function prescriptionStore(Request $request)
{
    // dd($request);
    $user = auth()->user();
    $data = [
        'user_id' => $user->id,
        'medicine_duration' => $request->input('medicine_duration'),
        'reminder' => $request->has('reminder') || $request->has('doseMorning') ? 1 : 0,
    ];

    // If file is uploaded
    if ($request->hasFile('fileUpload')) {
        $file = $request->file('fileUpload');
        $path = $file->store('prescriptions');

        $data['type'] = 'upload';
        $data['file'] = $path;
        $data['phone'] = $request->input('phone') ?? $user->phone;
    } else {
        // Manual entry
       $submittedMedicines = $request->input('medicines', []);
    $formattedMedicines = [];

    foreach ($submittedMedicines as $medicine) {
        $formattedMedicines[] = [
            'name' => $medicine['name'],
            'doses' => [
                'morning' => $medicine['doses']['morning'] ?? "0",
                'afternoon' => $medicine['doses']['afternoon'] ?? "0",
                'night' => $medicine['doses']['night'] ?? "0",
            ]
        ];

    }

    // dd($formattedMedicines);

        $data['type'] = 'manual';
        $data['medicines'] = json_encode($formattedMedicines);
        $data['phone'] = $user->phone;
        // dd($data);
    }

    // 🔁 Create order first
    $order = Order::create([
        'user_id' => $user->id,
        'country' => $user->country,
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'email' => $user->email,
        'company_name' => $user->company_name,
        'address' => $user->address,
        'street_address' => $user->street_address,
        'city' => $user->city,
        'state_county' => $user->state_county,
        'postcode' => $user->postcode,
        'phone' => $user->phone,
        'payment_method' => $request->input('payment_method', 'Prescription'),
        'status' => 'Pending',
        'total_price' => 0,
        'tracking_no' => $user->first_name . rand(1000, 9999),
        'order_type' => 'prescribtion',
        
    ]);
// dd($order);
    $data['order_id'] = $order->id;
    // dd($data);
    PrescriptMedicne::create($data);

    return back()->with('success', 'Prescription and Order saved successfully.');
}


}
