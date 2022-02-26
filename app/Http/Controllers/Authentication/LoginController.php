<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        $request->validate([
            "email" => "required|email:dns",
            "password" => "required"
        ]);

        if(Auth::attempt(["email" => $request["email"], "password" =>$request["password"], "is_verify" => 1], 1)){
            $request->session()->regenerate();
            return redirect()->intended("/");
        }

        return redirect("/login")->with("status","Your account not registered");
    }
}
