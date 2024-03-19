<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect() 
    {
        return Socialite::driver('google')->stateless()->redirect();
    } 

    public function callback()
    {
        $userFromGoogle = Socialite::driver('google')->stateless()->user();

        // $userFromDatabase = Customer::where('google_id', $userFromGoogle->getId())->first();
        $userFromDatabase = User::where('google_id', $userFromGoogle->getId())->first();

        if(!$userFromDatabase) {
            // $newCustomer = new Customer([
            $newCustomer = new User([
                'google_id' => $userFromGoogle->getId(),
                'name' => $userFromGoogle->getName(),
                'email' => $userFromGoogle->getEmail(),
                'avatar' => $userFromGoogle->getAvatar(),
                'role' => 2,
            ]);

            $newCustomer->save();

            auth('web')->login($newCustomer);
            session()->regenerate();

            // dd($newCustomer);
            return redirect('/');
        }

        auth('web')->login($userFromDatabase);
        session()->regenerate();

        return redirect('/');

    }

    public function logout(Request $request)
    {
        auth('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
