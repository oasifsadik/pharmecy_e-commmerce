<?php

namespace App\Http\Controllers\Admin;

use App\Models\LabTest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LabBooking;

class LabTestController extends Controller
{
    public function labTest()
    {
        $labTests = LabTest::all();
        return view('admin.labTest.index',compact('labTests'));
    }

    public function create()
    {
        return view('admin.labTest.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'test_code' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'status' => 'required|in:Active,In-Active',
            'description' => 'required|string',
            'hospital_name' => 'required|string|max:255',
            'hospital_division' => 'required|string|max:255',
            'hospital_district' => 'required|string|max:255',
            'hospital_upazila' => 'required|string|max:255',
            'hospital_union' => 'nullable|string|max:255',
            'hospital_ward' => 'nullable|string|max:255',
            'hospital_address' => 'required|string|max:500',
            'hospital_post_code' => 'nullable|string|max:20',
            'hospital_phone' => 'nullable|string|max:20',
            'hospital_email' => 'nullable|email|max:255',
            'hospital_website' => 'nullable|url|max:255',
        ]);
        $labTest = new LabTest();
        $labTest->name = $request->name;
        $labTest->test_code = $request->test_code;
        $labTest->price = $request->price;
        $labTest->description = $request->description;
        $labTest->status = $request->status;
        $labTest->hospital_name = $request->hospital_name;
        $labTest->hospital_division = $request->hospital_division;
        $labTest->hospital_district = $request->hospital_district;
        $labTest->hospital_upazila = $request->hospital_upazila;
        $labTest->hospital_union = $request->hospital_union;
        $labTest->hospital_ward = $request->hospital_ward;
        $labTest->hospital_address = $request->hospital_address;
        $labTest->hospital_post_code = $request->hospital_post_code;
        $labTest->hospital_phone = $request->hospital_phone;
        $labTest->hospital_email = $request->hospital_email;
        $labTest->hospital_website = $request->hospital_website;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/lab_tests'), $filename);
            $labTest->image = 'lab_tests/' . $filename;
        }
        $labTest->save();
        return redirect()->route('admin.lab.test')->with('success', 'Lab Test created successfully.');
    }

    public function edit($id)
    {
        $labTest = LabTest::findOrFail($id);
        return view('admin.labTest.edit', compact('labTest'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'test_code' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'status' => 'required|in:Active,In-Active',
            'description' => 'required|string',
            'hospital_name' => 'required|string|max:255',
            'hospital_division' => 'required|string|max:255',
            'hospital_district' => 'required|string|max:255',
            'hospital_upazila' => 'required|string|max:255',
            'hospital_union' => 'nullable|string|max:255',
            'hospital_ward' => 'nullable|string|max:255',
            'hospital_address' => 'required|string|max:500',
            'hospital_post_code' => 'nullable|string|max:20',
            'hospital_phone' => 'nullable|string|max:20',
            'hospital_email' => 'nullable|email|max:255',
            'hospital_website' => 'nullable|url|max:255',
        ]);
        $labTest = LabTest::findOrFail($id);
        $labTest->name = $request->name;
        $labTest->test_code = $request->test_code;
        $labTest->price = $request->price;
        $labTest->description = $request->description;
        $labTest->status = $request->status;
        $labTest->hospital_name = $request->hospital_name;
        $labTest->hospital_division = $request->hospital_division;
        $labTest->hospital_district = $request->hospital_district;
        $labTest->hospital_upazila = $request->hospital_upazila;
        $labTest->hospital_union = $request->hospital_union;
        $labTest->hospital_ward = $request->hospital_ward;
        $labTest->hospital_address = $request->hospital_address;
        $labTest->hospital_post_code = $request->hospital_post_code;
        $labTest->hospital_phone = $request->hospital_phone;
        $labTest->hospital_email = $request->hospital_email;
        $labTest->hospital_website = $request->hospital_website;

        if ($request->hasFile('image')) {
            if ($labTest->image) {
                unlink(public_path($labTest->image));
            }
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/lab_tests'), $filename);
            $labTest->image = 'lab_tests/' . $filename;
        }
        $labTest->save();
        return redirect()->route('admin.lab.test')->with('success', 'Lab Test updated successfully.');
    }
    public function show($id)
    {
        $labTest = LabTest::findOrFail($id);
        return view('admin.labTest.show', compact('labTest'));
    }
    public function delete($id)
    {
        $labTest = LabTest::findOrFail($id);
        if ($labTest->image) {
            unlink(public_path($labTest->image));
        }
        $labTest->delete();
        return redirect()->route('admin.lab.test')->with('success', 'Lab Test deleted successfully.');
    }

    public function labTestBookingList(){
        $bookingList = LabBooking::get();
        return view('admin.labTest.bookingList',compact('bookingList'));
    }

    public function labTestBookingView($id){
        $booking = LabBooking::findOrFail($id);
        return view('admin.labTest.bookingView',compact('booking'));
    }
}
