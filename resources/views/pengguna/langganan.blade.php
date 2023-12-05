@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row mt-5 mx-3 mb-3">
                @foreach ($langganan as $data)
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold fs-5">{{ $data->nama_langganan }}</h5>
                                @php
                                    $items = explode(',', $data->layanan);
                                @endphp
                                <ul>
                                    @foreach ($items as $item)
                                        <li>
                                            <i class="bi bi-check-lg text-success"></i>
                                            {{ trim($item) }}
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="d-flex justify-content-between mt-2">
                                    <span>Rp
                                        <span class="fs-5 fw-bold">
                                            {{ $data->harga }}
                                        </span>
                                    </span>
                                    <a href="/pengguna/langganan/{{ $data->kode_langganan }}" class="btn btn-primary">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
