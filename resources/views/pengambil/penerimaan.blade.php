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
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $idx => $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $item->nama_lengkap }}</td>
                                                <td>{{ $item->jenis_sampah }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->jam }}</td>
                                                <td>{{ $item->status_pengambilan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
