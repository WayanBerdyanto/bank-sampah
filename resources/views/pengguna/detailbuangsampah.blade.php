@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row mt-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
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
                            <span><i class="bi bi-table me-2"></i></span> Detail Pembuangan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Id Buang</th>
                                            <th>Status</th>
                                            <th class="text-center">Berat Sampah</th>
                                            <th class="text-center">Tanggal Terima</th>
                                            <th class="text-center">Jam Penerimaan</th>
                                            <th class="text-center">Hari Terima</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detail as $items)
                                            <tr>
                                                <td> {{ $items->id_master_pembuangan }} </td>
                                                <td> {{ $items->status }} </td>
                                                <td class="text-center"> {{ $items->berat_sampah }} </td>
                                                <td class="text-center"> {{ $items->tanggal }} </td>
                                                <td class="text-center"> {{ $items->jam_penerimaan }} </td>
                                                <td class="text-center"> {{ $items->hari }} </td>
                                                <td class="text-center">
                                                    <a href="/pengguna/transaksi" class="btn btn-primary py-2">Lihat</a>
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
