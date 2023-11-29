<?php

namespace App\Http\Controllers;

use App\Charts\LineChartPengguna;
use App\Charts\PieChartSampah;
use App\Models\Langganan;
use App\Models\master_pembuangan;
use App\Models\Detail_Pembuangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index(PieChartSampah $chart, LineChartPengguna $linechart)
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        $id_pengguna = Auth::User()->id;
        $result_master = master_pembuangan::select('master_pembuangan.id_master_pembuangan', 'users.id', 'users.nama_lengkap', 'master_pembuangan.jenis_sampah', 'master_pembuangan.jam_pengajuan', 'master_pembuangan.status_terima')
            ->join('users', 'users.id', '=', 'master_pembuangan.id_bank_sampah')
            ->where('master_pembuangan.id_pengguna', $id_pengguna)
            ->orderBy('master_pembuangan.id_master_pembuangan', 'desc')
            ->paginate(5);
        return view('pengguna.index', ['user' => $user, 'username' => $username], ['chart' => $chart->build(), 'linechart' => $linechart->build(), 'key' => 'index', 'result' => $result, 'result_master' => $result_master]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function langganan()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        $langganan = Langganan::All();
        return view('pengguna.langganan', ['user' => $user, 'key' => 'langganan', 'result' => $result, 'langganan' => $langganan]);
    }
    public function transaksi()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        return view('pengguna.transaksi', ['user' => $user, 'key' => 'transaksi', 'result' => $result]);
    }

    public function profilesetting()
    {
        $username = Auth::User()->username ?? '';
        $user = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        return view('pengguna.profile', ['result' => $result, 'key' => 'profilesettings', 'user' => $user]);
    }

    public function postProfile($id, Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = User::find($id);
        if ($user) {
            if($request->hasFile('foto')){
                $foto = $request->file('foto');
                $fileName = $foto->getClientOriginalName();
                $user->username = $request->username;
                $user->email = $request->email;
                $user->foto = $fileName;
                $user->nama_lengkap = $request->namalengkap;
                $user->provinsi = $request->provinsi;
                $user->kabupaten = $request->kabupaten;
                $user->kecamatan = $request->kecamatan;
                $user->kelurahan = $request->kelurahan;
                $user->no_telpon = $request->no_telpon;
                $user->latitude = $request->latitudeInput;
                $user->longitude = $request->longitudeInput;
                $foto->move(public_path('img/pengguna'), $fileName);

            }
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
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        return view('pengguna.ubahpassword', ['key' => 'ubahpassword', 'user' => $user, 'result' => $result]);
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
    public function buangsampah()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        $banksampah = User::where('role', 'banksampah')->get();;
        return view('pengguna.buangsampah', ['key' => 'buangsampah', 'user' => $user, 'result' => $result, 'banksampah' => $banksampah]);
    }

    public function postbuangsampah(Request $request)
    {
        $validated = $request->validate([
            'jenis_sampah' => 'required|max:255',
            'idbanksampah' => 'required',
            'jam_pengajuan' => 'required',
        ]);
        $id_pengguna = Auth::User()->id;
        if ($validated) {
            master_pembuangan::create([
                'id_bank_sampah' => $request->idbanksampah,
                'id_pengguna' => $id_pengguna,
                'jenis_sampah' => $request->jenis_sampah,
                'jam_pengajuan' => $request->jam_pengajuan,
            ]);
            $idMasterPembuangan = master_pembuangan::pluck('id_master_pembuangan')->last();
            Detail_Pembuangan::create([
                'id_master_pembuangan'=>$idMasterPembuangan,
                'status' => $request->status
            ]);
            return redirect('/pengguna/')->with('success', 'Data Sampah Berhasil Diinputkan');
        } else {
            return redirect('/pengguna/buangsampah')->with('error', 'Data Sampah Gagal Diinputkan');
        }
    }

    public function detailbuangsampah($id){
        $detail = Detail_Pembuangan::where('id_dtl_pembuangan', $id)->get();
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        return view('pengguna.detailbuangsampah', [ 'key' => 'index', 'result' => $result, 'user' => $user, 'username' => $username, 'detail'=>$detail]);
    }

    public function buanglangganan()
    {
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        return view('pengguna.langganan.langgananbuang', ['key' => 'buanglangganan', 'user' => $user, 'result' => $result]);
    }
}
