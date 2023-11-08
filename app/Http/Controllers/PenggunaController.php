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

    public function langganan(){
        return view('pengguna.langganan');
    }
    public function history(){
        return view('pengguna.history');
    }

    public function logout(){
        Auth::logout();
        return view('guest.login');
    }

    public function profilesetting() {
        return view('pengguna.profile');
    }
}
