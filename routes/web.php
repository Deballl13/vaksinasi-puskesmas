<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\VaksinasiController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/daftar', [PendaftaranController::class, 'daftar'])->name('daftar');
Route::post('/u/daftar', [PendaftaranController::class, 'user_daftar'])->name('user.daftar');

Auth::routes(['register' => false, 'reset' => false]);

Route::middleware(['auth', 'revalidate'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
    Route::get('/pendaftaran/d/{nik}', [PendaftaranController::class, 'detail'])->name('pendaftaran.detail');
    Route::get('/vaksinasi', [VaksinasiController::class, 'index'])->name('vaksinasi');
    Route::get('/vaksinasi/d/{nik}', [VaksinasiController::class, 'detail'])->name('vaksinasi.detail');
    Route::get('/vaksinasi/e/{nik}', [VaksinasiController::class, 'edit'])->name('vaksinasi.edit');
    Route::get('/vaksinasi/t', [VaksinasiController::class, 'tambah'])->name('vaksinasi.tambah');
    Route::get('/vaksin', [VaksinasiController::class, 'vaksin'])->name('vaksin');
    Route::get('/vaksin/d', [VaksinasiController::class, 'detail_vaksin'])->name('vaksin.detail');
    Route::get('/vaksin/t', [VaksinasiController::class, 'tambah_vaksin'])->name('vaksin.tambah');
    Route::post('/vaksin/store', [VaksinasiController::class, 'store_vaksin'])->name('vaksin.store');
    Route::get('/vaksin/td', [VaksinasiController::class, 'tambah_stok_vaksin'])->name('vaksin.tambahd');
    Route::post('/vaksin/store_stok', [VaksinasiController::class, 'store_stok_vaksin'])->name('vaksin.store_stok');


    Route::post('/vaksinasi/t/daftar', [PendaftaranController::class, 'store_daftar'])->name('pendaftaran.tambah');
    Route::put('/vaksinasi/e/pasien', [VaksinasiController::class, 'update_pasien'])->name('vaksinasi.edit.pasien');
});
