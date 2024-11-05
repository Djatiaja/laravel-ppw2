<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    function index()
    {
        $data = User::all();
        return view("user.index", compact("data"));
    }

    function create()
    {
        return view("user.create");
    }

    function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0|max:120',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_admin' => 'required|',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($request->has("photo")) {
            $original_name = $request->file("photo")->getClientOriginalName();
            $client_file_name = pathinfo($original_name, PATHINFO_FILENAME);
            $client_file_extention = pathinfo($original_name, PATHINFO_EXTENSION);
            $date = time();
            $file_name = $client_file_name . "_" . $date . "." . $client_file_extention;
            $path = $request->file("photo")->storeAs("user", $file_name);
            $data["photo"] = $path;
        }

        User::create([
            "email" => $data["email"],
            "name" => $data["name"],
            "age" => $data["age"],
            "Is_admin" => $data["is_admin"] == "yes" ? 1 : 0,
            "photo" => isset($data["photo"]) ? $data["photo"] : null,
            "password" => Hash::make($data["password"])
        ]);

        return redirect()->route('dashboard-user')->with("success", "Data user berhasil ditambahkan");
    }

    function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route("dashboard-user")->with("success", "user berhasil dihapus");
    }

    function update($id){
        $user = User::find($id);

        return view("user.update", compact('user'));
    }


    function save(Request $request, $id){
        $data=$request->validate([
                'name' => 'required|string|max:255',
                'age' => 'required|integer|min:0|max:120',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'is_admin' => 'required|',
                'password' => 'nullable|string|min:8|confirmed',
            ]);

        $user = User::find($id);
        if ($request->has("photo")) {
            if ($user->photo) {
                
                try {
                    if (File::exists( "storage/". $user->photo)) {
                        File::delete("storage/".$user->photo);
                    }
                } catch (\Throwable $th) {
                    return back()->withError("gagal menyimpan");
                }
            }

            $original_name = $request->file("photo")->getClientOriginalName();
            $client_file_name = pathinfo($original_name, PATHINFO_FILENAME);
            $client_file_extention = pathinfo($original_name, PATHINFO_EXTENSION);
            $date = time();
            $file_name = $client_file_name . "_" . $date . "." . $client_file_extention;
            $path = $request->file("photo")->storeAs("user", $file_name);
            $data["photo"] = $path;
        }
        $user->update([
            "name" => $data["name"],
            "age" => $data["age"],
            "Is_admin" => $data["is_admin"] == "yes" ? 1 : 0,
            "photo" => isset($data["photo"]) ? $data["photo"] : $user->photo,
            "password" =>!$data["password"] ? $user->password:(Hash::make($data["password"]))
        ]);
        $user->save();
        
        return redirect()->route("dashboard-user");
    }
}
