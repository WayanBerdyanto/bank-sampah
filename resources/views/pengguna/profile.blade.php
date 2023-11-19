@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/pengguna/">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile Setting</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">

                <div class="col-md-7 mt-2 px-4">
                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">Data Pengguna</li>
                        <li class="list-group-item">
                            <span>Nama Lengkap :</span>
                            {{ $result->nama_lengkap }}
                        </li>
                        <li class="list-group-item">
                            <span>Email :</span>
                            {{ $result->email }}
                        </li>
                        <li class="list-group-item">
                            <span>Alamat :</span>
                            {{ $result->kelurahan }},
                            {{ $result->kecamatan }},
                            {{ $result->kabupaten }},
                            {{ $result->provinsi }}
                        </li>
                        <li class="list-group-item">
                            <span>No Hp :</span>
                            {{ $result->no_telpon }}
                        </li>
                        <li class="list-group-item">
                            <span>Status :</span>
                            <span class="btn btn-primary btn-sm" onclick="showSweetAlert()">
                                Langganan
                            </span>

                            <script>
                                function showSweetAlert() {
                                    Swal.fire({
                                        title: 'Status',
                                        text: '{{ $result->nama_lengkap }} Berlangganan',
                                        icon: 'success',
                                        confirmButtonText: 'Okay'
                                    });
                                }
                            </script>
                        </li>
                    </ul>
                </div>

                <div class="col-md-5 mt-2 px-4 d-flex justify-content-center">
                    <div class="ml-2">
                        <div class="" id="map" style="height: 300px; width: 400px">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <a href="#settings" class="d-flex justify-content-end px-2 text-primary fs-4 text-decoration-none">
                    Profile Settings
                    <i class="px-2 bi bi-gear"></i>
                </a>
            </div>
        </div>
        <div class="row" id="settings">
            <form method="POST" action="/pengguna/postprofile/{{ $result->id }}">
                <div class="col-md-12 mb-3 mt-2 px-4">
                    @csrf
                    @method('PUT')
                    <input type="number" name="id" value="{{ $result->id }}" hidden>
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" class="form-control  @error('username') is-invalid @else is-valid @enderror"
                            id="username" name="username"value="{{ $result->username }}" required>
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="namalengkap" class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namalengkap" name="namalengkap"
                            value="{{ $result->nama_lengkap }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email address</label>
                        <input type="email" class="form-control" name="email" id="email"
                            aria-describedby="emailHelp" value="{{ $result->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="form-label fw-bold">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" id="provinsi" value="Yogyakarta"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="kabupaten" class="form-label fw-bold">Kabupaten</label>
                        <input type="text" class="form-control" name="kabupaten" id="kabupaten"
                            value="{{ $result->kabupaten }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label fw-bold">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan" id="kecamatan"
                            value="{{ $result->kecamatan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label fw-bold">Kelurahan</label>
                        <input type="text" class="form-control" name="kelurahan" id="kelurahan"
                            value="{{ $result->kelurahan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telpon" class="form-label fw-bold">No Telpon</label>
                        <input type="number" class="form-control" name="no_telpon" id="no_telpon"
                            value="{{ $result->no_telpon }}" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="latitudeInput" id="latitudeInput"
                            value="{{ $result->latitude }}" hidden>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="longitudeInput" id="longitudeInput"
                            value="{{ $result->longitude }}" hidden>
                    </div>
                    <div class="mb-3" hidden>
                        <div class="card-body" id="map" style="height: 400px">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 px-4 text-end mb-4">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </main>
@endsection
