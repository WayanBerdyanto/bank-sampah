@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <form action="">
                        <h4 class="mb-3 fs-4 fw-bold">Input Buang sampah</h4>
                        <div class="mb-3 row">
                            <label for="berat" class="col-sm-2 col-form-label">Berat Sampah (kg)</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="berat" placeholder="Contoh : 3">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis" class="col-sm-2 col-form-label">Jenis Sampah</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Jenis Sampah</option>
                                    <option value="organik">Sampah Basah (Organik)</option>
                                    <option value="anorganik">Sampah Padat (Anorganik) </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis" class="col-sm-2 col-form-label">Lokasi Pembuangan</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Lokasi Pembuangan</option>
                                    <option value="banksampah1">Bank Sampah 1</option>
                                    <option value="banksampah2">Bank Sampah 2</option>
                                    <option value="banksampah3">Bank Sampah 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="jenis" class="col-sm-2 col-form-label">Pilih Jam</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">08.00</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">09.30</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio3" value="option2">
                                    <label class="form-check-label" for="inlineRadio3">11.30</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio4" value="option2">
                                    <label class="form-check-label" for="inlineRadio4">13.30</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio5" value="option2">
                                    <label class="form-check-label" for="inlineRadio5">15.30</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 px-4 text-end mb-4">
                            <button type="submit" class="btn btn-primary px-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <h3 class="form-label fw-bold">Lokasi Pembuangan Sampah</h3>
                        <div id="userLabel" data-user-label="{{ $user }}"></div>
                        <div class="card-body" id="maplabel" style="height: 400px">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
