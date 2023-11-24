@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row mt-5 mx-3 mb-3">
                @foreach ($langganan as $data)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold fs-5">{{$data->nama_langganan}}</h5>
                                <ul>
                                    <li>
                                        <i class="bi bi-check-lg text-success"></i>
                                        berat
                                    </li>
                                    <li>
                                        <i class="bi bi-check-lg text-success"></i>
                                        berat
                                    </li>
                                    <li>
                                        <i class="bi bi-check-lg text-success"></i>
                                        berat
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-between mt-2">
                                    <span>Rp
                                        <span class="fs-5 fw-bold">
                                            {{$data->harga}}
                                        </span>
                                    </span>
                                    <a href="#" class="btn btn-primary">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
