<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ambulance;
use Illuminate\Http\Request;
use App\Models\AmbulanceReview;
use App\Models\AmbulanceBooking;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AmbulanceController extends Controller
{
    public function ambulance()
    {
        $ambulances = Ambulance::latest()->get();
        return view('admin.ambulance.index', compact('ambulances'));
    }
    public function create()
    {
        return view('admin.ambulance.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'vehicle_number' => 'required|string|max:50|unique:ambulances,vehicle_number',
            'driver_name' => 'required|string|max:255',
            'driver_contact' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'availability' => 'required|in:Available,Busy,Inactive',
            'price_per_km' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:Active,In-Active',
        ]);
        // dd($request->all());
        $ambulance = new Ambulance();
        $ambulance->name = $request->name;
        $ambulance->contact_number = $request->contact_number;
        $ambulance->vehicle_number = $request->vehicle_number;
        $ambulance->driver_name = $request->driver_name;
        $ambulance->driver_contact = $request->driver_contact;
        $ambulance->location = $request->location;
        $ambulance->availability = $request->availability;
        $ambulance->price_per_km = $request->price_per_km;
        $ambulance->status = $request->status;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('ambulance'), $filename);
            $ambulance->image = 'ambulance/' . $filename;
        }

        $ambulance->save();

        return redirect()->back()->with('message' ,'Data Uploaded Successfully');
    }

    public function edit($id)
    {
        $ambulance = Ambulance::find($id);
        return view('admin.ambulance.edit', compact('ambulance'));
    }
    public function show($id)
    {
        $ambulance = Ambulance::find($id);
        return view('admin.ambulance.show', compact('ambulance'));
    }
    public function update(Request $request, $id)
    {
        $ambulance = Ambulance::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'vehicle_number' => 'required|string|max:50|unique:ambulances,vehicle_number,' . $ambulance->id,
            'driver_name' => 'required|string|max:255',
            'driver_contact' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'availability' => 'required|in:Available,Busy,Inactive',
            'price_per_km' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:Active,In-Active',
        ]);

        $ambulance->name = $request->name;
        $ambulance->contact_number = $request->contact_number;
        $ambulance->vehicle_number = $request->vehicle_number;
        $ambulance->driver_name = $request->driver_name;
        $ambulance->driver_contact = $request->driver_contact;
        $ambulance->location = $request->location;
        $ambulance->availability = $request->availability;
        $ambulance->price_per_km = $request->price_per_km;
        $ambulance->status = $request->status;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($ambulance->image && file_exists(public_path($ambulance->image))) {
                unlink(public_path($ambulance->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('ambulance'), $filename);
            $ambulance->image = 'ambulance/' . $filename;
        }

        $ambulance->save();

        return redirect()->route('admin.ambulance')->with('message', 'Ambulance updated successfully!');
    }


    public function delete($id){

        $ambulance = Ambulance::findOrFail($id);
        if ($ambulance->image) {
            if ($ambulance->image && file_exists(public_path($ambulance->image))) {
                unlink(public_path($ambulance->image));
            }
        }
        $ambulance->delete();
        return redirect()->back()->with('message', 'Ambulance deleted successfully!');
    }
    public function ambulanceBooking(Request $request)
    {
        // Log incoming request data (for debug purposes)
        \Log::info('Ambulance Booking Request:', $request->all());

        // Validate input
        $validated = $request->validate([
            'ambulance_id'     => 'required|exists:ambulances,id',
            'contact_number'   => 'required|string|max:15',
            'pickup_location'  => 'required|string',
            'drop_location'    => 'required|string',
            'pickup_time'      => 'required|date',
            'distance'         => 'nullable|numeric',
            'price'            => 'nullable|numeric',  // Accept only numeric value for price
        ]);

        // Make sure the user is authenticated
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'You must be logged in to book an ambulance.');
        }

        // Remove the currency symbol from price (if it exists) before saving
        $price = $validated['price'];
        $price = preg_replace('/[^\d.]/', '', $price); // Remove non-numeric characters (including currency symbol)

        // Save booking
        $booking = AmbulanceBooking::create([
            'user_id'          => auth()->id(),
            'ambulance_id'     => $validated['ambulance_id'],
            'contact_number'   => $validated['contact_number'],
            'pickup_location'  => $validated['pickup_location'],
            'drop_location'    => $validated['drop_location'],
            'pickup_time'      => $validated['pickup_time'],
            'distance'         => $validated['distance'],
            'price'            => $price,  // Store the cleaned price
        ]);

        // Log the booking data
        \Log::info('Ambulance Booking Stored:', $booking->toArray());

        $ambulance = Ambulance::find($validated['ambulance_id']);
        if ($ambulance) {
            $ambulance->update(['availability' => 'Busy']);
            \Log::info('Ambulance availability updated to Busy:', ['ambulance_id' => $ambulance->id]);
        } else {
            \Log::error('Ambulance not found for booking update:', ['ambulance_id' => $validated['ambulance_id']]);
        }


        return redirect()->route('home')->with('message', 'Booking request submitted successfully!');
    }

    public function ambulanceBookingReview(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $ambulance_id = $request->ambulance_id;
        $booking = AmbulanceBooking::where('user_id', $user->id)
                                    ->where('ambulance_id', $ambulance_id)
                                    ->first();
        if (!$booking) {
            return redirect()->back()->with('message', 'You can only leave a review for an ambulance you have completed a booking with.');
        }
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comments' => 'nullable|string|max:1000',
        ]);

        // Store the review
        $review = new AmbulanceReview();
        $review->user_id = $user->id;
        $review->ambulance_id = $ambulance_id;
        $review->rating = $request->rating;
        $review->comments = $request->comments;
        $review->save();
        return redirect()->back()->with('success', 'Your review has been submitted successfully.');

    }


}
