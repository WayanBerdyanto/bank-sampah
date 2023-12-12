<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Invoice</title>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;">Dicetak :
                            {{ $today }}</p>
                    </div>
                    <hr>
                </div>

                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                            <p class="pt-0">
                                <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#"><span
                                        class="text-warning">Mobile</span> <span class="text-primary">Trash</span></a>
                            </p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">Nama :
                                    <span class="fw-bold">
                                        {{ $users[0]->nama_lengkap }}
                                    </span>
                                </li>
                                <li class="text-muted">
                                    {{ $users[0]->provinsi }},
                                    {{ $users[0]->kabupaten }},
                                    {{ $users[0]->kecamatan }},
                                    {{ $users[0]->kelurahan }}
                                </li>
                                <li class="text-muted"><i class="fas fa-phone"></i>
                                    {{ $users[0]->no_telpon }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i>
                                    <span class="me-1 fw-bold">Status:</span>
                                    @if ($users[0]->status_langganan != 'Belum berlangganan')
                                        <span class="text-success">
                                            Langganan
                                        </span>
                                    @else
                                        <span class="text-warning">
                                            Belum Langganan
                                        </span>
                                    @endif
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                        <h3>Nota Pengambilan</h3>
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Langganan</th>
                                    <th scope="col">Tanggal Berlangganan</th>
                                    <th scope="col">Masa Langganan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $data[0]->nama_langganan }}</td>
                                        <td>{{ $data[0]->tanggal }}</td>
                                        <td>{{ $data[0]->masa_langganan }}</td>
                                        <td>{{ $data[0]->harga }}</td>
                                        <td>{{ $data[0]->status }}</td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                
                    <hr>
                    <div class="row">
                        <div class="col-xl-10">
                            <p>Terima Kasih Sudah Berlangganan Di Mobile Trash</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
