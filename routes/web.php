<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TransaksiController;


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


Route::group(['middleware' => ['guest']], function () {
    Route::get('/login',[AuthController::class, 'login'])->name('login');
    Route::get('/registrasi',[AuthController::class, 'registrasi'])->name('registrasi');
    Route::post('/post',[AuthController::class, 'post'])->name('login.post');
    Route::post('/store',[AuthController::class, 'store'])->name('registrasi.store');
});

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/barang_test',[BarangController::class, 'index_test'])->name('barang_test');

// admin
Route::group(['middleware' => ['auth', 'checkRole:Admin']], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // kategori
    Route::get('/kategori',[KategoriController::class, 'index'])->name('kategori');
    Route::get('/kategori/create',[KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store',[KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}',[KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori/update/{id}',[KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/kategori/delete/{id}',[KategoriController::class, 'delete'])->name('kategori.delete');

    // barang
    Route::get('/barang',[BarangController::class, 'index'])->name('barang');
    Route::get('/barang/create',[BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang/store',[BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/edit/{id}',[BarangController::class, 'edit'])->name('barang.edit');
    Route::post('/barang/update/{id}',[BarangController::class, 'update'])->name('barang.update');
    Route::get('/barang/delete/{id}',[BarangController::class, 'delete'])->name('barang.delete');

    //view
    Route::get('/view_barang',[BarangController::class, 'view_barang'])->name('view_barang');

    //transaksi
    Route::get('/transaksi',[TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/buy/{id}',[TransaksiController::class, 'buy'])->name('buy.barang');

    //pengguna
    Route::get('/pengguna/edit/{id}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::get('/pengguna/index', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::post('/pengguna/update/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::get('/pengguna/delete/{id}', [PenggunaController::class, 'delete'])->name('pengguna.delete');

});


//ROlE USER
Route::group(['middleware' => ['auth', 'checkRole:Admin,User']], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/view_barang',[BarangController::class, 'view_barang'])->name('view_barang');

    //transaksi
    Route::get('/transaksi',[TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/buy/{id}',[TransaksiController::class, 'buy'])->name('buy.barang');
});


