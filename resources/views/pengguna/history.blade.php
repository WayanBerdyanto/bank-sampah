@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <h1>Hello History</h1>

                <button onclick="showSweetAlert()">Show SweetAlert</button>

                <script>
                    function showSweetAlert() {
                        Swal.fire({
                            title: 'Hello!',
                            text: 'This is a SweetAlert message.',
                            icon: 'success',
                            confirmButtonText: 'Okay'
                        });
                    }
                </script>
            </div>
        </div>
    </main>

    <div class="modal fade" id="modallogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">
                        <i class="bi bi-exclamation-circle-fill mr-2 text-danger"></i>
                        Logout
                    </h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda Yakin Logout dari <strong>{{ $user }}</strong> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-danger" href="/pengguna/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
