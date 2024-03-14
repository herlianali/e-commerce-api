<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect() 
    {
        return Socialite::driver('google')->redirect();
    } 

    public function callback()
    {
        $userFromGoogle = Socialite::driver('google')->user();

        $userFromDatabase = Customer::where('id', $userFromGoogle->getId())->first();

        if(!$userFromDatabase) {
            $newCustomer = new Customer([
                'id' => $userFromGoogle->getId(),
                // 'name' => ,
                // 'email' => ,
            ]);
        }
    }
}
