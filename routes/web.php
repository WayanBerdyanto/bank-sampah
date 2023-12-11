<?php

use App\Http\Controllers\BankSampahController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengambilController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenggunaLanggananController;
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

Route::get('/carbon', [PenggunaController::class, 'carbon']);

// Pengguna Controller
Route::middleware('cekrole:pengguna')->group(function () {
    Route::get('/pengguna/', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/pengguna/langganan', [PenggunaController::class, 'langganan']);
    Route::get('/pengguna/transaksi', [PenggunaController::class, 'transaksi']);
    Route::get('/pengguna/profilesetting', [PenggunaController::class, 'profilesetting']);
    Route::put('/pengguna/postprofile/{id}', [PenggunaController::class, 'postProfile']);
    Route::get('/pengguna/logout', [PenggunaController::class, 'logout']);
    Route::get('/pengguna/ubahpassword', [PenggunaController::class, 'ubahpassword']);
    Route::post('/pengguna/postubahpassword', [PenggunaController::class, 'postubahpassword']);
    Route::get('/pengguna/buangsampah', [PenggunaController::class, 'buangsampah']);
    Route::get('/pengguna/transaksi/pembayaran', [PenggunaController::class, 'pembayaran']);
    // Route::get('/pengguna/buanglangganan', [PenggunaController::class, 'buanglangganan']);
    Route::post('/pengguna/postbuangsampah', [PenggunaController::class, 'postbuangsampah']);
    Route::get('/pengguna/detailbuangsampah/{id}', [PenggunaController::class, 'detailbuangsampah']);
    Route::get('/pengguna/hapusmasterbuang/{id}', [PenggunaController::class, 'hapusmasterbuang']);

    Route::put('pengguna/bayar/{id}', [PenggunaController::class, 'bayar']);

    Route::get('/pengguna/transaksi/{type}', [PenggunaController::class, 'invoice']);

    Route::get('/pengguna/profile/{type}', [PenggunaController::class, 'invoiceprofile']);
    Route::get('/pengguna/profile/cetak-profile', [PenggunaController::class, 'cetakprofile']);

    // SYSTEM LANGGANAN
    Route::get('/pengguna/langganan/{type}', [PenggunaController::class, 'order']);
    Route::post('/pengguna/langganan/checkout', [PenggunaController::class, 'checkout']);
    Route::post('/pengguna/langganan/postCheckout', [PenggunaController::class, 'postCheckout']);

    Route::get('/pengguna/buanglangganan',[PenggunaLanggananController::class,'buanglangganan']);
    Route::post('/pengguna/postbuanglangganan',[PenggunaLanggananController::class,'postbuanglangganan']);
    Route::get('/penggunalangganan/', [PenggunaLanggananController::class, 'index'])->name('pengguna.indexlangganan');

});

Route::middleware('cekrole:banksampah')->group(function () {
    Route::get('/banksampah/', [BankSampahController::class, 'index']);
    Route::get('/banksampah/datapembuangan', [BankSampahController::class, 'dataPembuangan']);
    Route::get('/banksampah/datapenerimaan', [BankSampahController::class, 'dataPenerimaan']);
    Route::get('/banksampah/detailpenerimaan/{id}', [BankSampahController::class, 'detailPenerimaan']);
    Route::get('/banksampah/hapusterima/{id}', [BankSampahController::class, 'hapusterima']);
    
    Route::get('/banksampah/profilebank', [BankSampahController::class, 'profilebank']);
    Route::put('/banksampah/postprofile/{id}', [BankSampahController::class, 'postProfile']);
    Route::get('/banksampah/ubahpassword', [BankSampahController::class, 'ubahpassword']);
    Route::post('/banksampah/postubahpassword', [BankSampahController::class, 'postubahpassword']);
    Route::get('/banksampah/logout', [BankSampahController::class, 'logout']);

    Route::put('/banksampah/terimasampah/{id}',[BanksampahController::class,'terimasampah']);
});

Route::middleware('cekrole:pengambil')->group(function () {
    Route::get('/pengambil/', [PengambilController::class, 'index']);
    Route::get('/pengambil/profilepengambil', [PengambilController::class, 'profilepengambil']);
    Route::put('/pengambil/postprofile/{id}', [PengambilController::class, 'postProfile']);
    Route::get('/pengambil/ubahpassword', [PengambilController::class, 'ubahpassword']);
    Route::post('/pengambil/postubahpassword', [PengambilController::class, 'postubahpassword']);
    Route::get('/pengambil/logout', [PengambilController::class, 'logout']);
    Route::get('/pengambil/penerimaan', [PengambilController::class,'penerimaan']);
});
