<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\master_pembuangan;
use App\Models\Detail_Pembuangan;
use App\Models\penerimaansampah;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Charts\PieChartBankSampah;
use App\Charts\BarChartBankSampah;


class BankSampahController extends Controller
{
    public function index(PieChartBankSampah $chart, BarChartBankSampah $barchart)
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $kapasitas = Auth::User()->kapasitas ?? '';

        $beratsampah = db::select("SELECT SUM(dp.berat) AS berat 
        FROM detail_pengambilan dp, request_pembuangan rp, penerimaan_sampah ps
        WHERE dp.id_dtl_pengambilan = rp.id_dtl_pengambilan 
        AND rp.id_request = ps.id_request
        AND ps.confirm = 'Sudah Diterima'");

        $hasil = $kapasitas - intval($beratsampah[0]->berat);
        $format = number_format($hasil, 2);

        return view("banksampah.index", ['user' => $user, 'format' => $format, 'kapasitas' => $kapasitas,'chart' => $chart->build(), 'barchart' => $barchart->build()]);
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
        $result_master = Detail_Pembuangan::select(
            'detail_pembuangan.id_dtl_pembuangan',
            'detail_pembuangan.berat_sampah',
            'mp.id_master_pembuangan',
            'users.nama_lengkap AS Nama_Bank',
            'mp.tgl_pengajuan',
            DB::raw('(SELECT nama_lengkap FROM users WHERE users.id = mp.id_pengguna) AS nama_lengkap'),
            'mp.jenis_sampah',
            'mp.jam_pengajuan'
        )
            ->join('master_pembuangan as mp', 'detail_pembuangan.id_master_pembuangan', '=', 'mp.id_master_pembuangan')
            ->join('users', 'users.id', '=', 'mp.id_bank_sampah')
            ->where('users.id', $id_banksampah)
            ->orderBy('mp.id_master_pembuangan', 'desc')
            ->paginate(5);

        $result_pengambilan = User::join('detail_pengambilan as dp', 'users.id', '=', 'dp.id_pengambil')
            ->join('request_pembuangan as rp', 'dp.id_dtl_pengambilan', '=', 'rp.id_dtl_pengambilan')
            ->join('penerimaan_sampah as ps', 'rp.id_request', '=', 'ps.id_request')
            ->join('master_pengambilan as mp', 'dp.id_nota', '=', 'mp.id_nota')
            ->select('users.nama_lengkap', 'mp.jenis_sampah','mp.tanggal','mp.jam','dp.berat', 'ps.id_penerimaan_sampah', 'ps.confirm', 'mp.hari')
            ->paginate(10);

        return view('banksampah.dataPenerimaan', ['user' => $user, 'result_master' => $result_master, 'result_pengambilan' => $result_pengambilan]);
    }
    public function history()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $id_banksampah = Auth::User()->id;
        $result_master = Detail_Pembuangan::select(
            'detail_pembuangan.id_dtl_pembuangan',
            'detail_pembuangan.berat_sampah',
            'mp.id_master_pembuangan',
            'users.nama_lengkap AS Nama_Bank',
            'mp.tgl_pengajuan',
            'mp.status_terima',
            DB::raw('(SELECT nama_lengkap FROM users WHERE users.id = mp.id_pengguna) AS nama_lengkap'),
            'mp.jenis_sampah',
            'mp.jam_pengajuan'
        )
            ->join('master_pembuangan as mp', 'detail_pembuangan.id_master_pembuangan', '=', 'mp.id_master_pembuangan')
            ->join('users', 'users.id', '=', 'mp.id_bank_sampah')
            ->where('users.id', $id_banksampah)
            ->orderBy('mp.id_master_pembuangan', 'desc')
            ->paginate(5);

        $result_pengambilan = DB::table('users')
            ->join('detail_pengambilan as dp', 'users.id', '=', 'dp.id_pengambil')
            ->join('request_pembuangan as rp', 'dp.id_dtl_pengambilan', '=', 'rp.id_dtl_pengambilan')
            ->join('penerimaan_sampah as ps', 'rp.id_request', '=', 'ps.id_request')
            ->join('master_pengambilan as mp', 'dp.id_nota', '=', 'mp.id_nota')
            ->select(
                'users.nama_lengkap',
                'mp.jenis_sampah',
                'dp.berat',
                'ps.id_penerimaan_sampah',
                'ps.confirm',
                'mp.tanggal',
                'mp.jam'
            )
            ->paginate(10);

        return view('banksampah.history', ['user' => $user, 'result_master' => $result_master, 'result_pengambilan' => $result_pengambilan]);
    }
    public function detailPenerimaan($id)
    {
        $detail = Detail_Pembuangan::where('id_dtl_pembuangan', $id)->get();
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();

        return view('banksampah.detailPenerimaan', ['user' => $user, 'result' => $result, 'username' => $username, 'detail' => $detail]);
    }

    public function hapusterima($id)
    {
        $result = Detail_Pembuangan::where('id_dtl_pembuangan', $id)->get();
        $id_master = $result[0]->id_master_pembuangan;

        if ($id_master == $result[0]->id_master_pembuangan) {
            master_pembuangan::where('id_master_pembuangan', $id_master)->update(['status_terima' => 'Ditolak']);
            Detail_Pembuangan::where('id_dtl_pembuangan', $id)->delete();
            return redirect('/banksampah/datapenerimaan')->with('success', 'Data Berhasil DiTolak');
        } else {
            return redirect('/bansampah/detailPenerimaan')->with('error', 'Data Gagal Ditolak');
        }
    }

    public function terimaambil($id)
    {
        $data = penerimaansampah::where('id_penerimaan_sampah', $id)->update([
            'confirm' => 'Sudah Diterima',
            'jam_terima' => Carbon::now()->toTimeString(),
            'tanggal_terima' => Carbon::now()->toDateString()
        ]);
        if ($data) {
            return redirect('/banksampah/datapenerimaan')->with('toast_success', 'Data Berhasil Diterima');
        } else {
            return redirect('/banksampah/datapenerimaan')->with('toast_error', 'Data Gagal Diterima');
        }
    }

    public function tolakambil($id)
    {
        $data = penerimaansampah::where('id_penerimaan_sampah', $id)->update([
            'confirm' => 'Ditolak',
            'jam_terima' => Carbon::now()->toTimeString(),
            'tanggal_terima' => Carbon::now()->toDateString()
        ]);
        if ($data) {
            return redirect('/banksampah/datapenerimaan')->with('toast_success', 'Data Berhasil Ditolak');
        } else {
            return redirect('/banksampah/datapenerimaan')->with('toast_error', 'Data Gagal Ditolak');
        }
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
            $user->kapasitas = $request->kapasitas;
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

    public function terimasampah($id, Request $request)
    {

        $result = Detail_Pembuangan::where('id_dtl_pembuangan', $id)->get();
        $id_master = $result[0]->id_master_pembuangan;

        if ($id_master == $result[0]->id_master_pembuangan) {
            master_pembuangan::where('id_master_pembuangan', $id_master)->update(['status_terima' => 'Diterima']);
            Detail_Pembuangan::where('id_dtl_pembuangan', $id)->update([
                'berat_sampah' => $request->berat,
                'tanggal' => now(),
                'jam_penerimaan' => $request->jam_penerimaan,
                'hari' => date('l'),
            ]);
            return redirect('/banksampah/datapenerimaan')->with('success', 'Data Berhasil Diterima');
        }
    }

}
