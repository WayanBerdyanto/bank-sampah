<?php

namespace App\Charts;

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
        return $this->chart->pieChart()
            ->setTitle('Dihitung Berdasarkan Berat (kg)')
            ->addData([20, 24])
            ->setLabels(['Organik', 'Anorganik'])
            ->setColors(['#ffc63b', '#ff6384'])
            ->setFontColor('#fff')
            ->setHeight(300)
            ->setWidth(300);
        // ->setTitle('Monthly Users')
        // ->addData([
        //     User::where('id', '<=', 60)->count(),
        //     User::where('id', '>', 60)->count()
        // ])
        // ->setColors(['#ffc63b', '#ff6384'])
        // ->setLabels(['Active users', 'Inactive users']);
    }
}
