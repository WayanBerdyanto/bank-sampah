@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row mt-4 mx-2">
                <div class="col-md-12 mb-3">
                    <a href="/pengguna/transaksi/download" class="btn btn-success mb-2" target="blank">
                        <i class="bi bi-printer-fill"></i>
                        Cetak</a>
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Transaksi Pembuangan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Lokasi Pembuangan</th>
                                            <th>Berat Sampah</th>
                                            <th>Tanggal</th>
                                            <th>Status Bayar</th>
                                            <th>Print</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result_master as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_lengkap }}</td>
                                                <td>{{ $item->berat_sampah }} Kg</td>
                                                <td>{{ $item->tgl_pengajuan }}</td>
                                                <td>{{ $item->status_bayar }}</td>
                                                <td>
                                                    <a href="" class="btn btn-success">
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
