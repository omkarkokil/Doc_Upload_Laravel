<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Laravel\Socialite\Facades\Socialite;
use Session;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(Request $request)
    {
        try {
            $google_user = Socialite::driver('google');

            $user = User::where('google_id', $google_user->user()->getId())->first();

            if (!$user) {
                $new_user = User::create([
                    'name' => $google_user->user()->getName(),
                    'email' => $google_user->user()->getEmail(),
                    'google_id' => $google_user->user()->getId()
                ]);
                session()->put("username", $new_user);
                Auth::login($new_user);
                return redirect()->intended('home');
            } else {
                session()->put("username", $user);
                Auth::login($user);
                return redirect()->intended('home');
            }
        } catch (\Throwable $th) {
            dd("Error " . $th->getMessage());
        }
    }

    public function home()
    {
        echo "hii";
        $google_user = Socialite::driver('google')->user();
        echo "<pre>";
        print_r($google_user);
    }
}