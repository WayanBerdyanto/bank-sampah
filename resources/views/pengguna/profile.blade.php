@extends('pengguna.layouts.main')
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5 mt-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4 bg-dark">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid mx-auto" style="width: 150px;">
                            <h5 class="my-3">John Smith</h5>
                            <p class="text-muted mb-1">Full Stack Developer</p>
                            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0 ">
                            <ul class="list-group list-group-flush rounded-3">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center p-3 bg-dark
                                text-light border border-light">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://mdbootstrap.com</p>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center p-3 bg-dark
                                text-light border border-light">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center p-3 bg-dark
                                text-light border border-light">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                    <p class="mb-0">@mdbootstrap</p>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4 mb-md-0 bg-dark text-light">
                        <div class="card-body">
                            <div class="d-flex justify-content-between h4">
                                <p class="mb-4"><span class="text-light">Profile Setting</span>
                                </p>
                                <a class="text-light mb-4" href="#">
                                    <i class='bx bxs-edit'></i>
                                    Edit
                                </a>
                            </div>
                            <hr class="text-seconday">
                            <form>
                                <div class="mb-3 mt-3 row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control text-light bg-transparent"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Email"
                                            value="{{ Auth::user()->email ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="kabupaten" class="form-label">Kabupaten</label>
                                        <input type="text" class="form-control text-light bg-transparent" id="kabupaten"
                                            name="kabupaten" placeholder="Masukan Kabupaten" required
                                            value="{{ Auth::user()->kabupaten ?? old('kabupaten') }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control text-light text-light bg-transparent"
                                            id="nama_lengkap" name="nama_lengkap" placeholder="Masukan Nama" required
                                            value="{{ Auth::user()->nama_lengkap ?? old('nama_lengkap') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                        <input type="text" class="form-control text-light bg-transparent" id="kecamatan"
                                            name="kecamatan" placeholder="Masukan Kecamatan" required
                                            value="{{ Auth::user()->kecamatan ?? old('kecamatan') }}">
                                    </div>

                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label for="no_telpon" class="form-label">No HP</label>
                                        <input type="number" class="form-control text-light bg-transparent" id="no_telpon"
                                            name="no_telpon" placeholder="Masukan NoHp" required
                                            value="{{ Auth::user()->no_telpon ?? old('no_telpon') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kelurahan" class="form-label">Kelurahan</label>
                                        <input type="text" class="form-control text-light bg-transparent" id="kelurahan"
                                            name ="kelurahan" placeholder="Masukan Kelurahan" required
                                            value="{{ Auth::user()->kelurahan ?? old('kelurahan') }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label for="Latitude" class="form-label">Latitude</label>
                                        <input type="text" class="form-control text-light bg-transparent" id="latitude"
                                            name="latitude" placeholder="Masukan Latitude" required
                                            value="{{ Auth::user()->Latitude ?? old('Latitude') }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Longitude" class="form-label">Longitude</label>
                                        <input type="text" class="form-control text-light bg-transparent"
                                            id="longitude" name="longitude" placeholder="Masukan Longitude" required
                                            value="{{ Auth::user()->Longitude ?? old('Longitude') }}" readonly>
                                    </div>

                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-12">
                                        <div class="container w-100" id="myMap" style="height: 400px"></div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="" class="btn btn-primary mr-2">Save</button>
                                    <button type="" class="btn btn-danger ">Cancel</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
