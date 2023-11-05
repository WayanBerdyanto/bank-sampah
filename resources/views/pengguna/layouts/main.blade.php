<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    {{-- ==========TAILD WIND LINK CDN FOR GRAFIK========== --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- =========BOOTSTRAP 5 LINK CDN FOR CONTENT MAIN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- =========LINK ICONS BOOTSTRAP =========== --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <title>Dashboard pengguna</title>
</head>

<body>
    <!--========== HEADER ==========-->
    <header class="header" style="background-color: #fff">
        <div class="header__container">
            <a href="#" class="header__logo fs-5 mr-4">BankSampah</a>
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
            <div class="dropdown">
                <button class="btn btn-light" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown button
                </button>
                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenuButton2">
                  <li><a class="dropdown-item active" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
              </div>
        </div>
    </header>


    <!--========== NAV ==========-->
    <div class="nav" id="navbar" style="background-color: #141E46">
        @include('pengguna.layouts.sidebar')
    </div>

    <!--========== CONTENTS ==========-->
    <main class="row vh-100">
        @yield('content')
    </main>

    <!--========== MAIN JS ==========-->
    <script src="{{ asset('js/main.js') }}"></script>
    {{-- ======= LINK SCRIPT BOOTSTRAP 5 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
</body>

</html>
