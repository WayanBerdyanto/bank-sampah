<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Langganan;
use App\Models\master_pembuangan;
use App\Models\Detail_Pembuangan;
use App\Models\Detail_Langganan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\penerimaansampah;
use DB;
use App\Models\master_pengambilan;

class PieChartBankSampah
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $organik = DB::table('users')
        ->join('detail_pengambilan', 'users.id', '=', 'detail_pengambilan.id_pengambil')
        ->join('request_pembuangan', 'detail_pengambilan.id_dtl_pengambilan', '=', 'request_pembuangan.id_dtl_pengambilan')
        ->join('penerimaan_sampah', 'request_pembuangan.id_request', '=', 'penerimaan_sampah.id_request')
        ->join('master_pengambilan', 'detail_pengambilan.id_nota', '=', 'master_pengambilan.id_nota')
        ->where('master_pengambilan.jenis_sampah', '=', 'organik')
        ->select(DB::raw('SUM(detail_pengambilan.berat) AS total_berat'))
        ->get();
        $anorganik = DB::table('users')
        ->join('detail_pengambilan', 'users.id', '=', 'detail_pengambilan.id_pengambil')
        ->join('request_pembuangan', 'detail_pengambilan.id_dtl_pengambilan', '=', 'request_pembuangan.id_dtl_pengambilan')
        ->join('penerimaan_sampah', 'request_pembuangan.id_request', '=', 'penerimaan_sampah.id_request')
        ->join('master_pengambilan', 'detail_pengambilan.id_nota', '=', 'master_pengambilan.id_nota')
        ->where('master_pengambilan.jenis_sampah', '=', 'anorganik')
        ->select(DB::raw('SUM(detail_pengambilan.berat) AS total_berat'))
        ->get();

        return $this->chart->pieChart()
            ->setTitle('Dihitung Berdasarkan Berat (kg)')
            ->addData([
                intval($organik[0]->total_berat ?? 0),
                intval($anorganik[0]->total_berat ?? 0),
            ])
            ->setLabels([
                $organik[0]->jenis_sampah ?? 'Organik',
                $anorganik[0]->jenis_sampah ?? 'Anorganik',
            ])
            ->setColors(['#ffc63b', '#ff6384'])
            ->setFontColor('#fff')
            ->setHeight(200)
            ->setWidth(300);
    }
}
