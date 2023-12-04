<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 mt-2 px-4">
                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">Data Pengguna</li>
                        <li class="list-group-item">
                            <span>Nama Lengkap :</span>
                            {{ $result->nama_lengkap }}
                        </li>
                        <li class="list-group-item">
                            <span>Email :</span>
                            {{ $result->email }}
                        </li>
                        <li class="list-group-item">
                            <span>Alamat :</span>
                            {{ $result->kelurahan }},
                            {{ $result->kecamatan }},
                            {{ $result->kabupaten }},
                            {{ $result->provinsi }}
                        </li>
                        <li class="list-group-item">
                            <span>No Hp :</span>
                            {{ $result->no_telpon }}
                        </li>
                        <li class="list-group-item">
                            <span>Status :</span>
                            @if ($result->status_langganan != 'Belum berlangganan')
                                <span class="btn btn-primary btn-sm" onclick="showSweetAlertLangganan()">
                                    Langganan
                                </span>
                            @else
                                <span class="btn btn-danger btn-sm" onclick="showSweetAlertNoLangganan()">
                                    Belum Langganan
                                </span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
