<?php

namespace App\Http\Controllers\Admin;

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
}
