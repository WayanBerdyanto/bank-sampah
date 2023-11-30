@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row mt-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-primary"><a href="/pengguna/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Buang</li>
                    </ol>
                </nav>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-info-circle-fill"></i></span> Detail Pembuangan
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Lokasi Pembuangan :
                                    <span class="ml-4">
                                        {{ $result_master[0]->lokasi_pembuangan }}
                                    </span>
                                </li>
                                <li class="list-group-item">Berat Sampah :
                                    <span class="ml-4">
                                        {{ $result_master[0]->berat_sampah }}
                                    </span>
                                </li>
                                <li class="list-group-item">Jenis Sampah :
                                    <span class="ml-4">
                                        {{ $result_master[0]->jenis_sampah }}
                                    </span>
                                </li>
                                <li class="list-group-item">Jam Diterima :
                                    <span class="ml-4">
                                        {{ $result_master[0]->jam_penerimaan }}
                                    </span>
                                </li>
                                <li class="list-group-item">Hari :
                                    <span class="ml-4">
                                        {{ $result_master[0]->hari }}
                                    </span>
                                </li>
                                <li class="list-group-item">Tanggal Diterima :
                                    <span class="ml-4">
                                        {{ $result_master[0]->tanggal }}
                                    </span>
                                </li>
                                <li class="list-group-item">Status Buang :
                                    <span class="ml-4">
                                        {{ $result_master[0]->status_terima }}
                                    </span>
                                </li>
                                <li class="list-group-item">Status Bayar :
                                    <span class="ml-4">
                                        @if ($result_master[0]->status_bayar == 'Lunas')
                                            <span class="btn btn-success">
                                                {{ $result_master[0]->status_bayar }}
                                            </span>
                                        @else
                                            <span class="btn btn-danger">
                                                Belum Bayar
                                            </span>
                                        @endif

                                    </span>
                                </li>
                                <li class="list-group-item">Total :
                                    <span class="ml-4">
                                        {{ $result_master[0]->total }}
                                    </span>
                                </li>
                            </ul>
                            @if ($result_master[0]->status_terima == 'Diterima')
                                <a href="#" class="btn btn-primary">Bayar</a>
                            @else
                                <a href="#" class="btn btn-primary disabled">Bayar</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
