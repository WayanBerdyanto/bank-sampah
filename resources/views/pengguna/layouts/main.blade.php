<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    </link>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/color.css') }}">

    <title>Pengguna Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
                aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#"><span
                    class="text-warning">Mobile</span> <span class="text-primary">Trash</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
                aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
                <form class="d-flex ms-auto my-3 my-lg-0">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item py-2 {{ $key == 'profilesettings' ? 'active bg-primary' : '' }}" href="/pengguna/profilesetting">
                                    <i class="fa-solid fa-address-card mr-3"></i>
                                    Profile
                                </a>
                            </li>
                            <li>

                                <a class="dropdown-item py-2 {{ $key == 'ubahpassword' ? 'active bg-primary' : '' }}" href="/pengguna/ubahpassword">
                                    <i class="fa-solid fa-user-pen mr-3"></i>
                                    Ubah Passowrd</a>
                            </li>
                            <li>
                                <button class="btn dropdown-item py-2" data-bs-toggle="modal"
                                    data-bs-target="#modallogout">
                                    <i class="fa-solid fa-right-from-bracket mr-3"></i>
                                    <span>Logout</span>
                                </button>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @include('pengguna.layouts.sidebar')

    @yield('content')

    @yield('charts')

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

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>

    <script src="{{ asset('js/password.js') }}"></script>
    <script src="{{ asset('js/map.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6gdhH-9Asec5cxoNt4XMEZ6GLGMeajLw&callback=initMap"></script>
    <script src="https://cdn.jsdelivr.net/gh/somanchiu/Keyless-Google-Maps-API@v6.3/mapsJavaScriptAPI.js" async defer>
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('sweetalert::alert')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/password.js') }}"></script>


    


</body>

</html>
