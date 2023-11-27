<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BankSampahController extends Controller
{
    public function index()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        return view("banksampah.index", ['user' => $user]);
    }

    public function dataPembuangan()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        return view('banksampah.dataPembuangan', ['user' => $user]);
    }
    public function dataPenerimaan()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $id_banksampah = Auth::User()->id;
        $result_master = User::select('mp.id_master_pembuangan', 'users.nama_lengkap as Nama_Bank')
            ->join('master_pembuangan as mp', 'users.id', '=', 'mp.id_bank_sampah')
            ->where('users.id', $id_banksampah)
            ->selectRaw('(SELECT users.nama_lengkap FROM users WHERE users.id = mp.id_pengguna) as nama_lengkap')
            ->addSelect('mp.jenis_sampah', 'mp.jam_pengajuan')
            ->orderBy('mp.id_master_pembuangan', 'desc')
            ->paginate(5);
        return view('banksampah.dataPenerimaan', ['user' => $user, 'result_master' => $result_master]);
    }
    public function detailPenerimaan()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        return view('banksampah.detailPenerimaan', ['user' => $user]);
    }

    public function profilebank()
    {
        $username = Auth::User()->username ?? '';
        $user = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        return view('banksampah.profile', ['result' => $result, 'user' => $user]);
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
                return redirect('/banksampah/')->with('success', 'Profile Berhasil Di Ubah');
            } else {
                return redirect('/banksampah/profilebank')->with('errors', $validator->messages()->all()[0])->withInput();

            }
        } else {
            return redirect('/banksampah/profilebank')->with('error', 'User Not Found')->with('errors', $validator->messages()->all()[0])->withInput();

        }

    }

    public function ubahpassword()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        return view('banksampah.ubahpassword', ['user' => $user]);
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

            return redirect('/banksampah/')->with('success', 'Password berhasil diubah!');
        } else {
            return redirect()->back()->with('error', 'Password saat ini salah.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
