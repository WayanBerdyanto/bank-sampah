@extends('banksampah.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 px-4">
                    <h3 class="mt-3 mb-3 fs-4 fw-semi-bold">Ubah Password
                        <i class="bi bi-person-fill-lock"></i>
                    </h3>
                    <!-- Tambahkan field password baru -->
                    <form action="/banksampah/postubahpassword" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password Sekarang') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="passwordcurrent" type="password" class="form-control" name="current_password" required
                                        autocomplete="new-password">
                                    <button type="button" id="passwordToggle3" class="btn btn-primary">
                                        <i class="bi bi-eye" id="passwordIconTerlihatcurrent"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control" name="new_password" required
                                        autocomplete="new-password">
                                    <button type="button" id="passwordToggle" class="btn btn-primary">
                                        <i class="bi bi-eye" id="passwordIconTerlihat"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <label for="password2"
                                class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password Baru') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="password2" type="password" class="form-control" name="confirm_password"
                                        required autocomplete="new-password">
                                    <button type="button" id="passwordToggle2" class="btn btn-primary">
                                        <i class="bi bi-eye" id="passwordIconTerlihat2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Ubah Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
