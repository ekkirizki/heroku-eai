<?php

use App\Http\Controllers\jadwal_controller;
use App\Http\Controllers\Jadwal_Pengiriman_Controller;
use App\Http\Controllers\pengiriman;
use App\Http\Controllers\pengiriman_controller;
use Illuminate\Support\Facades\Route;

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


Route::get('/jadwal_pengiriman', [jadwal_controller::class, 'index']);
Route::get('/', [pengiriman_controller::class, 'index']);
Route::get('/tambah', function () {
    return view('insert');
});
