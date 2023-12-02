@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row mt-4 mx-2">
                <div class="col-md-12 mb-3">
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
                                            <th>Berat Sampah</th>
                                            <th>Tanggal</th>
                                            <th>Lokasi Pembuangan</th>
                                            <th>Status</th>
                                            <th>Status Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result_master as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->berat_sampah }}</td>
                                            <td>{{ $item->tgl_pengajuan }}</td>
                                            <td>{{ $item->nama_lengkap }}</td>
                                            <td>{{ $item->status_terima }}</td>
                                            <td>{{ $item->status_bayar }}</td>
                                            {{-- <td>{{ $item->status_bayar }}</td> --}}
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
