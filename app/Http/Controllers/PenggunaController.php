<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyUsersChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class PenggunaController extends Controller
{
    public function index(MonthlyUsersChart $chart)
    {
        return view('pengguna.index', ['chart' => $chart->build()]);
    }

    public function langganan()
    {
        return view('pengguna.langganan');
    }
    public function history()
    {
        return view('pengguna.history');
    }

    public function profilesetting()
    {
        return view('pengguna.profile');
    }

    public function settings(Request $reuqest)
    {
        $ip = '182.4.103.214';
        $data = Location::get($ip);
        dd($data);

        return view('pengguna.settings');
    }
}
