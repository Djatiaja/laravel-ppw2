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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            "age"=>['required', "between:0,120"]
        ]);

        $data["password"] =Hash::make($data["password"]);


        if ($request->has("photo")) {
            $original_name = $request->file("photo")->getClientOriginalName();
            $client_file_name = pathinfo($original_name, PATHINFO_FILENAME);
            $client_file_extention = pathinfo($original_name, PATHINFO_EXTENSION);
            $date = time();
            $file_name = $client_file_name . "_" . $date . "." . $client_file_extention;
            $path = $request->file("photo")->storeAs("user", $file_name);
            $data["photo"] = $path;
        }

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
