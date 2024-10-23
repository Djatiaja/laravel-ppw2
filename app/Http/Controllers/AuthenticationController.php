<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    function login()
    {
        return view('auth.login');
    }
    function register()
    {
        return view('auth.register');
    }

    function verify(Request $request)
    {
        $data = $request->validate([
            "email" => ['email', 'required', 'exists:App\Models\User,email'],
            "password" => ["required", "min:8"]
        ]);

        if(Auth::attempt(['email'=>$data["email"], "password"=>$data["password"]], $request->remember?true:false)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->withErrors("credential salah");
    }   

    function store(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "unique:users"],
            "name" => ['required'],
            "password" => ["required", "confirmed", "min:8"],
            "age"=>['required', "between:0,120"]
        ]);

        $data["password"] =Hash::make($data["password"]);   

        User::create($data);

        return redirect('/login');
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('login');
    }
}
