@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row mt-4 mx-2">
                <div class="col-md-12 mb-3">
                    <div class="w-100 d-flex justify-content-between">
                        <a href="#" class="btn btn-success mb-2" target="blank">
                            <i class="bi bi-arrow-down-circle"></i>
                            Cetak</a>
                        <a href="#" class="btn btn-success mb-2" target="blank">
                            <i class="bi bi-arrow-down-circle"></i>
                            Cetak</a>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> History Langganan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Langganan</th>
                                            <th>Tanggal Langganan</th>
                                            <th>Masa Langganan</th>
                                            <th>Status Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $idx => $item)
                                            <tr>
                                                <td>{{ $result->firstItem() + $idx }}</td>
                                                <td>{{ $item->nama_langganan }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->masa_langganan }} Kg</td>
                                                <td>{{ $item->status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <span class="mr-2 page-link pagination">
                                    {{ $result->onEachSide(5)->links() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function showSweetAlert() {
                Swal.fire({
                    title: "Payment",
                    text: "Scan Here",
                    imageUrl: "https://seeklogo.com/images/Q/qr-code-logo-27ADB92152-seeklogo.com.png",
                    imageWidth: 250,
                    imageHeight: 250,
                    imageAlt: "Custom image"
                });
            }
        </script>
    </main>
@endsection
