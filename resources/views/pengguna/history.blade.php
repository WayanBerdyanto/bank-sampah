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

@endsection
