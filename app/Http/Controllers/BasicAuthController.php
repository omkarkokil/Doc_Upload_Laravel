<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class BasicAuthController extends Controller
{
    public function loginIndex()
    {
        return view('login');
    }

    public function Login(Request $req)
    {
        try {
            $user = User::where('email', '=', $req['email'])->first();

            if ($req["username"] == "" || $req["password"] == "") {
                Alert::error("All Fileds are Mandatory", "Please fill the all the information");
                return redirect()->back();
            }

            if (!$user) {
                Alert::error("Invalid credentials", "Please fill the correct information");
                return redirect()->back();
            } else {
                $password = $user->password;
                $hash = Hash::check($req['password'], $password);
                if ($hash) {
                    $req->session()->put("username", $user);
                    Alert::success("Registred Successfully", "Welcome to home page");
                    Auth::login($user);
                    return redirect("home");
                } else {
                    Alert::error("Invalid credentials", "Please fill the correct information");
                    return redirect()->back();
                }
            }
        } catch (\Throwable $th) {
            // throw $th;
            Alert::error("error in validation", $th->getMessage());
        }
    }



    public function registerIndex()
    {
        return view('register');
    }

    public function Register(Request $req)
    {
        $getEmail = $req['email'];
        $user = User::where('email', $getEmail)->first();
        if ($user) {
            Alert::error("Failed to register", "User Already exists");
            return back();
        } else {
            $validation = $req->validate(
                [
                    "name" => "required",
                    "email" => "required|email",
                    "password" => "required|confirmed",
                    "password_confirmation" => "required",
                ]
            );

            $new_user = User::create([
                'name' => $req['name'],
                'email' => $req['email'],
                'password' => Hash::make($req['password']),

            ]);

            Alert::success("Registerd Successfully", "Welcome to home page");
            Auth::login($new_user);
            $req->session()->put("username", $new_user);
            return redirect()->intended('home');
        }

    }

    public function logout(Request $req)
    {
        $req->session()->flush();
        Auth::logout();
        Alert::success("log out successfully", "Thanks for visiting our website");
        return redirect("/");
    }
}