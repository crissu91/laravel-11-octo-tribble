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
        return redirect()->route("home");
    }
}
