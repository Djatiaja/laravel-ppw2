<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class blogController extends Controller
{
    function index(){
        $data = blog::all();
        return view('blog',['blogs' => $data]);
    }
}
