<?php

namespace App\Charts;
use App\Models\Langganan;
use App\Models\master_pembuangan;
use App\Models\Detail_Pembuangan;
use App\Models\Detail_Langganan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PieChartSampah
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        if(Auth::user()->status_langganan == 'Sudah Langganan'){
            $id = Auth::user()->id;
        
            $anorganik = DB::select("SELECT mp.jenis_sampah, SUM(dp.berat) AS berat
                FROM master_pengambilan mp, detail_pengambilan dp, users us
                WHERE mp.id_nota = dp.id_nota AND mp.jenis_sampah = 'anorganik' AND mp.id_pengguna = us.id 
                AND mp.id_pengguna = '$id' ");
        
            $organik = DB::select("SELECT mp.jenis_sampah, SUM(dp.berat) AS berat
                FROM master_pengambilan mp, detail_pengambilan dp, users us
                WHERE mp.id_nota = dp.id_nota AND mp.jenis_sampah = 'organik' AND mp.id_pengguna = us.id 
                AND mp.id_pengguna = '$id'");
        
            return $this->chart->pieChart()
                ->setTitle('Dihitung Berdasarkan Berat (kg)')
                ->addData([
                    intval($organik[0]->berat),
                    intval($anorganik[0]->berat),
                ])
                ->setLabels([
                    $organik[0]->jenis_sampah,
                    $anorganik[0]->jenis_sampah,
                ])
                ->setColors(['#ffc63b', '#ff6384'])
                ->setFontColor('#fff')
                ->setHeight(200)
                ->setWidth(300);
        }else{
            $id = Auth::user()->id;
        
            $anorganik = DB::select("SELECT mp.jenis_sampah, SUM(dp.berat_sampah) AS berat
            FROM master_pembuangan mp, detail_pembuangan dp, users us
            WHERE mp.id_master_pembuangan = dp.id_master_pembuangan 
            AND mp.jenis_sampah = 'anorganik'  AND mp.id_pengguna = us.id 
            AND mp.id_pengguna = '$id' ");
        
            $organik = DB::select("SELECT mp.jenis_sampah, SUM(dp.berat_sampah) AS berat
            FROM master_pembuangan mp, detail_pembuangan dp, users us
            WHERE mp.id_master_pembuangan = dp.id_master_pembuangan 
            AND mp.jenis_sampah = 'organik'  AND mp.id_pengguna = us.id 
            AND mp.id_pengguna = '$id'");
        
            return $this->chart->pieChart()
                ->setTitle('Dihitung Berdasarkan Berat (kg)')
                ->addData([
                    intval($organik[0]->berat),
                    intval($anorganik[0]->berat),
                ])
                ->setLabels([
                    $organik[0]->jenis_sampah,
                    $anorganik[0]->jenis_sampah,
                ])
                ->setColors(['#ffc63b', '#ff6384'])
                ->setFontColor('#fff')
                ->setHeight(200)
                ->setWidth(300);
        }
    }
}
