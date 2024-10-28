<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class bukuController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

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
        $buku = new book();
        $buku ->judul = $request->input('judul');
        $buku ->penulis = $request->input('penulis');
        $buku ->harga = $request->input('harga');
        $buku ->tanggal_terbit = $request->input('tanggal_terbit');
        $buku->save();
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
        $buku = book::find($id);
        $buku ->judul = $request->input('judul');
        $buku ->penulis = $request->input('penulis');
        $buku ->harga = $request->input('harga');
        $buku ->tanggal_terbit = $request->input('tanggal_terbit');
        $buku->save();
        
        return redirect('/dashboard');
    }
}


