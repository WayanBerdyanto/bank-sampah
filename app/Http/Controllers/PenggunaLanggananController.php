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
use App\Models\Detail_Pembuangan;



class PenggunaLanggananController extends Controller
{

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
            'tgl' => 'required',
            'berat'=> 'required|numeric|max:7',
        ], [
            'berat.max' => 'Berat Sampah tidak boleh lebih dari 7 KG.',
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
                'berat' => $request->berat
            ]);
            return redirect('/pengguna/')->with('success', 'Data Sampah Berhasil Diinputkan');

        }else{
            return redirect('/pengguna/buanglangganan')->with('error', 'Data Gagal Diinputkan');
        }
    }

    public function historyLangganan(){
        $id_pengguna = Auth::User()->id;
        $result = DB::table('detail_langganan')->select(
        'detail_langganan.id_pengguna',
        'langganan.nama_langganan',
        'detail_langganan.tanggal',
        'detail_langganan.masa_langganan',
        'detail_langganan.status'
        )->join('langganan', 'langganan.kode_langganan', '=', 'detail_langganan.kode_langganan')
        ->join('users', 'users.id', '=', 'detail_langganan.id_pengguna')
        ->where('detail_langganan.id_pengguna', $id_pengguna)
        ->orderBy('detail_langganan.id_pengguna', 'desc')
        ->paginate(5);
       return view('/pengguna/langganan/historylangganan', ['key' => 'historylangganan', 'result'=>$result]);
    }

    public function transaksipembuangan(){
       return view('/pengguna/langganan/transaksipembuangan', ['key' =>'transaksipembuangan']);
    }
}
