<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;

class SalonController extends Controller
{
    public function showRegistrationForm(){
        return view('salon');
    }

    public function register(Request $request)
    {
        $salon = Salon::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email_address' => $request->email_address,
            'phone_number' => $request->phone_number,
            'salon_name' => $request->salon_name,
            'salon_address' => $request->salon_address,
            'salon_website1' => $request->salon_website1,
            'salon_website2' => $request->salon_website2,
        ]);

        return redirect()->route('home')->with('success', 'Salon registered!');
    }
}
