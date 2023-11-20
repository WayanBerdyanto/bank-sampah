<?php

use App\Http\Controllers\BankSampahController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengambilController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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
// HALAMAN GUEST Controller
Route::get('/', [GuestController::class, 'index']);
Route::get('/login', [GuestController::class, 'login']);
Route::get('/register', [GuestController::class, 'register']);
// END HALAMAN GUEST Controller

// Register Controller
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/postRegister', [RegisterController::class, 'postRegister']);

// Login Controller
Route::get('/login', [LoginController::class, 'login']);
Route::post('/loginpengguna', [LoginController::class, 'loginPengguna']);

// Pengguna Controller
Route::middleware('cekrole:pengguna')->group(function () {
    Route::get('/pengguna/', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/pengguna/langganan', [PenggunaController::class, 'langganan']);
    Route::get('/pengguna/history', [PenggunaController::class, 'history']);
    Route::get('/pengguna/profilesetting', [PenggunaController::class, 'profilesetting']);
    Route::put('/pengguna/postprofile/{id}', [PenggunaController::class, 'postProfile']);
    Route::get('/pengguna/logout', [PenggunaController::class, 'logout']);
    Route::get('/pengguna/ubahpassword', [PenggunaController::class, 'ubahpassword']);
    Route::post('/pengguna/postubahpassword', [PenggunaController::class, 'postubahpassword']);

});

Route::middleware('cekrole:banksampah')->group(function () {
    Route::get('/banksampah/', [BankSampahController::class, 'index']);
    Route::get('/banksampah/datapembuangan', [BankSampahController::class, 'dataPembuangan']);
});

Route::middleware('cekrole:pengambil')->group(function () {
    Route::get('/pengambil/', [PengambilController::class, 'index']);
});
