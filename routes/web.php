<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\GuestController;
use App\Http\Controllers\PenggunaController;
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

// Halaman Pengujung Controller
Route::get('pengguna/', [PenggunaController::class, 'index']);

