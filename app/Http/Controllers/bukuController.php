<?php

namespace App\Http\Controllers;

use App\Models\buku;

class bukuController extends Controller
{
    function index(){
        $data = buku::all()->sortBy("judul", SORT_DESC);
        $jumlah_data = buku::count();
        $total_harga = buku::sum("harga");
        return view("buku", compact("data", "jumlah_data", "total_harga"));
    }
}
