<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\book;
use Illuminate\Http\Request;

class bukuApiController extends Controller
{
    function index()
    {
        $buku = book::all();
        return response()->json(["data"=>BookResource::collection($buku)], 200);
    }
    function store(Request $request)
    {
        $buku = book::create($request->all());

        return new BookResource($buku);
    }


}



