<?php

namespace App\Http\Controllers;

use App\Charts\LineChartPengguna;
use App\Charts\PieChartSampah;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\master_pengambilan;
use App\Models\detail_pengambilan;
use App\Models\master_pembuangan;
use DB;
use Carbon\Carbon;
use PDF;


class PenggunaLanggananController extends Controller
{
    public function index(PieChartSampah $chart, LineChartPengguna $linechart)
    {
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        $id_pengguna = Auth::User()->id;
        $result_master = master_pembuangan::select('master_pembuangan.id_master_pembuangan', 'users.id', 'users.nama_lengkap', 'master_pembuangan.jenis_sampah', 'master_pembuangan.tgl_pengajuan','master_pembuangan.jam_pengajuan', 'master_pembuangan.status_terima')
            ->join('users', 'users.id', '=', 'master_pembuangan.id_bank_sampah')
            ->where('master_pembuangan.id_pengguna', $id_pengguna)
            ->orderBy('master_pembuangan.id_master_pembuangan', 'desc')
            ->paginate(5);

        $lama_langganan = DB::select('SELECT langganan.lama_langganan, detail_langganan.tanggal
        FROM users, detail_langganan, langganan
        WHERE users.id = '. $id_pengguna .' AND langganan.kode_langganan = detail_langganan.kode_langganan');
        $mytime = $lama_langganan[0]->tanggal;
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $mytime);
        if(!empty($lama_langganan)){
            $daysToAdd = $lama_langganan[0]->lama_langganan;
            $date = $date->addDays($daysToAdd);
            return view('pengguna.langganan.indexlangganan', ['username' => $username], ['chart' => $chart->build(), 'linechart' => $linechart->build(), 'key' => 'index', 'result' => $result, 'result_master' => $result_master, 'date'=>$date]);
        }else{
            return view('pengguna.langganan.indexlangganan', ['username' => $username], ['chart' => $chart->build(), 'linechart' => $linechart->build(), 'key' => 'index', 'result' => $result, 'result_master' => $result_master, 'date'=>$date]);
        }       
    }

    public function buanglangganan()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        $username = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        $banksampah = User::where('role', 'banksampah')->get();
        ;
        $pengguna = User::where('role', 'pengguna')
            ->where('status_langganan', 'Sudah Langganan')
            ->get();
        $pengambil = User::where('role', 'pengambil')->get();
        return view('pengguna.langganan.langgananbuang', ['key' => 'buangsampah', 'user' => $user, 'result' => $result, 'banksampah' => $banksampah, 'pengguna' => $pengguna, 'pengambil' => $pengambil]);
    }

    public function postbuanglangganan(Request $request)
    {
        $validated = $request->validate([
            'jenis_sampah' => 'required|max:255',
            'idpengambil' => 'required',
            'jam' => 'required',
            'tgl' => 'required'
        ]);

        if ($validated) {
            $id_pengguna = Auth::User()->id;

            $today = now()->format('Y-m-d');
            $existingRequest = master_pengambilan::where('id_pengguna', $id_pengguna)
                ->whereDate('tanggal', $today)
                ->exists();

            if ($existingRequest) {
                return redirect('/pengguna/buanglangganan')->with('error', 'Anda sudah mengajukan pengambilan hari ini.');
            }
            master_pengambilan::create([
                'id_pengguna' => $id_pengguna,
                'jenis_sampah' => $request->jenis_sampah,
                'jam' => $request->jam,
                'hari' => date('l'),
                'tanggal' => $request->tgl,
            ]);
            $idnota = master_pengambilan::orderBy('id_nota', 'desc')->first()->id_nota;
            detail_pengambilan::create([
                'id_nota' => $idnota,
                'id_pengambil' => $request->idpengambil,
                'berat' => 0
            ]);
            return redirect('/pengguna/')->with('success', 'Data Sampah Berhasil Diinputkan');

        }
    }
}
