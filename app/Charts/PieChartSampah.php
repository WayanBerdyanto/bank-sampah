<?php

namespace App\Charts;

use App\Models\Langganan;
use App\Models\master_pembuangan;
use App\Models\master_pengambilan;
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

        if (Auth::user()->status_langganan == 'Sudah Langganan') {
            $id = Auth::user()->id;

            $anorganik = DB::table('master_pengambilan as mp')
                ->join('detail_pengambilan as dp', 'mp.id_nota', '=', 'dp.id_nota')
                ->join('users as us', 'mp.id_pengguna', '=', 'us.id')
                ->select('mp.jenis_sampah', DB::raw('SUM(dp.berat) as berat'), 'us.id')
                ->where('mp.jenis_sampah', 'anorganik')
                ->where('mp.id_pengguna', $id)
                ->groupBy('mp.jenis_sampah', 'us.id')
                ->get();

            $organik = DB::table('master_pengambilan as mp')
                ->join('detail_pengambilan as dp', 'mp.id_nota', '=', 'dp.id_nota')
                ->join('users as us', 'mp.id_pengguna', '=', 'us.id')
                ->select('mp.jenis_sampah', DB::raw('SUM(dp.berat) as berat'), 'us.id')
                ->where('mp.jenis_sampah', 'organik')
                ->where('mp.id_pengguna', $id)
                ->groupBy('mp.jenis_sampah', 'us.id')
                ->get();

            return $this->chart->pieChart()
                ->setTitle('Dihitung Berdasarkan Berat (kg)')
                ->addData([
                    intval($organik[0]->berat ?? 0),
                    intval($anorganik[0]->berat ?? 0),
                ])
                ->setLabels([
                    $organik[0]->jenis_sampah ?? 'Organik',
                    $anorganik[0]->jenis_sampah ?? 'Anorganik',
                ])
                ->setColors(['#ffc63b', '#ff6384'])
                ->setFontColor('#fff')
                ->setHeight(200)
                ->setWidth(300);
        } else {
            $id = Auth::user()->id;

            $anorganik = DB::table('master_pembuangan as mp')
                ->join('detail_pembuangan as dp', 'mp.id_master_pembuangan', '=', 'dp.id_master_pembuangan')
                ->join('users as us', 'mp.id_pengguna', '=', 'us.id')
                ->select('mp.jenis_sampah', DB::raw('SUM(dp.berat_sampah) as berat'), 'us.id')
                ->where('mp.jenis_sampah', 'anorganik')
                ->where('mp.id_pengguna', $id)
                ->groupBy('mp.jenis_sampah', 'us.id')
                ->get();

            $organik = DB::table('master_pembuangan as mp')
                ->join('detail_pembuangan as dp', 'mp.id_master_pembuangan', '=', 'dp.id_master_pembuangan')
                ->join('users as us', 'mp.id_pengguna', '=', 'us.id')
                ->select('mp.jenis_sampah', DB::raw('SUM(dp.berat_sampah) as berat'), 'us.id')
                ->where('mp.jenis_sampah', 'organik')
                ->where('mp.id_pengguna', $id)
                ->groupBy('mp.jenis_sampah', 'us.id')
                ->get();

            return $this->chart->pieChart()
                ->setTitle('Dihitung Berdasarkan Berat (kg)')
                ->addData([
                    intval($organik[0]->berat ?? 0),
                    intval($anorganik[0]->berat ?? 0),
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
}
