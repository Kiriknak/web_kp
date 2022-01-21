<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('home', ['title' => "Home"]);
});

Route::get('/about', function () {
    return view('about', ['title' => "About"]);
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::post('/register', [RegisterController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'admin', 'prefix' => 'dashboard'], function () {
    Route::get('/barang', [BarangController::class, 'index'])->name('dashboard.barang');

    Route::get('/barang/add', function () {
        return view('dashboard.barang.add');
    })->name('dashboard.barang.add');
    Route::get('/', function () {
        return view('dashboard.main');
    })->name('dashboard');


    Route::post('/barang/add', [BarangController::class, 'store'])->name('barang.add');
    Route::post('/barang', [BarangController::class, 'search']);
    Route::get('/barang/{id}', [BarangController::class, 'edit']);

    Route::post('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');

    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
});

Route::resource('Barang', BarangController::class); // Laravel 8
