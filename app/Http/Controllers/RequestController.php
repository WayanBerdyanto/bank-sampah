<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\master_pengambilan;



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
            'dp.status_pengambilan',
            'dp.berat'
        )
        ->orderBy('master_pengambilan.tanggal', 'desc')
        ->orderBy('master_pengambilan.jam', 'desc')
        ->paginate(10);

        return view('pengambil.requestpembuaganpage', ['getBank'=>$getBank, 'result'=>$result]);
    }
}
