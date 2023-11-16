<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyUsersChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use App\Models\User;

class PenggunaController extends Controller
{
    public function index()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        return view('pengguna.index', ['user'=>$user, 'username'=>$username]);
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
        $username = Auth::User()->username ?? '';
        $result = User::where('username' , $username)->first();
        // $result = User::find($id);
        // dd($result);
        return view('pengguna.profile', ['result'=>$result]);
    }

    public function settings(Request $reuqest)
    {
        $ip = '182.4.103.214';
        $data = Location::get($ip);
        dd($data);

        return view('pengguna.settings');
    }
}
