<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrasi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="container w-100 mx-auto mt-3">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrasi</li>
            </ol>
        </nav>
    </div>
    <div class="container w-100 p-4">
        <form class="w-75 border border-solid p-4 mx-auto" method="POST" action="/postRegister">
            @csrf
            <div class="mb-3">
                {{-- HIDDEN --}}
                <input type="text" class="form-control" id="id" name="id" hidden>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username"
                    required value="{{ old('username') }}">
            </div>
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                    placeholder="Masukan Nama" required value="{{ old('nama_lengkap') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email"
                    required value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        autocomplete="off" required value="{{ old('password') }}">
                    <button class="btn btn-outline-primary" type="button" id="passwordToggle">
                        <i class="bi bi-eye" id="passwordIconTerlihat"></i>
                    </button>
                </div>
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Password"
                        autocomplete="off" required value="{{ old('password2') }}">
                    <button class="btn btn-outline-primary" type="button" id="passwordToggle2">
                        <i class="bi bi-eye" id="passwordIconTerlihat2"></i>
                    </button>
                </div>
                @if (session('flash_error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        <strong> {{ session('flash_error') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                @endif
            </div>
            <input type="text" class="form-control" id="role" name="role" hidden>
            <div class="mb-3">
                <label for="no_telpon" class="form-label">No HP</label>
                <input type="number" class="form-control" id="no_telpon" name="no_telpon" placeholder="Masukan NoHp"
                    required value="{{ old('no_telpon') }}">
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/password.js') }}"></script>
</body>

</html>
