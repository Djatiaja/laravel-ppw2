<?php

use App\Http\Controllers\api\bukuApiController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/about', function () {
    return view('about');
});

Route::get('/galeri', [PostController::class, "galeri"])->name("galeri");
Route::get('/galeri/create', [PostController::class, "create"])->name("post.create");
Route::post('/galeri/create/store', [PostController::class, "store"])->name("post.store");
Route::get('/galeri/update/{id}', [PostController::class, "update"])->name("post.update");
Route::put('/galeri/update/save/{id}', [PostController::class, "save"])->name("post.save");
Route::delete('/galeri/delete/{id}', [PostController::class, "delete"])->name("post.delete");

Route::controller(EmailController::class)->prefix("dashboard-email")->group(function(){
    Route::get("/", "index")->name("dashboard-email");
    Route::get("/create", "create")->name("dashboard-email.create");
    Route::post("/send", "send")->name("dashboard-email.send");
});




Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login/verify', 'verify')->name('login.verify');
    Route::get('/register', 'register')->name('register');
    Route::post('/register/store', 'store')->name('register.store');
});

Route::controller(UserController::class)->middleware(['auth', "is_Admin"])->prefix("/dashboard-user")->group(function(){
    Route::get("/", "index")->name("dashboard-user");
    Route::get("/create", "create")->name("dashboard-user.create");
    Route::post("/store", "store")->name("dashboard-user.store");
    Route::delete("/delete/{id}", "delete")->name("dashboard-user.delete");
    Route::get("/update/{id}", "update")->name("dashboard-user.update");
    Route::post("/update/{id}", "save")->name("dashboard-user.save");
});


Route::middleware(['auth', "is_Admin"])->group(function () {
    Route::get('/dashboard', [bukuController::class, 'index'])->name('dashboard')->middleware("is_Admin");
    Route::get('/buku/tambah', [bukuController::class, 'create']);
    Route::post('/buku/tambah', [bukuController::class, 'store'])->name('buku.store');
    Route::get("buku/update/{id}", [bukuController::class, 'update']);
    Route::post("buku/update/{id}", [bukuController::class, 'save'])->name('buku.update');
    Route::delete("buku/delete/{id}", [bukuController::class, 'delete'])->name('buku.delete');
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});



