<?php

use App\Http\Controllers\SalonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserPermissionController;

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


Route::get('/salon', [SalonController::class, 'showRegistrationForm'])->name('register.salon');
Route::post('/salon',[SalonController::class,'register']);




Route::middleware(['auth'])->group(function () {
    Route::get('/admin/login-permissions', [UserPermissionController::class, 'index'])->name('admin.permissions');
    Route::post('/admin/login-permissions/{user}/toggle', [UserPermissionController::class, 'toggle'])->name('admin.permissions.toggle');
});
