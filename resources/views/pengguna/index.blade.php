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
        <h1 class="mb-4 fs-2 fw-bold">Halaman Pengguna</h1>
        <ul class="list-group">
            <li class="list-group-item active" aria-current="true">An active item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">A fourth item</li>
            <li class="list-group-item">And a fifth one</li>
        </ul>
    </section>
@endsection
