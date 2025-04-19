<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Redirect to LINE login
Route::get('/login/line', function () {
    return Socialite::driver('line')->redirect();
});

// Callback from LINE
Route::get('/login/line/callback', function () {
    $lineUser = Socialite::driver('line')->user();

    $user = User::firstOrCreate(
        ['line_id' => $lineUser->getId()],
        [
            'name' => $lineUser->getName(),
            'email' => $lineUser->getEmail() ?? $lineUser->getId() . '@line.local', // LINE may not return email
        ]
    );

    Auth::login($user);

    return redirect('/home');
});
