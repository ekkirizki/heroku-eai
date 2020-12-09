<?php

use App\Http\Controllers\absen_controller;
use App\Http\Controllers\absensi_controller;
use App\Http\Controllers\apicontroller;
use App\Http\Controllers\gudang_controller;
use App\Http\Controllers\jadwal_controller;
use App\Http\Controllers\pengiriman_controller;
use Illuminate\Support\Facades\Route;
use App\Models\pengiriman;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/jadwal_pengiriman', [jadwal_controller::class, 'index'])->name('jadwal_pengiriman');
// Route::resource('jadwal_pengiriman', jadwal_controller::class);
// Route::get('/', [pengiriman_controller::class, 'index']);
Route::get('/tambah', function () {
    return view('insert');
})->name('tambah');
// Route::post('/tambah', [pengiriman_controller::class, 'create']);
// Route::get('/tambah', [pengiriman_controller::class, 'index']);
// Route::post('/tambah/proses', [pengiriman_controller::class, 'store']);
Route::resource('', pengiriman_controller::class)->except('edit', 'update', 'show', 'destroy');

Route::get('edit/{id}', [pengiriman_controller::class, 'edit'])->name('edit');
Route::post('update/{id}', [pengiriman_controller::class, 'update'])->name('update');
Route::get('hapus/{id}', [pengiriman_controller::class, 'hapus'])->name('hapus');

Route::resource('absen', absen_controller::class);
Route::resource('ambil_barang', gudang_controller::class);
