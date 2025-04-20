<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Client;


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
