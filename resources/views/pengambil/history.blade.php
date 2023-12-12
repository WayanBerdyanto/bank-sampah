@extends('pengambil.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
            <ul class="nav nav-tabs ml-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pengambilan-tab" data-bs-toggle="tab" data-bs-target="#pengambilan"
                        type="button" role="tab" aria-controls="pengambilan" aria-selected="true">Pengambilan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pembuangan-tab" data-bs-toggle="tab" data-bs-target="#pembuangan"
                        type="button" role="tab" aria-controls="pembuangan" aria-selected="false">Pembuangan</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="pengambilan" role="tabpanel" aria-labelledby="pengambilan-tab">
                    @include('pengambil.historypengambilan')
                </div>
                <div class="tab-pane fade" id="pembuangan" role="tabpanel" aria-labelledby="pembuangan-tab">
                    cek
                </div>
            </div>
    </main>
@endsection
