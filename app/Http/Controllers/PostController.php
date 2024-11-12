<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    function galeri()
    {
        $data = Post::all();
        return view("post.galeri", compact('data'));
    }

    function create(){
        return view("post.create");
    }

    function store(Request $request)
    {
        $data = $request->validate([
            "judul" => ["required", "max:60"],
            "deskripsi" => ["nullable", "max:60"],
            "gambar" => ["nullable", "image"]
        ]);

        if ($request->has("gambar")) {
            $original_name = $request->file("gambar")->getClientOriginalName();
            $client_file_name = pathinfo($original_name, PATHINFO_FILENAME);
            $client_file_extention = pathinfo($original_name, PATHINFO_EXTENSION);
            $date = time();
            $file_name = $client_file_name . "_" . $date . "." . $client_file_extention;
            $path = $request->file("gambar")->storeAs("post", $file_name);
            $data["gambar"] = $path;
        }
        Post::create($data);


        return redirect()->route("galeri");
    }

    function delete($id)
    {
        $post = Post::find($id);
        if ($post !== null) {
            try {
                if (File::exists("storage/" . $post->gambar)) {
                    File::delete("storage/" . $post->gambar);
                }
            } catch (\Throwable $th) {
                return back()->withError("gagal menyimpan");
            }

            $post->delete();
        }
        return redirect('/galeri');
    }

    function update($id)
    {
        $post = Post::find($id);
        return view('post.update', compact('post'));
    }

    function save(Request $request, $id)
    {
        $data = $request->validate([
            "judul" => ["required", "max:60"],
            "deskripsi" => ["nullable", "max:60"],
            "gambar" => ["nullable", "image"]
        ]);

        $post = Post::find($id);

        if ($request->has("gambar")) {

            if ($post->gambar) {
                try {
                    if (File::exists("storage/" . $post->gambar)) {
                        File::delete("storage/" . $post->gambar);
                    }
                } catch (\Throwable $th) {
                    return back()->withError("gagal menyimpan");
                }
            }

            $original_name = $request->file("gambar")->getClientOriginalName();
            $client_file_name = pathinfo($original_name, PATHINFO_FILENAME);
            $client_file_extention = pathinfo($original_name, PATHINFO_EXTENSION);
            $date = time();
            $file_name = $client_file_name . "_" . $date . "." . $client_file_extention;
            $path = $request->file("gambar")->storeAs("post", $file_name);
            $data["gambar"] = $path;
        }

        $post->update($data);
        $post->save();

        return redirect('/galeri');
    }


}
