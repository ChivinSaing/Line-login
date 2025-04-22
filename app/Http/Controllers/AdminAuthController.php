<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showlogin_form()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admins')->attempt($credentials)) {
            $admin = Auth::guard('admins')->user();

            if ($admin->is_super) {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            }

            Auth::guard('admins')->logout();
            return back()->withErrors(['email' => 'Access denied.']);
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
    public function dashboard()
    {
        // $admin = session('line_user');
        // if (!$admin) {
        //     return redirect('/admin/login');
        // }
        $salons = User::all();
        return view('admin.dashboard',compact('salons'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admins')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // session()->forget('line_user');

        return redirect()->route('admin.login');
    }
}
