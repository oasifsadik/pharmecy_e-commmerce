<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AmbulanceBooking;
use App\Http\Controllers\Controller;

class AmbulanceBookingController extends Controller
{
    public function ambulanceBookingList(){
        $ambulanceBookings = AmbulanceBooking::where('status', '=', 'Pending')->orderBy('id', 'desc')->get();
        return view('admin.ambulanceBooking.index', compact('ambulanceBookings'));
    }
    public function ambulanceBookingConfirmList(){
        $ambulanceBookings = AmbulanceBooking::where('status', '=', 'Confirmed')->orderBy('id', 'desc')->get();
        return view('admin.ambulanceBooking.confirmed', compact('ambulanceBookings'));
    }
    public function ambulanceBookingCancelList(){
        $ambulanceBookings = AmbulanceBooking::where('status', '=', 'Cancelled')->orderBy('id', 'desc')->get();
        return view('admin.ambulanceBooking.cancelled', compact('ambulanceBookings'));
    }
    public function ambulanceBookingShow($id){
        $ambulanceBooking = AmbulanceBooking::findOrFail($id);
        return view('admin.ambulanceBooking.show', compact('ambulanceBooking'));
    }
    public function confirm($id)
    {
        $booking = AmbulanceBooking::findOrFail($id);
        $booking->status = 'Confirmed';
        $booking->save();

        return redirect()->route('admin.ambulance.booking.List')->with('message', 'Booking confirmed successfully!');
    }
    public function cancel($id)
    {
        $booking = AmbulanceBooking::findOrFail($id);
        $booking->status = 'Cancelled';
        $booking->save();

        return redirect()->route('admin.ambulance.booking.confirm.List')->with('message', 'Booking cancelled successfully!');
    }

}
