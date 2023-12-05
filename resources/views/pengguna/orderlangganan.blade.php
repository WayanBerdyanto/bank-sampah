@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row mt-5 mx-3 mb-3">
                <form action="/pengguna/langganan/checkout" method="POST">
                    @csrf
                    <h1 class="fw-bold fs-4 mb-3">Checkout Paket</h1>
                    <input type="text" readonly class="form-control-plaintext" id="kode_langganan"
                        value="{{ $langganan[0]->kode_langganan }}" name="kode_langganan" hidden>
                    <div class="mb-3 row">
                        <label for="namapaket" class="col-sm-2 col-form-label">Nama Paket</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="namapaket"
                                value=": {{ $langganan[0]->nama_langganan }}" name="lama_langganan">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="layanan" class="col-sm-2 col-form-label">Layanan</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="layanan"
                                value=": {{ $langganan[0]->layanan }}" name="layanan">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="lamalangganan" class="col-sm-2 col-form-label">Lama Langganan</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="lamalangganan"
                                value=": {{ $langganan[0]->lama_langganan }}" name="lama_langganan">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="harga"
                                value="{{ $langganan[0]->harga }}" name="harga">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <button type="submit" class="btn btn-primary">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
