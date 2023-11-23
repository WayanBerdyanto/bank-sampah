<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Charts\PieChartSampah;
use App\Charts\LineChartPengguna;

class PenggunaController extends Controller
{
    public function index(PieChartSampah $chart, LineChartPengguna $linechart)
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        return view('pengguna.index', ['user' => $user, 'username' => $username], ['chart' => $chart->build(), 'linechart' => $linechart->build(), 'key'=>'index']);
    }

    public function logout()
    {
        Auth::logout();
        return view('guest.login');
    }

    public function langganan()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        return view('pengguna.langganan', ['user' => $user, 'key'=>'langganan']);
    }
    public function transaksi()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        return view('pengguna.transaksi', ['user' => $user, 'key'=>'transaksi']);
    }

    public function profilesetting()
    {
        $username = Auth::User()->username ?? '';
        $user = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        return view('pengguna.profile', ['result' => $result, 'key'=>'profilesettings', 'user'=>$user]);
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
                return redirect('/pengguna/')->with('success', 'Profile Berhasil Di Ubah');
            } else {
                return redirect('/pengguna/profilesetting')->with('errors', $validator->messages()->all()[0])->withInput();

            }
        } else {
            return redirect('/pengguna/profilesetting')->with('error', 'User Not Found')->with('errors', $validator->messages()->all()[0])->withInput();

        }

    }

    public function ubahpassword()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        return view('pengguna.ubahpassword', ['key'=>'ubahpassword', 'user'=>$user]);
    }

    public function postubahpassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|different:current_password',
            'confirm_password' => 'required|string|min:8|same:new_password',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            // Update the password with the new one
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect('/pengguna/')->with('success', 'Password berhasil diubah!');
        } else {
            return redirect()->back()->with('error', 'Password saat ini salah.');
        }
    }

    public function jemputsampah(){
        $user = Auth::User()->nama_lengkap ?? '';
        return view('pengguna.jemputsampah' , ['key'=>'jemputsampah', 'user'=>$user]);
    }
    public function buangsampah(){
        $user = Auth::User()->nama_lengkap ?? '';
        return view('pengguna.buangsampah', ['key'=>'buangsampah', 'user'=>$user]);
    }

    public function buanglangganan(){
        $user = Auth::User()->nama_lengkap ?? '';
        return view('pengguna.langganan.langgananbuang', ['key'=>'buanglangganan', 'user'=>$user]);
    }
}
