@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="/pengguna/">Dashboard</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Profile Setting</li>
                        </ol>
                      </nav>
                    <h2 class="text-center mt-4">Profile Settings</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3 mt-2 px-4">
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label fw-bold">Username</label>
                            <input type="text" class="form-control" id="username" name="username"value="{{ $result->username }}">
                        </div>
                        <div class="mb-3">
                            <label for="namalengkap" class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" id="namalengkap" name="namalengkap" value="{{ $result->nama_lengkap }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $result->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="provinsi" class="form-label fw-bold">Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" id="provinsi" value="Yogyakarta" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="kabupaten" class="form-label fw-bold">Kabupaten</label>
                            <input type="text" class="form-control" name="kabupaten" id="kabupaten" value="{{ $result->kabupaten }}">
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label fw-bold">Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="{{ $result->kecamatan }}">
                        </div>
                        <div class="mb-3">
                            <label for="kelurahan" class="form-label fw-bold">Kelurahan</label>
                            <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="{{ $result->kelurahan }}">
                        </div>
                        <div class="mb-3">
                            <label for="no_telpon" class="form-label fw-bold">No Telpon</label>
                            <input type="text" class="form-control" name="no_telpon" id="no_telpon" value="{{ $result->no_telpon }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Lokasi Rumah</label>
                            <div class="card-body" id="map" style="height: 400px">

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
