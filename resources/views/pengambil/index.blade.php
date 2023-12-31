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
                            {{ $count_id[0]->total_id }}
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
                            <span>
                                {{ $belum_diambil }}
                            </span>
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
                            <span>
                                Data History Pengambilan Dan Pembuangan
                            </span>
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
                <div class="mt-2">
                    <span>Sampah Yang sudah Diambil</span>
                    <div class="progress my-2">
                        <div class="progress-bar" role="progressbar" style="width: {{ $formattedProgress }}%;"
                            aria-valuenow="{{ $formattedProgress }}" aria-valuemin="0" aria-valuemax="100">
                            {{ $formattedProgress }} %</div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                            Banyak Sampah Yang Diambil
                        </div>
                        <div class="card-body">
                            <div class="chart" width="400" height="200">
                                {!! $barchart->container() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                            Jenis Sampah Yang Banyak Di Ambil
                        </div>
                        <div class="card-body">
                            <div class="chart" width="400" height="200">
                                {!! $piechart->container() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Data Request Pembuangan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengguna</th>
                                            <th>Jenis Sampah</th>
                                            <th>Berat Sampah</th>
                                            <th class="text-center ">Tujuan Buang</th>
                                            <th class="text-center">Status Confirmasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $idx => $item)
                                            <tr>
                                                <td> {{ $loop->index + 1 }} </td>
                                                <td>{{ $item->nama_lengkap }}</td>
                                                <td>
                                                    {{ $item->jenis_sampah }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->berat }} Kg
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->lokasi_buang }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->confirm }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('charts')
    <script src="{{ $barchart->cdn() }}"></script>
    {{ $barchart->script() }}
    <script src="{{ $piechart->cdn() }}"></script>
    {{ $piechart->script() }}
@endsection
