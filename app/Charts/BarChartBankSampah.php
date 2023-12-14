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

class BarChartBankSampah
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $anorganikResults = User::join('detail_pengambilan', 'users.id', '=', 'detail_pengambilan.id_pengambil')
        ->join('request_pembuangan', 'detail_pengambilan.id_dtl_pengambilan', '=', 'request_pembuangan.id_dtl_pengambilan')
        ->join('penerimaan_sampah', 'request_pembuangan.id_request', '=', 'penerimaan_sampah.id_request')
        ->join('master_pengambilan', 'detail_pengambilan.id_nota', '=', 'master_pengambilan.id_nota')
        ->where('master_pengambilan.jenis_sampah', '=', 'anorganik')
        ->where('penerimaan_sampah.confirm', '=', 'Sudah Diterima')
        ->groupBy('master_pengambilan.jenis_sampah', 'master_pengambilan.hari')
        ->select(
            'master_pengambilan.jenis_sampah',
            'master_pengambilan.hari',
            DB::raw('SUM(detail_pengambilan.berat) AS berat')
        )
        ->get();

        // Fetch data for 'organik'
        $organikResults = User::join('detail_pengambilan', 'users.id', '=', 'detail_pengambilan.id_pengambil')
    ->join('request_pembuangan', 'detail_pengambilan.id_dtl_pengambilan', '=', 'request_pembuangan.id_dtl_pengambilan')
    ->join('penerimaan_sampah', 'request_pembuangan.id_request', '=', 'penerimaan_sampah.id_request')
    ->join('master_pengambilan', 'detail_pengambilan.id_nota', '=', 'master_pengambilan.id_nota')
    ->where('master_pengambilan.jenis_sampah', '=', 'organik')
    ->where('penerimaan_sampah.confirm', '=', 'Sudah Diterima')
    ->groupBy('master_pengambilan.jenis_sampah', 'master_pengambilan.hari')
    ->select(
        'master_pengambilan.jenis_sampah',
        'master_pengambilan.hari',
        DB::raw('SUM(detail_pengambilan.berat) AS berat')
    )
    ->get();




        // Initialize an array to store the results for each day
        $dayResults = [];

        $dayResulsOrganik = [];

        // Initialize the dayResults array with default values
        foreach ($days as $day) {
            $dayResults[$day] = ['jenis_sampah' => $day, 'berat' => 0, 'hari' => $day];
        }

        foreach ($days as $day) {
            $dayResulsOrganik[$day] = ['jenis_sampah' => $day, 'berat' => 0, 'hari' => $day];
        }

        // Update the dayResults array with actual values from the query result
        foreach ($anorganikResults as $row) {
            $dayResults[$row->hari] = ['jenis_sampah' => $row->jenis_sampah, 'berat' => $row->berat, 'hari' => $row->hari];
        }
        foreach ($organikResults as $row) {
            $dayResulsOrganik[$row->hari] = ['jenis_sampah' => $row->jenis_sampah, 'berat' => $row->berat, 'hari' => $row->hari];
        }
        return $this->chart->barChart()
        ->setTitle('Anorganik Dan Organik')
        ->setSubtitle('Grafik Sampah Masuk Dihitung Berdasarkan Hari')
        ->addData('An-Organik', array_map(function ($day) use ($dayResults) {
            return intval($dayResults[$day]['berat']);
        }, $days))
        ->addData('Organik', array_map(function ($day) use ($dayResulsOrganik) {
            return intval($dayResulsOrganik[$day]['berat']);
        }, $days))
        ->setXAxis(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])
        ->setColors(['#ffc63b', '#ff6384'])
        ->setFontColor('#fff')
        ->setMarkers([
            '#FF5722', // Normal marker color
            '#FF5722'  // Hover/Active marker color
        ], 7, 10)
        ->setHeight(250)
        ->setWidth(300);
    }
}
