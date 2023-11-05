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

        <h1 class="mb-4 mx-4 fs-4 fw-bold">Data Sampah</h1>
        <div class=" mx-4 d-flex">
            <div class="bg-green-700 text-center text-light card w-50 p-1 mr-2">
                Organik
                <span class="mt-4">50</span>
            </div>
            <div class="bg-red-700 text-light text-center card w-50 p-1">
                An-Organik
                <span class="mt-4">20</span>
            </div>
        </div>

        {{-- <div class="chart-container">
            {!! $chart->container() !!}
        </div> --}}

    </section>
@endsection
