@extends('banksampah.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (Auth::User()->provinsi == null && Auth::User()->kabupaten == null)
                        <div class="alert alert-warning" role="alert">
                            Anda Belum Melengkapi Profile <a href="/pengguna/profilesetting" class="text-primary">Lengkapi</a>
                        </div>
                    @endif
                    <h4 class="text-center my-3">Dashboard Bank Sampah</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                            Perbandingan Sampah Yang Masuk
                        </div>
                        <div class="card-body">
                            <canvas class="chart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                            Jenis Sampah Yang Masuk
                        </div>
                        <div class="card-body">
                            <canvas class="chart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div>
                        <h4 class="my-3">Sisa Kapasitas Sampah</h4>
                        <div class="progress mb-2">
                            <div class="progress-bar" role="progressbar" style="width: {{$format}}%;" aria-valuenow="{{$format}}"
                                aria-valuemin="0" aria-valuemax="{{$kapasitas}}"> {{$format}} Kg </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
