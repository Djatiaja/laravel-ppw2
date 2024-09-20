<?php

use App\Http\Controllers\blogController;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\userController;
use App\Models\blog;
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

Route::get('/blogs',[blogController::class, 'index']);

Route::get('/buku', [bukuController::class, 'index']);

Route::get('/buku/tambah', [bukuController::class, 'create']);

Route::post('/buku/tambah', [bukuController::class, 'store'])->name('buku.store');

Route::get("buku/update/{id}", [bukuController::class, 'update']);

Route::post("buku/update/{id}", [bukuController::class, 'save'])->name('buku.update');

Route::delete("buku/delete/{id}", [bukuController::class, 'delete'])->name('buku.delete');
    