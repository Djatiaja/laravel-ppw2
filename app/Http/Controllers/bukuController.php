<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class bukuController extends Controller
{
    function index(){
        $data = buku::orderByDesc('judul')->get();
        $jumlah_data = buku::count();
        $total_harga = buku::sum("harga");
        return view("buku.index", compact("data", "jumlah_data", "total_harga"));
    }

    function create(){
        return view('buku.create');
    }

    function store(Request $request)  {
        $buku = new buku();
        $buku ->judul = $request->input('judul');
        $buku ->penulis = $request->input('penulis');
        $buku ->harga = $request->input('harga');
        $buku ->tanggal_terbit = $request->input('tanggal_terbit');
        $buku->save();
        
        return redirect('/buku');
    }

    function delete($id){
        $buku = buku::find($id);
        if($buku !== null){
            $buku->delete();
        }
        return redirect('/buku');
    }

    function update($id){
        $buku = buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    function save(Request $request, $id){
        $buku = buku::find($id);
        $buku ->judul = $request->input('judul');
        $buku ->penulis = $request->input('penulis');
        $buku ->harga = $request->input('harga');
        $buku ->tanggal_terbit = $request->input('tanggal_terbit');
        $buku->save();
        
        return redirect('/buku');
    }
}


