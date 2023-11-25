@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (session('flash_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-patch-check-fill"></i>
                            Selamat Datang Pengguna <strong>{{ $user }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <h2 class="mt-2 mb-4 text-center fw-bold fs-2">Dashboard Pengguna</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card bg-warning text-dark" style="height: 280px">
                        <div class="card-header text-center fw-bold">
                            Grafik Jenis Sampah Disetiap Hari
                        </div>
                        <div class="card-body px-4">
                            {!! $linechart->container() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card bg-success text-light" style="height: 280px">
                        <div class="card-header text-center fw-bold mb-1">
                            Jenis Sampah
                        </div>
                        <div class="card-body px-4">
                            {!! $chart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Data History Pembuangan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Banksampah</th>
                                            <th>Jenis Sampah</th>
                                            <th>Jam Pengajuan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result_master as $items)
                                            <tr>
                                                <td>{{ $items->id }}</td>
                                                <td>{{ $items->nama_lengkap }}</td>
                                                <td>{{ $items->jenis_sampah }}</td>
                                                <td>{{ $items->jam_pengajuan }}</td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination flex justify-content-end">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <h3 class="form-label fw-bold">Lokasi Rumah</h3>
                        <div class="card-body" id="maps" style="height: 400px">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

<div class="modal fade" id="modallogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">
                    <i class="bi bi-exclamation-circle-fill mr-2 text-danger"></i>
                    Logout
                </h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda Yakin Logout dari <strong>{{ $user }}</strong> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="/pengguna/logout">Logout</a>
            </div>
        </div>
    </div>
</div>
@section('charts')
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
    <script src="{{ $linechart->cdn() }}"></script>
    {{ $linechart->script() }}
@endsection
