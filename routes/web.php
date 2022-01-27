<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\BarangUserController;
use App\Http\Controllers\PembayaranController;

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

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');

Route::put('/cart/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::resource('items', BarangUserController::class);
Route::get('/checkout', [PenjualanController::class, 'checkout'])->name('penjualan.order');
Route::post('/checkout', [PenjualanController::class, 'place'])->name('penjualan.place');

Route::group(['middleware' => 'user'], function () {
    //Route::get('/penjualan',User)
});


Route::group(['middleware' => 'admin', 'prefix' => 'dashboard'], function () {

    Route::get('/', function () {
        return view('dashboard.main');
    })->name('dashboard');

    Route::resource('barang', BarangController::class);
    Route::post('barang/search', [BarangController::class, 'search'])->name('barang.search');



    Route::resource('penjualan', PenjualanController::class);

    Route::resource('users', UserController::class)->except('show');
    Route::get('users/admin', [UserController::class, 'createAdmin'])->name('admin.create');
    Route::post('users/admin', [UserController::class, 'storeAdmin'])->name('admin.store');


    Route::resource('customer', CustomerController::class);
    Route::post('customer/search', [BarangController::class, 'search'])->name('customer.search');
    Route::resource('pembayaran', PembayaranController::class);

    Route::resource('penjualan', PenjualanController::class);
});
Route::group(['middleware' => 'guest',], function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authenticate']);
    Route::get('/register', [UserController::class, 'register'])->name('register');

    Route::post('/register', [UserController::class, 'store']);
});
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
