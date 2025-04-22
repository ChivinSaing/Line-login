<?php

namespace App\Http\Controllers;

use Exception;
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
        try {
            // get user data from line
            $user = Socialite::driver('line')->user();
            session(['line_user' => $user]);
            //dd($user, $user->id);
            // find user in the database where the social id is the same with the id provided by Google
            $findUser = User::where('provider_id', $user->id)->first();
           
            // // in case approve the user to login from Manager
            // $findUser->givePermissionTo('can_login_with_line');
            
            // if user is found, login and redirect to home page
            if($findUser && $findUser->is_verified){
                // check if that user can login to our system
                $findUser->givePermissionTo('can_login_with_line');
                
                if(!$findUser->can('can_login_with_line')){
                    // redirect to another page
                    return redirect()->route('register.salon');
                }
                // allow authorize to our system
                Auth::login($findUser);
                // redirect to home page
                return redirect()->route('home');
            }
            // if user is not found, create new user
            $newUser = User::updateOrCreate([
                'email' => $user->email ?? 'noemail@gmail.com',
                // 'name' => $user->name,
                'first_name' => $user->first_name ?? '',
                'last_name' => $user->last_name ?? '',
                'provider_id' => $user->id,
                'provider' => 'line',
                'password' => bcrypt('my-password'),  // fill password by whatever pattern you choose
            ]);

            // Auth::login($newUser);
            return redirect(route('register.salon'));

        } catch (Exception $e) {
            return redirect('/login/line');
        }
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
