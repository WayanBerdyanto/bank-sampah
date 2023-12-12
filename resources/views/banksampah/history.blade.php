@extends('banksampah.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center my-3">History Penerimaan</h4 class="text-center my-3">

                    <ul class="nav nav-tabs ml-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pengambilan-tab" data-bs-toggle="tab"
                                data-bs-target="#pengambilan" type="button" role="tab" aria-controls="pengambilan"
                                aria-selected="true">Pengguna</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pembuangan-tab" data-bs-toggle="tab" data-bs-target="#pembuangan"
                                type="button" role="tab" aria-controls="pembuangan"
                                aria-selected="false">Pembuang</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="pengambilan" role="tabpanel"
                            aria-labelledby="pengambilan-tab">
                            @include('banksampah.historypengguna')
                        </div>
                        <div class="tab-pane fade" id="pembuangan" role="tabpanel" aria-labelledby="pembuangan-tab">
                            @include('banksampah.historypembuang')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
