<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PengambilController;
use App\Http\Controllers\BankSampahController;
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
Route::get('/logout', [LoginController::class, 'logout']);


// Pengguna Controller
Route::middleware('cekrole:pengguna')->group(function () {
    Route::get('/pengguna/', [PenggunaController::class, 'index']);
    Route::get('/pengguna/langganan', [PenggunaController::class, 'langganan']);
    Route::get('/pengguna/history', [PenggunaController::class, 'history']);
    Route::get('/pengguna/profilesetting', [PenggunaController::class, 'profilesetting']);
    Route::get('/pengguna/settings', [PenggunaController::class, 'settings']);
});

Route::middleware('cekrole:banksampah')->group(function(){
    Route::get('/banksampah/', [BankSampahController::class, 'index']);
    Route::get('/banksampah/datapembuangan', [BankSampahController::class, 'dataPembuangan']);
});

Route::middleware('cekrole:pengambil')->group(function(){
    Route::get('/pengambil/', [PengambilController::class, 'index']);
});