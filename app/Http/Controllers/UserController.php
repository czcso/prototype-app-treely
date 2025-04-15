<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_register(Request $request) {
        $incomingFields = $request->validate([
            "register_name" => ["required", "min:3", "max:32"],
            "register_email" => ["required", "email"],
            "register_password" => ["required", "min:3", "max:64"]
        ]);

        $user = [
            "name" => $incomingFields["register_name"],
            "email" => $incomingFields["register_email"],
            "password" => bcrypt($incomingFields["register_password"])
        ];

        $user = User::create($user);
        auth()->guard('web')->login($user);
        return redirect('/');
    }

    public function user_login(Request $request) {
        $incomingFields = $request->validate([
            "login_name" => ["required", "min:3", "max:32"],
            "login_password" => ["required", "min:3", "max:64"]
        ]);

        if(auth()->guard('web')->attempt(["name" => $incomingFields["login_name"], "password" => $incomingFields["login_password"]])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function user_logout() {
        auth()->guard('web')->logout();
        return redirect('/');
    }
}

