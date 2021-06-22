<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriartikelController;

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

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});



// produk
Route::get('/admin/produk', [ProdukController::class, 'index']);
Route::post('/admin/produk', [ProdukController::class, 'store']);
Route::get('/admin/produk/detail/{produk}', [ProdukController::class, 'show']);
Route::get('/admin/produk/delete/{produk}', [ProdukController::class, 'destroy']);
Route::get('/admin/produk/ubah/{produk}', [ProdukController::class, 'edit']);
Route::put('/admin/produk/ubah/{produk}', [ProdukController::class, 'update']);


// Kategori produk
Route::get('/admin/kategori-produk', [KategoriController::class, 'index']);
Route::post('/admin/kategori-produk', [KategoriController::class, 'store']);
Route::get('/admin/kategori-produk/delete/{kategori}', [KategoriController::class, 'destroy']);


// pelanggan
Route::get('/admin/pelanggan', [PelangganController::class, 'index']);
Route::post('/admin/pelanggan/tambah', [PelangganController::class, 'store']);
Route::get('/admin/pelanggan/delete/{pelanggan}', [PelangganController::class, 'destroy']);



// Artikel
Route::get('/admin/artikel', [ArtikelController::class, 'index']);
Route::post('/admin/artikel', [ArtikelController::class, 'store']);
Route::get('/admin/artikel/delete/{artikel}', [ArtikelController::class, 'destroy']);


// Kategori artikel
Route::get('/admin/kategori-artikel', [KategoriartikelController::class, 'index']);
Route::post('/admin/kategori-artikel', [KategoriartikelController::class, 'store']);
Route::post('/admin/kategori-artikel/tambah', [KategoriartikelController::class, 'create']);
Route::get('/admin/kategori-artikel/delete/{kategoriartikel}', [KategoriartikelController::class, 'destroy']);
Route::get('/admin/kategori-artikel/{kategoriartikel}', [KategoriartikelController::class, 'show']);