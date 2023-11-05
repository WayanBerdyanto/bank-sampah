@extends('pengguna.layouts.main')
@section('content')
    <section class="margin-content">
        @if (session('flash_success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-patch-check-fill"></i>
                <strong> {{ session('flash_success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
        @endif
        <div class="row vh-100 ">
            <div class="col-md-4 border border-dark ">
                <h1>User</h1>
            </div>
            <div class="col-md-4 border border-dark">
                <h1>Map</h1>
            </div>
            <div class="col-md-4 border border-dark ">
                <h1>Tanggal</h1>
            </div>
            <div class="col-md-8 border border-dark w-50">
                {!! $chart->container() !!}
            </div>
            <div class="col-md-4 border border-dark">
                <h1>Grafik</h1>
            </div>
        </div>
    </section>
@endsection
