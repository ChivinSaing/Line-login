<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class LineAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('line')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('line')->user();
        session(['line_user' => $user]);
        return redirect()->route('home');
    }

    public function home()
    {
        $user = session('line_user');
        if (!$user) {
            return redirect('/login/line');
        }
        return view('home', compact('user'));
    }

    public function logout()
    {
        session()->forget('line_user');
        return redirect('/login/line');
    }
}
