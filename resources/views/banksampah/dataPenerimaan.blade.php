@extends('banksampah.layouts.main')
@section('content')
    <main class="mt-5 pt-3 p-4">
        <ul class="nav nav-tabs ml-4" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pengguna-tab" data-bs-toggle="tab" data-bs-target="#pengguna"
                    type="button" role="tab" aria-controls="pengguna" aria-selected="true">Pengguna</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pengambil-tab" data-bs-toggle="tab" data-bs-target="#pengambil"
                    type="button" role="tab" aria-controls="pengambil" aria-selected="false">Pengambil</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="pengguna" role="tabpanel" aria-labelledby="pengguna-tab">
                @include('banksampah.penerimaanpengguna')
            </div>
            <div class="tab-pane fade" id="pengambil" role="tabpanel" aria-labelledby="pengambil-tab">
                @include('banksampah.penerimaanpengambil')
            </div>
        </div>
    </main>
@endsection
