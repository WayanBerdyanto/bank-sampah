@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (session('flash_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-patch-check-fill"></i>
                            Selamat Datang Pengguna <strong>{{ $user }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('success'))
                    <script>
                        Swal.fire({
                            title: 'Success',
                            text: '{{ session('success') }}',
                            icon: 'success',
                            timer: 3000, // Automatically close after 3 seconds
                            showConfirmButton: false,
                            timerProgressBar: true,
                        });
                    </script>
                    @elseif(session('error'))
                        
                    @endif
                    <h4 class="mt-4 mb-3">Dashboard Pengguna</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body py-5">Berat Sampah Yang Di Angkut</div>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="card-footer d-flex">
                                View Details
                                <span class="ms-auto">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-success text-light h-100">
                        <div class="card-body py-5">Sampah Organik</div>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="card-footer d-flex">
                                View Details
                                <span class="ms-auto">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-danger text-white h-100">
                        <div class="card-body py-5">Sampah An-Organik</div>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="card-footer d-flex">
                                View Details
                                <span class="ms-auto">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Data History Pengambilan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Hari</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Berat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Senin</td>
                                            <td>20/11/2023</td>
                                            <td>08.30</td>
                                            <td>3kg</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Rabu</td>
                                            <td>22/11/2023</td>
                                            <td>08.30</td>
                                            <td>3kg</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Jumat</td>
                                            <td>24/11/2023</td>
                                            <td>08.30</td>
                                            <td>3kg</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Minggu</td>
                                            <td>26/11/2023</td>
                                            <td>09.00</td>
                                            <td>3kg</td>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <h3 class="form-label fw-bold">Lokasi Rumah</h3>
                        <div class="card-body" id="map" style="height: 400px">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="bi bi-info-circle-fill text-success"></i>
                    Informasi
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Hi Pengguna <strong>{{ $user }} </strong>, Sampah Yang diangkut Hari ini adalah
                <strong>2Kg</strong>
                Karena yang ambil adalah Paket Mingguan sehingga Batas Berat/hari yang diangkut sebanyak 4kg
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modallogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">
                    <i class="bi bi-exclamation-circle-fill mr-2 text-danger"></i>
                    Logout
                </h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda Yakin Logout dari <strong>{{ $user }}</strong> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="/pengguna/logout">Logout</a>
            </div>
        </div>
    </div>
</div>
