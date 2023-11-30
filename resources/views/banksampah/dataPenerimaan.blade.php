@extends('banksampah.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Data Penerimaan Sampah
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengguna</th>
                                            <th>Jenis Sampah</th>
                                            <th>Tgl Pengajuan</th>
                                            <th>Jam Pengajuan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result_master as $idx => $items)
                                            <tr>
                                                <td>{{ $result_master->firstItem() + $idx }}</td>
                                                <td>{{ $items->nama_lengkap }}</td>
                                                <td>{{ $items->jenis_sampah }}</td>
                                                <td>{{ $items->tgl_pengajuan }}</td>
                                                <td>{{ $items->jam_pengajuan }}</td>
                                                <td class="text-center"><a href="/banksampah/detailpenerimaan/{{$items->id_dtl_pembuangan}}"
                                                        class="btn btn-primary">Timbang</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
