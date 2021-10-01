<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\VaksinasiController;

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


Auth::routes(['register' => false, 'reset' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
Route::get('/pendaftaran/detail', [PendaftaranController::class, 'detail'])->name('pendaftaran.detail');
Route::get('/vaksinasi', [VaksinasiController::class, 'index'])->name('vaksinasi');
Route::get('/vaksin', [VaksinasiController::class, 'vaksin'])->name('vaksin');