<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/pengguna/', [PenggunaController::class, 'index']);
    Route::get('/pengguna/paket', [PenggunaController::class, 'paket']);
    Route::get('/logout', [PenggunaController::class, 'logout']);
    Route::get('/profilesetting', [PenggunaController::class, 'profilesetting']);
});
