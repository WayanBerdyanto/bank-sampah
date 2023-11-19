<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function index()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        return view('pengguna.index', ['user' => $user, 'username' => $username]);
    }
    
    public function logout()
    {
        Auth::logout();
        return view('guest.login');
    }

    public function langganan()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        return view('pengguna.langganan', ['user'=>$user]);
    }
    public function history()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        return view('pengguna.history', ['user'=>$user]);
    }

    public function profilesetting()
    {
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        return view('pengguna.profile', ['result' => $result]);
    }

    public function postProfile($id, Request $request)
    {
        $user = User::find($id);
        if ($user) {
            $user->username = $request->username;
            $user->email = $request->email;
            $user->nama_lengkap = $request->namalengkap;
            $user->provinsi = $request->provinsi;
            $user->kabupaten = $request->kabupaten;
            $user->kecamatan = $request->kecamatan;
            $user->kelurahan = $request->kelurahan;
            $user->no_telpon = $request->no_telpon;
            $user->latitude = $request->latitudeInput;
            $user->longitude = $request->longitudeInput;

            if ($user->save()) {
                return redirect('/pengguna/');
            } else {
                return redirect('/pengguna/profilesetting')->with('error', 'Error Dalam Input Data');

            }
        } else {
            return redirect('/pengguna/profilesetting')->with('error', 'User Not Found');

        }

    }
}
