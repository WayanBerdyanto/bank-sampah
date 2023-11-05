<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Charts\MonthlyUsersChart;

class PenggunaController extends Controller
{
    public function index(MonthlyUsersChart $chart){
        return view('pengguna.index', ['chart' => $chart->build()]);
    }
}
