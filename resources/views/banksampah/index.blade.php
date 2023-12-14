@extends('banksampah.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (Auth::User()->provinsi == null && Auth::User()->kabupaten == null)
                        <div class="alert alert-warning" role="alert">
                            Anda Belum Melengkapi Profile <a href="/pengguna/profilesetting" class="text-primary">Lengkapi</a>
                        </div>
                    @endif
                    <h3 class="text-center my-3 fw-bold fs-4">Dashboard Bank Sampah</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card bg-blue-600 text-light" style="height:330px">
                        <div class="card-header text-center fw-bold mb-1">
                            Perbandingan Sampah Yang Masuk
                        </div>
                        <div class="card-body px-4 text-dark">
                            {!! $barchart->container() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card bg-green-500 text-light" style="height: 330px">
                        <div class="card-header text-center fw-bold mb-1">
                            Jenis Sampah Yang Masuk
                        </div>
                        <div class="card-body px-4">
                            {!! $chart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div>
                        <h4 class="my-3">Sisa Kapasitas Sampah</h4>
                        <div class="progress mb-2">
                            <div class="progress-bar" role="progressbar" style="width: {{ $format }}%;"
                                aria-valuenow="{{ $format }}" aria-valuemin="0" aria-valuemax="{{ $kapasitas }}">
                                {{ $format }} Kg </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('charts')
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
    <script src="{{ $barchart->cdn() }}"></script>
    {{ $barchart->script() }}
@endsection
