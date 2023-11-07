<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body class="bg-slate-200">
    <nav class="flex mt-5 ml-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-gray-900">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="/login"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-gray-900">Login</a>
                </div>
            </li>
        </ol>
    </nav>

    @if (session('flash_error'))
        <div id="alert-2"
            class="flex items-center p-3 mb-4 text-white bg-red-50 dark:bg-red-500 mt-4"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                Username atau password anda salah
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 text-white rounded-lg p-1.5 inline-flex items-center justify-center h-8 w-8 dark:text-red-400"
                data-dismiss-target="#alert-2" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        <script>
            document.querySelector("[data-dismiss-target='#alert-2']").addEventListener("click", function() {
                var alert = document.getElementById("alert-2");
                alert.style.display = "none";
            });
        </script>
    @endif

    <div class="w-full h-full flex justify-center mt-32">
        <form class="bg-white shadow-md rounded px-20 pt-6 pb-8 mb-4 ring-2 ring-blue-400 ring-offset-4 ring-offset-slate-50 dark:ring-offset-slate-200 relative group transition-all duration-300 transform hover:scale-105" method="POST"
            action="/loginpengguna">
            @csrf
            <h1 class="text-center text-2xl font-semibold mb-4">Form Login</h1>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="username" type="text" name="username" placeholder="Username" required
                    value="{{ old('no_telpon') }}">
            </div>
            <div class="mb-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <div class="relative">
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline pr-10"
                        id="password" type="password" name="password" placeholder="******************">
                    <button type="button" id="passwordToggle"
                        class="absolute inset-y-4 top-1 right-1 flex items-center justify-end px-4">
                        <i class="bi bi-eye" id="passwordIconTerlihat"></i>
                    </button>
                </div>

            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 w-full px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Sign In
                </button>
            </div>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 text-center w-full mt-3"
                href="/register">
                Belum Punya Akun?
            </a>
        </form>
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

</body>

</html>
