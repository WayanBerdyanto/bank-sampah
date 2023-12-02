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
                                @if ($result_master[0]->status_bayar == 'Lunas')
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        data-id="{{ $result_master[0]->id_master_pembuangan }}" disabled>
                                        Bayar
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        data-id="{{ $result_master[0]->id_master_pembuangan }}">
                                        Bayar
                                    </button>
                                @endif


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="/pengguna/bayar/{{ $result_master[0]->id_master_pembuangan }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="card  w-100">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">Harga :
                                                                Rp.{{ $result_master[0]->total }}
                                                            </li>
                                                            <li class="list-group-item">
                                                                Berat Sampah : {{ $result_master[0]->berat_sampah }} Kg
                                                            </li>
                                                            <li class="list-group-item">
                                                                Lokasi Pembuangan :
                                                                {{ $result_master[0]->lokasi_pembuangan }}
                                                            </li>
                                                            <li class="list-group-item">
                                                                Jenis Sampah : {{ $result_master[0]->jenis_sampah }}
                                                            </li>
                                                            <li class="list-group-item">
                                                                Tanggal Terima : {{ $result_master[0]->tanggal }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <input type="text" name="status_bayar" hidden>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Bayar</button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
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
