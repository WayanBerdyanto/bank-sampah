@extends('pengambil.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <h1>Data Penerimaan Sampah</h1>
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
                                            <th>Aksi</th>
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
                                                <td>
                                                    @if ($item->status_pengambilan == 'Sudah Diambil')
                                                        <form
                                                            action="/pengambil/ambilsampah/{{ $item->id_dtl_pengambilan }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-success" disabled>
                                                                <i class="bi bi-check-square"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form
                                                            action="/pengambil/ambilsampah/{{ $item->id_dtl_pengambilan }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-check-square"></i>
                                                            </button>
                                                        </form>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <span class="mr-2 page-link pagination">
                                    {{ $result->onEachSide(5)->links() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
