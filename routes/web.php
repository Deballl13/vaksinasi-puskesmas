<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\VaksinasiController;
use App\Http\Controllers\VaksinController;
use App\Models\Vaksinasi;
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

Auth::routes(['register' => true, 'reset' => false]);

Route::middleware(['auth', 'revalidate'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
    Route::get('/pendaftaran/d/{nik}', [PendaftaranController::class, 'detail'])->name('pendaftaran.detail');
    Route::get('/vaksinasi', [VaksinasiController::class, 'index'])->name('vaksinasi');
    Route::get('/vaksinasi/d/{nik}', [VaksinasiController::class, 'detail'])->name('vaksinasi.detail');
    Route::get('/vaksinasi/e/{nik}', [VaksinasiController::class, 'edit'])->name('vaksinasi.edit');
    Route::get('/vaksinasi/t', [VaksinasiController::class, 'tambah'])->name('vaksinasi.tambah');
    Route::get('/vaksin', [VaksinController::class, 'index'])->name('vaksin');
    Route::get('/vaksin/d', [VaksinController::class, 'detail'])->name('vaksin.detail');
    Route::get('/vaksin/t', [VaksinController::class, 'tambah_jenis'])->name('vaksin.tambah');
    Route::get('/vaksin/t/stok', [VaksinController::class, 'tambah_stok'])->name('vaksin.tambah.stok');

    // tambah data
    Route::post('/vaksinasi/daftar', [PendaftaranController::class, 'store_daftar'])->name('pendaftaran.store.daftar');
    Route::post('/vaksin/jenis', [VaksinController::class, 'store_jenis'])->name('vaksin.store.jenis');
    Route::post('/vaksin/stok', [VaksinController::class, 'store_stok'])->name('vaksin.store.stok');

    // update data
    Route::put('/vaksinasi/pasien', [VaksinasiController::class, 'update_pasien'])->name('vaksinasi.update.pasien');
    Route::put('/vaksinasi/status/{nik}', [PendaftaranController::class, 'update_status'])->name('vaksinasi.update.status');

    // hapus data
    Route::delete('/vaksinasi', [VaksinasiController::class, 'delete_pasien'])->name('vaksinasi.delete.pasien');
});
