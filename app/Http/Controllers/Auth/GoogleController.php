<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function googlePage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallBack()
    {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('email', $user->email)->first();
        if (!$finduser) {
            return redirect()->route('login')->with('error', __('The email is not correct'));
        }
        Auth::login($finduser);
        return redirect()->route('dashboard');
    }
}
