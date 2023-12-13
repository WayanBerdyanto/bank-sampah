@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row mt-4 mx-2">
                <div class="col-md-12 mb-3">
                    <div class="w-100 d-flex justify-content-end">
                        <a href="/pengguna/transaksipembuangan/download" class="btn btn-primary mb-2" target="blank">
                            <i class="bi bi-printer-fill"></i>
                            Cetak Semua</a>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Data History BuangSampah
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Petugas Pengambil</th>
                                            <th>Jenis Sampah</th>
                                            <th>Jam Pengajuan</th>
                                            <th>Hari Pengajuan</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th class="text-center">Status Pengambilan</th>
                                            <th class="text-center">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $item)
                                            <tr>
                                                <td> {{ $loop->iteration }} </td>
                                                <td>{{ $item->nama_lengkap }}</td>
                                                <td>{{ $item->jenis_sampah }}</td>
                                                <td>{{ $item->jam }}</td>
                                                <td>{{ $item->hari }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td class="text-center">
                                                    <span class="fst-italic">{{ $item->status_pengambilan }}</span>
                                                </td>
                                                <td>
                                                    <a href="/pengguna/transaksitertentu/download/{{ $item->id_dtl_pengambilan }}" class="btn btn-primary" target="blank">
                                                        <i class="bi bi-printer-fill"></i>
                                                    </a>
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

        <script>
            function showSweetAlert() {
                Swal.fire({
                    title: "Payment",
                    text: "Scan Here",
                    imageUrl: "https://seeklogo.com/images/Q/qr-code-logo-27ADB92152-seeklogo.com.png",
                    imageWidth: 250,
                    imageHeight: 250,
                    imageAlt: "Custom image"
                });
            }
        </script>
    </main>
@endsection
