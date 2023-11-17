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
        return view('pengguna.langganan');
    }
    public function history()
    {
        return view('pengguna.history');
    }

    public function profilesetting()
    {
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        // $result = User::find($id);
        // dd($result);
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
                return redirect('/pengguna/')->with('success_update', 'Profile Berhasil Diupdate');
            } else {
                return redirect('/pengguna/profilesetting')->with('error_update', 'Error Dalam Input Data');

            }
        } else {
            return redirect('/pengguna/profilesetting')->with('error_update', 'User Not Found');

        }

    }
}
