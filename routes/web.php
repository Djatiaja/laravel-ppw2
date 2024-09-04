<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function(){
    return view("login");
});
Route::get('/about',function (){
    return view('about');
});
Route::get('/contact', function(){
    return view('contact',[
        "nama"=> "damar",
        "email"=> "damar@gmail.com"
    ]);
});

Route::get('/post', [PostController::class, 'index']);
Route::get('/user', [userController::class, 'index']);
