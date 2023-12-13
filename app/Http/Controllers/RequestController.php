<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\master_pengambilan;
use App\Models\requestpembuangan;
use App\Models\penerimaansampah;
use App\Models\detail_pengambilan;

class RequestController extends Controller
{
    public function requestPembuangan(){
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
            'dp.status_pengambilan','dp.status_request',
            'dp.berat'
        )
        ->orderBy('master_pengambilan.tanggal', 'desc')
        ->orderBy('master_pengambilan.jam', 'desc')
        ->paginate(10);

        $penerimaan = requestpembuangan::All();

        return view('pengambil.requestpembuaganpage', ['getBank'=>$getBank, 'result'=>$result, 'penerimaan'=>$penerimaan]);
    }

    public function requestpostdata(Request $request){
        $validated = $request->validate([
            'id_dtl_pengambilan' => 'required',
            'idbanksampah' => 'required',
            'status' => 'required',
        ]);

        if($validated){
            requestpembuangan::create([
                'id_dtl_pengambilan'=>$request->id_dtl_pengambilan,    
                'status'=>$request->status,    
            ]);
            $id_request = requestpembuangan::latest()->first()->id_request;
            if(!empty($id_request)){
                penerimaansampah::create([
                    'id_bank_sampah' => $request->idbanksampah,
                    'id_request' => $id_request,
                    'confirm' => 'Belum Diterima',
                ]);
                detail_pengambilan::where('id_dtl_pengambilan', $request->id_dtl_pengambilan)->update([
                    'status_request'=> 'Sudah Request'
                ]);
                return redirect('/pengambil/requestpembuangan')->with('toast_success', 'Data Berhasil direquest ke banksampah');
            }else{
                return redirect('/pengambil/requestpembuangan')->with('toast_error', 'Data Gagal direquest ke banksampah');
            }
        }else{
            return redirect('/pengambil/requestpembuangan')->with('toast_error', 'Terjadi Kesalahan data');
        }
    }
}
