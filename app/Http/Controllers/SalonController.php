<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

class SalonController extends Controller
{
    public function showRegistrationForm(){
            
        return view('salon');
    }
    public function register(Request $request)
    {
        // Generate random password
        $randomPassword = Str::random(10);
        $salon = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password'   => Hash::make($randomPassword),
            'phone_number' => $request->phone_number,
            'salon_name' => $request->salon_name,
            'salon_address' => $request->salon_address,
            'salon_website_1' => $request->salon_website_1,
            'salon_website_2' => $request->salon_website_2,
            'is_verified' => false, // Set is_verified to false by default
        ]);

        // Redirect with message that admin needs to verify
        return redirect()->route('home')->with('info', 'Registration successful. Please wait for admin verification before logging in.');
    }
}
