<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class bukuController extends Controller
{


    function index(){
        $data = book::orderByDesc('judul')->get();
        $jumlah_data = book::count();
        $total_harga = book::sum("harga");
        return view("buku.index", compact("data", "jumlah_data", "total_harga"));
    }

    function create(){
        return view('buku.create');
    }

    function store(Request $request)  {
        $data = $request->validate([
            "judul"=>["required", "max:60"],
            "penulis"=>["required", "max:60"],
            "harga"=>["required", "numeric"],
            "tanggal_terbit"=>["required", "date"],
            "sampul_buku"=>["nullable", "image"]
        ]);

        if($request->has("sampul_buku")){
            $original_name = $request->file("sampul_buku")->getClientOriginalName();
            $client_file_name = pathinfo($original_name, PATHINFO_FILENAME);
            $client_file_extention = pathinfo($original_name, PATHINFO_EXTENSION);
            $date = time();
            $file_name = $client_file_name. "_" . $date .".". $client_file_extention;
            $path=$request->file("sampul_buku")->storeAs("buku", $file_name);
            $data["sampul_buku"]= $path;
        }
        book::create([
            "judul"=>$data["judul"],
            "penulis"=>$data["penulis"],
            "harga"=>$data["harga"],
            "tanggal_terbit"=>$data["tanggal_terbit"],
            "sampul_buku"=> isset($data["sampul_buku"]) ? $data["sampul_buku"] : null,
        ]);


        return redirect('/dashboard');
    }

    function delete($id){
        $buku = book::find($id);
        if($buku !== null){
            $buku->delete();
        }
        return redirect('/dashboard');
    }

    function update($id){
        $buku = book::find($id);
        return view('buku.edit', compact('buku'));
    }

    function save(Request $request, $id){
        $data = $request->validate([
            "judul" => ["required", "max:60"],
            "penulis" => ["required", "max:60"],
            "harga" => ["required", "numeric"],
            "tanggal_terbit" => ["required", "date"],
            "sampul_buku" => ["nullable", "image"]
        ]);
        $buku = book::find($id);

        if ($request->has("sampul_buku")) {

            if($buku->sampul_buku){
                try {
                    if (File::exists("storage/".$buku->sampul_buku)) {
                        File::delete("storage/" . $buku->sampul_buku);
                    }
                } catch (\Throwable $th) {
                    return back()->withError("gagal menyimpan");
                }
            }

            $original_name = $request->file("sampul_buku")->getClientOriginalName();
            $client_file_name = pathinfo($original_name, PATHINFO_FILENAME);
            $client_file_extention = pathinfo($original_name, PATHINFO_EXTENSION);
            $date = time();
            $file_name = $client_file_name . "_" . $date . "." . $client_file_extention;
            $path = $request->file("sampul_buku")->storeAs("buku", $file_name);
            $data["sampul_buku"] = $path;
        }

        $buku->update($data);
        $buku->save();
        
        return redirect('/dashboard');
    }
}


