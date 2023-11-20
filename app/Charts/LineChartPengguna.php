<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

use App\Models\User;


class LineChartPengguna
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle('Di Hitung Berdasarkan Berat (kg)')
            ->addData('Organik', [3, 5, 3, 3, 5, 3, 0])
            ->addData('An-Organik', [1, 0, 3, 1, 2, 1, 0])
            ->setXAxis(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'])
            ->setFontColor('#000')
            ->setHeight(210) 
            ->setWidth(300);
    }
}
