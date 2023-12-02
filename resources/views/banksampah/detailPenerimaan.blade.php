@extends('banksampah.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="/banksampah/terimasampah/{{ $detail[0]->id_dtl_pembuangan }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h4 class="mb-3 mt-2 fs-4 fw-bold">Input Buang sampah</h4>
                        <div class="mb-3 row" hidden>
                            <label for="jenis" class="col-sm-2 col-form-label">ID Buang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly
                                    value="{{ $detail[0]->id_dtl_pembuangan }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="berat" class="col-sm-2 col-form-label">Berat</label>
                            <div class="col-sm-10">
                                <input type="number" name="berat" id="berat" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" name="harga" id="harga" class="form-control"
                                    value="{{ $detail[0]->harga }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="total" class="col-sm-2 col-form-label">Total</label>
                            <div class="col-sm-10">
                                <input type="number" name="total" id="total" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row" hidden>
                            <label for="jam" class="col-sm-2 col-form-label">Pilih Jam</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="text" name="jam_penerimaan" id="jam"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var jamInput = document.getElementById('jam');

                                var currentTime = new Date();

                                var formattedTime = currentTime.getHours() + ':' + currentTime.getMinutes() + ':' + currentTime
                                    .getSeconds();

                                jamInput.value = formattedTime;
                            });
                        </script>
                        <!-- Add this in the head of your HTML file -->
                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                        <script>
                            $(document).ready(function() {
                                // Attach an input event listener to the berat input field
                                $('#berat').on('input', function() {
                                    calculateTotal();
                                });

                                // Attach an input event listener to the harga input field
                                $('#harga').on('input', function() {
                                    calculateTotal();
                                });

                                function calculateTotal() {
                                    // Get the values of berat and harga
                                    var berat = parseFloat($('#berat').val());
                                    var harga = parseFloat($('#harga').val());
                                    var total = isNaN(berat) ? 0 : berat * harga;
                                    $('#total').val(total);
                                }
                            });
                        </script>

                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end">
                                <a href="/banksampah/hapusterima/{{ $detail[0]->id_dtl_pembuangan }}"
                                    class="btn btn-danger mx-3">Tolak</a>
                                <button type="submit" class="btn btn-primary">Terima</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
