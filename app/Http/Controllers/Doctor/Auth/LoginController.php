<?php

namespace App\Http\Controllers\Doctor\Auth;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/doctor/dashboard';

    public function showLoginForm(){
        if (Auth::guard('doctor')->check()) {
            return redirect()->route('doctor.dashboard');
        }
        return view('doctors.auth.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::guard('doctor')->check()) {
            return redirect()->route('doctor.dashboard');
        }
        $credentials = $request->only('email', 'password');

        if (Auth::guard('doctor')->attempt($credentials)) {
            return redirect()->intended('/doctor/dashboard');
        }
        return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
    }

    public function registerForm(){
        return view('doctors.auth.register');
    }
    public function registerStore(Request $request){
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:Male,Female,Other',
            'dob' => 'required|date',
            'state' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'specialization' => 'required|string|max:255',
            'license_number' => 'required|string|max:255|unique:doctors,license_number',
            'clinic_name' => 'nullable|string|max:255',
            'clinic_address' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'required|min:6|confirmed',
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $profilePath = $request->file('profile_picture')->store('doctor_profiles', 'public');
        } else {
            $profilePath = null;
        }

        Doctor::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'state' => $request->state,
            'experience' => $request->experience,
            'specialization' => $request->specialization,
            'license_number' => $request->license_number,
            'clinic_name' => $request->clinic_name,
            'clinic_address' => $request->clinic_address,
            'country' => $request->country,
            'city' => $request->city,
            'profile_picture' => $profilePath,
            'password' => Hash::make($request->password),
            'status' => 'Pending',
        ]);
        return redirect()->route('doctor.login')->with('message', 'Registration successful! Please wait for admin approval.');
    }

    public function doctorLogout(Request $request)
{
    Auth::guard('doctor')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login.doctor');
}


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
