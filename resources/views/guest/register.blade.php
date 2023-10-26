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
        <form class="w-75 border border-solid p-4 mx-auto">
            <div class="mb-3">
                {{-- HIDDEN --}}
                <input type="text" class="form-control" id="id" name="id" hidden>
            </div>
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukan Nama" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        autocomplete="off" required>
                    <button class="btn btn-outline-primary" type="button" id="passwordToggle">
                        <i class="bi bi-eye" id="passwordIconTerlihat"></i>
                    </button>
                </div>

                <script>
                    const passwordInput = document.getElementById("password");
                    const passwordIcon = document.getElementById("passwordIconTerlihat");
                    const passwordIconHilang = document.getElementById("passwordIconHilang");

                    document.getElementById("passwordToggle").addEventListener("click", function() {
                        if (passwordInput.type === "password") {
                            passwordInput.type = "text";
                            passwordIcon.classList.remove("bi");
                            passwordIcon.classList.remove("bi-eye");
                            passwordIcon.classList.add("bi");
                            passwordIcon.classList.add("bi-eye-slash");
                            
                        } else {
                            passwordInput.type = "password";
                            passwordIcon.classList.add("bi");
                            passwordIcon.classList.add("bi-eye");
                            passwordIcon.classList.remove("bi");
                            passwordIcon.classList.remove("bi-eye-slash");
                        }
                    });
                </script>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan NoHp" required>
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
</body>

</html>
