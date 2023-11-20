@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
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
                                            <th>Total Sampah</th>
                                            <th>Tanggal</th>
                                            <th>Lokasi Pembuangan</th>
                                            <th>Status</th>
                                            <th>Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>3 Kg</td>
                                            <td>20/11/2023</td>
                                            <td>Bank Sampah 1</td>
                                            <td class="text-success">Diterima</td>
                                            <td><button onclick="showSweetAlert()" class="btn btn-primary"
                                                    type="button">Bayar</button></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>4 Kg</td>
                                            <td>22/11/2023</td>
                                            <td>Bank Sampah 2</td>
                                            <td class="text-warning">Menunggu</td>
                                            <td><button onclick="showSweetAlert()" class="btn btn-primary disabled"
                                                    type="button">Bayar</button></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>10 Kg</td>
                                            <td>24/11/2023</td>
                                            <td>Bank Sampah 3</td>
                                            <td class="text-danger">Ditolak</td>
                                            <td><button onclick="showSweetAlert()" class="btn btn-primary disabled"
                                                    type="button">Bayar</button></td>
                                        </tr>
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
