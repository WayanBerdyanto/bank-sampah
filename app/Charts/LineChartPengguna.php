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
        if(Auth::user()->status_langganan == 'Sudah Langganan'){
            $id = Auth::user()->id;
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

            $query = "SELECT mp.jenis_sampah, SUM(dp.berat) AS berat, mp.hari
                FROM master_pengambilan mp, detail_pengambilan dp, users us
                WHERE mp.id_nota = dp.id_nota
                    AND mp.jenis_sampah = 'anorganik'
                    AND mp.id_pengguna = us.id
                    AND mp.id_pengguna = $id
                GROUP BY mp.hari";

            $query_organik = "SELECT mp.jenis_sampah, SUM(dp.berat) AS berat, mp.hari
                FROM master_pengambilan mp, detail_pengambilan dp, users us
                WHERE mp.id_nota = dp.id_nota
                    AND mp.jenis_sampah = 'organik'
                    AND mp.id_pengguna = us.id
                    AND mp.id_pengguna = $id
                GROUP BY mp.hari";

            $result = DB::select($query);

            $result_organik = DB::select($query_organik);

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
            foreach ($result as $row) {
                $dayResults[$row->hari] = ['jenis_sampah' => $row->jenis_sampah, 'berat' => $row->berat, 'hari' => $row->hari];
            }
            foreach ($result_organik as $row) {
                $dayResulsOrganik[$row->hari] = ['jenis_sampah' => $row->jenis_sampah, 'berat' => $row->berat, 'hari' => $row->hari];
            }

            // Now, $dayResults contains the sum of berat for each day


            return $this->chart->lineChart()
            ->setTitle('Di Hitung Berdasarkan Berat (kg)')
            ->addData('Organik', array_map(function ($day) use ($dayResults) {
                return intval($dayResults[$day]['berat']);
            }, $days))
            ->addData('An-Organik',array_map(function ($day) use ($dayResulsOrganik) {
                return intval($dayResulsOrganik[$day]['berat']);
            }, $days))
            ->setXAxis(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])
            ->setFontColor('#000')
            ->setHeight(200)
            ->setWidth(300);
        }else{
            $id = Auth::user()->id;
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

            $query = "SELECT mp.jenis_sampah, SUM(dp.berat_sampah) AS berat, dp.hari
            FROM master_pembuangan mp, detail_pembuangan dp, users us
            WHERE mp.id_master_pembuangan = dp.id_master_pembuangan
            AND mp.jenis_sampah = 'anorganik'
            AND mp.id_pengguna = us.id
            AND mp.id_pengguna = $id
            GROUP BY dp.hari";

            $query_organik = "SELECT mp.jenis_sampah, SUM(dp.berat_sampah) AS berat, dp.hari
            FROM master_pembuangan mp, detail_pembuangan dp, users us
            WHERE mp.id_master_pembuangan = dp.id_master_pembuangan
            AND mp.jenis_sampah = 'organik'
            AND mp.id_pengguna = us.id
            AND mp.id_pengguna = $id
            GROUP BY dp.hari";

            $result = DB::select($query);

            $result_organik = DB::select($query_organik);

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
            foreach ($result as $row) {
                $dayResults[$row->hari] = ['jenis_sampah' => $row->jenis_sampah, 'berat' => $row->berat, 'hari' => $row->hari];
            }
            foreach ($result_organik as $row) {
                $dayResulsOrganik[$row->hari] = ['jenis_sampah' => $row->jenis_sampah, 'berat' => $row->berat, 'hari' => $row->hari];
            }

            // Now, $dayResults contains the sum of berat for each day


            return $this->chart->lineChart()
            ->setTitle('Di Hitung Berdasarkan Berat (kg)')
            ->addData('Organik', array_map(function ($day) use ($dayResults) {
                return intval($dayResults[$day]['berat']);
            }, $days))
            ->addData('An-Organik',array_map(function ($day) use ($dayResulsOrganik) {
                return intval($dayResulsOrganik[$day]['berat']);
            }, $days))
            ->setXAxis(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])
            ->setFontColor('#000')
            ->setHeight(200)
            ->setWidth(300);
        }

    }
}
