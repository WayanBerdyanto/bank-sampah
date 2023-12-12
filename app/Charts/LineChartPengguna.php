<?php

namespace App\Charts;

use App\Models\master_pengambilan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

use App\Models\Langganan;
use App\Models\master_pembuangan;
use App\Models\Detail_Pembuangan;
use App\Models\Detail_Langganan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;


class LineChartPengguna
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $id = Auth::user()->id;
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        if (Auth::user()->status_langganan == 'Sudah Langganan') {
            // Fetch data for 'anorganik'
            $anorganikResults = master_pengambilan::join('detail_pengambilan', 'master_pengambilan.id_nota', '=', 'detail_pengambilan.id_nota')
                ->where('master_pengambilan.jenis_sampah', 'anorganik')
                ->where('master_pengambilan.id_pengguna', $id)
                ->groupBy('master_pengambilan.hari')
                ->selectRaw('master_pengambilan.hari, SUM(detail_pengambilan.berat) as berat')
                ->get();

            // Fetch data for 'organik'
            $organikResults = master_pengambilan::join('detail_pengambilan', 'master_pengambilan.id_nota', '=', 'detail_pengambilan.id_nota')
                ->where('master_pengambilan.jenis_sampah', 'organik')
                ->where('master_pengambilan.id_pengguna', $id)
                ->groupBy('master_pengambilan.hari')
                ->selectRaw('master_pengambilan.hari, SUM(detail_pengambilan.berat) as berat')
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

            return $this->chart->lineChart()
                ->setTitle('Di Hitung Berdasarkan Berat (kg)')
                ->addData('Organik', array_map(function ($day) use ($dayResults) {
                    return intval($dayResults[$day]['berat']);
                }, $days))
                ->addData('An-Organik', array_map(function ($day) use ($dayResulsOrganik) {
                    return intval($dayResulsOrganik[$day]['berat']);
                }, $days))
                ->setXAxis(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])
                ->setFontColor('#000')
                ->setHeight(200)
                ->setWidth(300);

        } else {
            // Fetch data for 'anorganik'
            $anorganikResults = master_pembuangan::join('detail_pembuangan', 'master_pembuangan.id_master_pembuangan', '=', 'detail_pembuangan.id_master_pembuangan')
                ->where('master_pembuangan.jenis_sampah', 'anorganik')
                ->where('master_pembuangan.id_pengguna', $id)
                ->groupBy('detail_pembuangan.hari')
                ->selectRaw('detail_pembuangan.hari, SUM(detail_pembuangan.berat_sampah) as berat')
                ->get();

            // Fetch data for 'organik'
            $organikResults = master_pembuangan::join('detail_pembuangan', 'master_pembuangan.id_master_pembuangan', '=', 'detail_pembuangan.id_master_pembuangan')
                ->where('master_pembuangan.jenis_sampah', 'organik')
                ->where('master_pembuangan.id_pengguna', $id)
                ->groupBy('detail_pembuangan.hari')
                ->selectRaw('detail_pembuangan.hari, SUM(detail_pembuangan.berat_sampah) as berat')
                ->get();

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

            return $this->chart->lineChart()
                ->setTitle('Di Hitung Berdasarkan Berat (kg)')
                ->addData('Organik', array_map(function ($day) use ($dayResults) {
                    return intval($dayResults[$day]['berat']);
                }, $days))
                ->addData('An-Organik', array_map(function ($day) use ($dayResulsOrganik) {
                    return intval($dayResulsOrganik[$day]['berat']);
                }, $days))
                ->setXAxis(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])
                ->setFontColor('#000')
                ->setHeight(200)
                ->setWidth(300);
        }
    }
}
