@extends('pengambil.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="my-3 text-center">Dashboard Pengambil</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-header">
                            Data Request Pembuangan
                        </div>
                        <div class="card-body py-5">
                            50
                        </div>
                        <a href="/pengambil/requestpembuangan" class="btn text-light">
                            <div class="card-footer d-flex">
                                View Details
                                <span class="ms-auto">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-success text-white h-100">
                        <div class="card-header">
                            Sampah yang belum Diambil
                        </div>
                        <div class="card-body py-5">
                            <span>Success Card</span>
                        </div>
                        <a href="/pengambil/penerimaan" class="btn text-light">
                            <div class="card-footer d-flex">
                                View Details
                                <span class="ms-auto">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-danger text-white h-100">
                        <div class="card-header">
                            Data History
                        </div>
                        <div class="card-body py-5">
                            <span>Danger Card</span>
                        </div>
                        <a href="/pengambil/history" class="btn text-light">
                            <div class="card-footer d-flex">
                                View Details
                                <span class="ms-auto">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                            Area Chart Example
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
                            Area Chart Example
                        </div>
                        <div class="card-body">
                            <canvas class="chart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
