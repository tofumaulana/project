<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});
Route::get('/roles', function () {
    return view('roles.index');
});
Route::get('/dashboard', function () {
    return view('dashboard.home');
});
Route::get('/users', function () {
    return view('users.index');
});
Route::get('/kategori', function () {
    return view('kategori.index');
});
Route::get('/create', function () {
    return view('create.create');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');


    Route::get('logout', 'logout')->middleware('auth')->name('logout');

});

Route::middleware(['auth', 'user-access:user'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function(){
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');

    Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin/kategori');

    Route::get('/admin/create/create', [KategoriController::class, 'create'])->name('admin/create/create');

});
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori/index');
Route::post('/admin/kategori/store', [KategoriController::class, 'store'])->name('admin/kategori/store');
Route::get('/admin/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('admin/kategori/edit');
Route::put('/admin/kategori/edit/{id}', [KategoriController::class, 'update'])->name('admin/kategori/update');
Route::delete('/admin/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('admin/kategori/destroy');











