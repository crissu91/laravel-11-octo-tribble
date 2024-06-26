<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Register User
    public function register(Request $request)
    {
        //Validate
        $fields = $request->validate([
            "username" => ["required", "string", "max:255"],
            "email" => ["required", "email", "max:255", "unique:users"],
            "password" => ["required", "min:6", "confirmed"],
        ]);
        //Register
        $user = User::create($fields);
        //Login
        Auth::login($user);
        //Redirect
        return redirect()->route("posts.index");
    }
    //Login User
    public function login(Request $request)
    {
        //Validate
        $fields = $request->validate([
            "email" => ["required", "email", "max:255"],
            "password" => ["required"],
        ]);

        //Login

        if (Auth::attempt($fields, $request->remember)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'Credentials not valid. Try again.'
            ]);
        }
    }

    //Logout user
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('posts.index');
    }
}
