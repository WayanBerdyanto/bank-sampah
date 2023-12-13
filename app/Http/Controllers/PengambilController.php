<?php

namespace App\Http\Controllers;

use App\Models\detail_pengambilan;
use App\Models\master_pengambilan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Charts\PieChartSampah;



class PengambilController extends Controller
{
    public function index()
    {
        $getBank = user::where('role', 'banksampah')->get();

        $pengambil = Auth::user()->id;
        $result = master_pengambilan::join('detail_pengambilan as dp', 'master_pengambilan.id_nota', '=', 'dp.id_nota')
        ->join('users as us', 'master_pengambilan.id_pengguna', '=', 'us.id')
        ->where('dp.id_pengambil', '=', $pengambil)
        ->select(
            'master_pengambilan.id_pengguna',
            'dp.id_dtl_pengambilan',
            'dp.id_nota',
            'dp.id_pengambil',
            'master_pengambilan.jenis_sampah',
            'us.nama_lengkap',
            'dp.status_pengambilan',
            'dp.berat',
            'dp.status_request'
        )
        ->orderBy('master_pengambilan.tanggal', 'desc')
        ->orderBy('master_pengambilan.jam', 'desc')
        ->paginate(10);

        $user = Auth::User()->nama_lengkap ?? '';
        return view("pengambil.index", ['user' => $user, 'result'=>$result]);
    }

    public function profilepengambil()
    {
        $username = Auth::User()->username ?? '';
        $user = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        return view('pengambil.profile', ['result' => $result, 'user' => $user]);
    }

    public function postProfile($id, Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = User::find($id);
        if ($user) {
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fileName = $foto->getClientOriginalName();
                $foto->move(public_path('img/pengambil'), $fileName);
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
                if ($user->save()) {
                    return redirect('/pengambil/')->with('success', 'Profile Berhasil Di Ubah');
                } else {
                    return redirect('/pengambil/profilepengambil')->with('errors', $validator->messages()->all()[0])->withInput();
                }
            }
        } else {
            return redirect('/pengambil/profilepengambil')->with('error', 'User Not Found')->with('errors', $validator->messages()->all()[0])->withInput();
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

            return redirect('/pengambil/')->with('success', 'Password berhasil diubah!');
        } else {
            return redirect()->back()->with('error', 'Password saat ini salah.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function penerimaan()
    {

        $pengambil = Auth::user()->id; // Use auth() helper instead of Auth facade
        $result = master_pengambilan::join('detail_pengambilan as dp', 'master_pengambilan.id_nota', '=', 'dp.id_nota')
        ->join('users as us', 'master_pengambilan.id_pengguna', '=', 'us.id')
        ->where('dp.id_pengambil', '=', $pengambil)
        ->select(
            'master_pengambilan.id_pengguna',
            'dp.id_dtl_pengambilan',
            'dp.id_nota',
            'dp.id_pengambil',
            'master_pengambilan.jenis_sampah',
            'master_pengambilan.hari',
            'master_pengambilan.tanggal',
            'master_pengambilan.jam',
            'us.nama_lengkap',
            'us.latitude',
            'us.longitude',
            'dp.status_pengambilan',
            'dp.berat'
        )
        ->orderBy('master_pengambilan.tanggal', 'desc')
        ->orderBy('master_pengambilan.jam', 'desc')
        ->paginate(10);

        $getPengguna = master_pengambilan::join('detail_pengambilan as dp', 'master_pengambilan.id_nota', '=', 'dp.id_nota')
        ->join('users as us', 'master_pengambilan.id_pengguna', '=', 'us.id')
        ->where('dp.id_pengambil', '=', $pengambil)
        ->where('dp.status_pengambilan', '=', 'Belum diambil')
        ->select(
            'us.nama_lengkap',
            'us.latitude',
            'us.longitude',
            'us.kabupaten',
            'us.kecamatan',
            'us.kelurahan',
            'dp.status_pengambilan'
        )
        ->get();

        $progress = master_pengambilan::join('detail_pengambilan as dp', 'master_pengambilan.id_nota', '=', 'dp.id_nota')
        ->join('users as us', 'master_pengambilan.id_pengguna', '=', 'us.id')
        ->where('dp.id_pengambil', '=', $pengambil)
        ->where('dp.status_pengambilan', '=', 'Sudah diambil')
        ->count();

        $sampahDiambil = master_pengambilan::join('detail_pengambilan as dp', 'master_pengambilan.id_nota', '=', 'dp.id_nota')
            ->join('users as us', 'master_pengambilan.id_pengguna', '=', 'us.id')
            ->where('dp.id_pengambil', '=', $pengambil)
            ->where('dp.status_pengambilan', '=', 'Belum diambil')
            ->count();

        $totalSampah = $progress + $sampahDiambil; 

        if ($totalSampah > 0) {
            $progressPercentage = ($progress / $totalSampah) * 100;
            $formattedProgress = number_format($progressPercentage, 2);
        } else {
            $formattedProgress = 0; 
        }
        return view('pengambil.penerimaan', ['result' => $result,'getPengguna'=>$getPengguna, 'formattedProgress'=>$formattedProgress]);

    }
    public function ambilsampah($id, Request $request) {
        detail_pengambilan::where('id_dtl_pengambilan',$id)
            ->update(['status_pengambilan' => 'Sudah Diambil']);
        
        return redirect('/pengambil/penerimaan')->with('success', 'Sampah Berhasil Diambil');
    }
    public function history() {

        $pengambil = auth()->user()->id; 
        $result = master_pengambilan::join('detail_pengambilan as dp', 'master_pengambilan.id_nota', '=', 'dp.id_nota')
        ->join('users as us', 'master_pengambilan.id_pengguna', '=', 'us.id')
        ->where('dp.id_pengambil', '=', $pengambil)
        ->where('dp.status_pengambilan', '=', 'Sudah Diambil')
        ->select(
            'master_pengambilan.id_pengguna',
            'dp.id_dtl_pengambilan',
            'dp.id_nota',
            'dp.id_pengambil',
            'master_pengambilan.jenis_sampah',
            'master_pengambilan.hari',
            'master_pengambilan.tanggal',
            'master_pengambilan.jam',
            'us.nama_lengkap',
            'dp.status_pengambilan',
            'dp.berat'
        )
        ->orderBy('master_pengambilan.tanggal', 'desc')
        ->orderBy('master_pengambilan.jam', 'desc')
        ->paginate(10);

        $getBank = user::where('role', 'banksampah')->get();

        $result_pembuangan = master_pengambilan::join('detail_pengambilan as dp', 'master_pengambilan.id_nota', '=', 'dp.id_nota')
        ->join('users as us', 'master_pengambilan.id_pengguna', '=', 'us.id')
        ->where('dp.id_pengambil', '=', 1)
        ->where('dp.status_request', '=', 'Sudah Request')
        ->select(
            'master_pengambilan.id_pengguna',
            'dp.id_dtl_pengambilan',
            'dp.id_nota',
            'dp.id_pengambil',
            'master_pengambilan.jenis_sampah',
            'us.nama_lengkap',
            'dp.status_pengambilan',
            'dp.status_request',
            'dp.berat'
        )
        ->orderBy('master_pengambilan.tanggal', 'desc')
        ->orderBy('master_pengambilan.jam', 'desc')
        ->paginate(10);

        return view('pengambil.history', ['result' => $result, 'result_pembuangan'=> $result_pembuangan]);
    }
}
