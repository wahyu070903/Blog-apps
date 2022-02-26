<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\VerificationMail;
use App\User;


class RegisterController extends Controller
{
    public function register(Request $request){
        $request = $request->validate([
            "email" => "required|email:dns",
            "password" =>"required|min:8|max:255"
        ]);

        // if validation success run this code
        $user = new User;
        $user_password = Hash::make($request["password"]);
        $token = Hash::make(time());
        $recipient_name = explode("@",$request["email"])[0];

        $user->email = $request["email"];
        $user->password = $user_password;
        $user->token = $token;
        $user->save();

        //send email
        Mail::to($request["email"])->send(new VerificationMail($recipient_name,$token));
        
        return redirect("login")->with("status","we sent verification link to your email please check it");

    }
    public function verify($code){
        $user = User::where("token",$code)->first();
        $user->is_verify = 1;
        $user->save();

        return redirect("/login")->with("status","your account succesfully activated now you can login");
    }
}
