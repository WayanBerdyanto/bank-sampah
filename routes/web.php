<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\GuestController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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
Route::post('/loginPengguna', [LoginController::class, 'loginPengguna']);
Route::get('/pengguna/index', [LoginController::class, 'dashBoardPengguna']);




