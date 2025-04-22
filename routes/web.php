<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\UserPermissionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login/line', [LineAuthController::class, 'redirectToProvider']);
Route::get('/login/line/callback', [LineAuthController::class, 'handleProviderCallback']);
Route::get('/home', [LineAuthController::class, 'home'])->name('home');
Route::get('/logout', [LineAuthController::class, 'logout']);

// Route::middleware('guest:admins')->group(function () {
    Route::get('/admin/login',[AdminAuthController::class,'showlogin_form'])->name('admin.login');
    Route::post('/admin/login',[AdminAuthController::class,'login']);
// });

// Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminAuthController::class,'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout',[AdminAuthController::class,'logout'])->name('admin.logout');
// });



