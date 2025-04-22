<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPermissionController extends Controller
{
    public function toggleLineLogin(User $user)
    {
        if ($user->can('line login')) {
            $user->revokePermissionTo('line login');
        } else {
            $user->givePermissionTo('line login');
        }

        return back()->with('status', 'User LINE login access updated.');
    }
    // public function index()
    // {
    //     $users = User::all();
    //     return view('admin.login-permissions.index', compact('users'));
    // }
    // public function toggle(User $user)
    // {
    //     if ($user->can('can-login')) {
    //         $user->revokePermissionTo('can-login');
    //     } else {
    //         $user->givePermissionTo('can-login');
    //     }

    //     return redirect()->back()->with('status', 'User login permission updated.');
    // }
}
