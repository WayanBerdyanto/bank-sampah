@extends('banksampah.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Data History Pembuangan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Tanggal</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>123</td>
                                            <td>20/11/2023</td>
                                            <td><a href="/banksampah/dataPenerimaan/detailPenerimaan" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>457</td>
                                            <td>22/11/2023</td>
                                            <td><a href="/banksampah/dataPenerimaan/detailPenerimaan" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>233</td>
                                            <td>24/11/2023</td>
                                            <td><a href="/banksampah/dataPenerimaan/detailPenerimaan" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>444</td>
                                            <td>26/11/2023</td>
                                            <td><a href="/banksampah/dataPenerimaan/detailPenerimaan" class="btn btn-primary">Detail</a></td>
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
    </main>
@endsection
