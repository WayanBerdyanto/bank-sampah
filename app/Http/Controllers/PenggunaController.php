<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Charts\MonthlyUsersChart;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function index(MonthlyUsersChart $chart){
        return view('pengguna.index', ['chart' => $chart->build()]);
    }

    public function paket(){
        return view('pengguna.paket');
    }

    public function logout(){
        Auth::logout();
        return view('guest.login');
    }
}
