@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row mt-5 mx-3 mb-3">
                <h1 class="fw-bold mb-2 fs-4">User : {{ Auth::User()->nama_lengkap }}</h1>
                @if (Auth::User()->status_langganan == 'Sudah Langganan')
                    <a href="" class="btn btn-primary mb-2">Cetak</a>
                @endif
                <div class="table-responsive">
                    <form action="/pengguna/langganan/postCheckout" method="POST">
                        @csrf
                        <table class="table table-striped data-table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Lama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Methode Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        {{ $result_detail->nama_langganan }}
                                    </th>
                                    <td>
                                        {{ $result_detail->lama_langganan }} Hari
                                    </td>
                                    <td>
                                        {{ $result_detail->harga }}
                                    </td>
                                    <td>
                                        {{ $result_detail->status }}
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" name="methode" value="Gopay" id="option1"> Gopay
                                        </label>

                                        <label>
                                            <input type="radio" name="methode" value="Shopie Pay" id="option2"> Shopie
                                            Pay
                                        </label>

                                        <label>
                                            <input type="radio" name="methode" value="Dana" id="option3"> Dana
                                        </label>

                                        <label>
                                            <input type="radio" name="methode" value="Cash" id="option4"> Cash
                                        </label>


                                        <script>
                                            function selectOption(optionId) {
                                                document.getElementById(optionId).checked = true;
                                            }
                                        </script>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Bayar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-header">
                                                <span class="fw-bold">Mulai Langganan : {{ $tanggal }}</span>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" name="id_dtl"
                                                    value="{{ $result_detail->id_dtl_langganan }}">
                                                <span class="d-block fw-bold">Harga : {{ $result_detail->harga }}</span>
                                                <span class="d-block fw-bold">Lama Masa Langganan :
                                                    {{ $masa_langganan }}</span>
                                                <p>
                                                    Dengan ini, saya menyatakan bahwa saya telah membaca dan memahami syarat
                                                    dan
                                                    ketentuan langganan ini. Saya dengan sukarela menyetujui untuk bergabung
                                                    dan
                                                    menggunakan layanan yang disediakan. Saya juga memahami bahwa saya dapat
                                                    dikenai
                                                    biaya sesuai dengan tarif yang berlaku. Terima kasih
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Langganan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>




            </div>
        </div>
    </main>
@endsection
