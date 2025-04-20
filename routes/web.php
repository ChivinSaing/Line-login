<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login/line', [LineAuthController::class, 'redirectToProvider']);
Route::get('/login/line/callback', [LineAuthController::class, 'handleProviderCallback']);
Route::get('/home', [LineAuthController::class, 'home'])->name('home');
Route::get('/logout', [LineAuthController::class, 'logout']);

