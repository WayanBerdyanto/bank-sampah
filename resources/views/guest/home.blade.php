@extends('guest.layouts.main')
@section('home')
    <main>
        {{-- START HERO --}}
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
            <div class="absolute top-0 w-full h-full bg-center bg-cover"
                style='background-image: url("/img/hero-sampah.jpg");'>
                <span id="blackOverlay" class="w-full h-full absolute opacity-10 bg-white"></span>
            </div>
            <div class="container relative mx-auto text-center flex justify-center">
                <div class="items-center flex flex-wrap justify-center">
                    <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                        <div class="mx-auto">
                            <h1 class="text-white font-semibold text-4xl text-center">
                                Peduli Lingkungan
                            </h1>
                            <p class="mt-4 text-lg text-gray-100 mb-6 text-center">
                                Dengan peduli lingkungan, kita berusaha menciptakan dunia yang lebih seimbang, bersih, dan sehat bagi semua makhluk hidup.
                            </p>
                            <a href="#layanan">
                                <button  class="text-white px-12 py-2 bg-green-600 rounded-lg leading-normal text-lg text-center font-semibold hover:bg-green-500" >Paket Langganan</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END HERO --}}
        <section class="pb-20 bg-gray-100 -mt-24" id="tentang">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap">
                    <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                                    <i class="fa-regular fa-calendar-days text-white"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Menentukan Jadwal Penjemputan</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Bisa Mengatur jadwal
                                    penjemputan dan pengambilan sampah
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-4/12 px-4 text-center">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400">
                                    <i class="fa-regular fa-clipboard text-white"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Langganan</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Buang sampah tanpa memikirkan harga
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400">
                                    <i class="fa-solid fa-binoculars text-light"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Monitoring Sampah</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Pelanggan bisa melihat history pengambilan sampah
                                    dan berat sampah yang diangkut
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="text-3xl mb-4 font-semibold leading-normal text-center">
                    Tentang Kami
                </h3>
                <div class="flex flex-wrap items-center">
                    <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                        <p class="text-lg text-normal leading-relaxed mt-4 mb-4 text-gray-700">
                            <strong class="ml-10">Bank Sampah</strong> adalah Sistem jasa angkut sampah yang membantu
                            untuk menjaga kebersihan lingkungan sekitar. Bank Sampah di bentuk pada Tahun 2023
                            Oleh gabungan Mahasiswa Pecinta Alam Universitas Kristen Duta Wacana (Mapala)
                        </p>
                        <p class="text-lg text-normal leading-relaxed mt-0 mb-4 text-gray-700">
                            <span class="ml-10">Sudah</span> Lebih dari 100 Pengguna di Daerah Istimewa Yogyakarta yang
                            sudah
                            berlangganan di Bank Sampah ini dan
                            Tersebar sudah diseluruh Kabupaten DIY.
                        </p>
                    </div>
                    <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                        <div
                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-slate-900">
                            <div class="flex">
                                <div class="w-1/2 mt-4">
                                    <img alt="Gambar Sampah" src="{{ asset('img/image-about.jpg') }}"
                                        class="w-full h-64 object-contain rounded-tl-lg bg-center" />
                                </div>
                                <div class="w-1/2 mt-4">
                                    <img alt="Gambar Sampah" src="{{ asset('img/image-about.jpg') }}"
                                        class="w-full h-64 object-contain rounded-tr-lg bg-center" />
                                </div>
                            </div>
                            <blockquote class="relative p-8 mb-4">
                                <h4 class="text-xl font-bold text-white">
                                    Komunitas Bank Sampah
                                </h4>
                                <p class="text-md text-normal mt-2 text-white">
                                    Komunitas Bank Sampah Kerjasama dengan Pandawara Group
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-20 pb-48 bg-blue-50" id="layanan">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center text-center mb-24">
                    <div class="w-full lg:w-6/12 px-4">
                        <h2 class="text-4xl font-semibold">Paket Langganan</h2>
                        <p class="text-lg leading-relaxed m-4 text-gray-600">
                            Pilih paket langganan sesuai dengan yang kalian mau
                        </p>
                    </div>
                </div>
                <div class="flex flex-wrap items-center justify-center">
                    <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4 flex items-center justify-center">
                        <div
                            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <h1 class="my-2 text-center text-2xl font-bold">
                                Paket Mingguan
                            </h1>
                            <hr>
                            <div class="px-5 pb-5">
                                <ul class="list-inside mt-2">
                                    <li>
                                        <i class="fa-solid fa-check text-green-500"></i> Berat 5 Kg
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check text-green-500"></i> Berat 5 Kg
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check text-green-500"></i> Berat 5 Kg
                                    </li>
                                </ul>
                                <div class="flex items-center mt-2.5 mb-5">
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl text-gray-900 dark:text-white">
                                        Rp <span class="text-2xl font-bold text-gray-900 dark:text-while">
                                            50.000
                                        </span>
                                    </span>
                                    <a href="#"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                        to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4 flex items-center justify-center">
                        <div
                            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <h1 class="my-2 text-center text-2xl font-bold">
                                Paket Bulanan
                            </h1>
                            <hr>
                            <div class="px-5 pb-5">
                                <ul class="list-inside mt-2">
                                    <li>
                                        <i class="fa-solid fa-check text-green-500"></i> Lorem, ipsum.
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check text-green-500"></i> Lorem, ipsum.
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check text-green-500"></i> Lorem, ipsum.
                                    </li>
                                </ul>
                                <div class="flex items-center mt-2.5 mb-5">
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl text-gray-900 dark:text-white">
                                        Rp <span class="text-2xl font-bold text-gray-900 dark:text-while">
                                            145.000
                                        </span>
                                    </span>
                                    <a href="#"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                        to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4 flex items-center justify-center">
                        <div
                            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                            <h1 class="my-2 text-center text-2xl font-bold">
                                Paket 6 Bulan
                            </h1>
                            <hr>
                            <div class="px-5 pb-5">
                                <ul class="list-inside mt-2">
                                    <li>
                                        <i class="fa-solid fa-check text-green-500"></i> Lorem, ipsum dolor.
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check text-green-500"></i> Lorem, ipsum dolor.
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check text-green-500"></i> Lorem, ipsum dolor.
                                    </li>
                                </ul>
                                <div class="flex items-center mt-2.5 mb-5">
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl text-gray-900 dark:text-white">
                                        Rp <span class="text-2xl font-bold text-gray-900 dark:text-while">
                                            400.000
                                        </span>
                                    </span>
                                    <a href="#"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                        to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4 flex items-center justify-center">
                        <div
                            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <h1 class="my-2 text-center text-2xl font-bold">
                                Paket Tahunan
                            </h1>
                            <hr>
                            <div class="px-5 pb-5">
                                <ul class="list-inside mt-2">
                                    <li>
                                        <i class="fa-solid fa-check text-green-500"></i> Laborum labore hic placeat.
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check text-green-500"></i> Laborum labore hic placeat.
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check text-green-500"></i> Laborum labore hic placeat.
                                    </li>
                                </ul>
                                <div class="flex items-center mt-2.5 mb-5">
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl text-gray-900 dark:text-white">
                                        Rp <span class="text-2xl font-bold text-gray-900 dark:text-while">
                                            700.000
                                        </span>
                                    </span>
                                    <a href="#"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                        to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pb-20 relative block bg-gray-900">
            <div class="container mx-auto px-4 lg:pt-24 lg:pb-64">
                <div class="flex flex-wrap text-center justify-center">
                    <div class="w-full lg:w-6/12 px-4">
                        <h2 class="text-4xl font-semibold text-white">Kontak</h2>
                        <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">
                            Put the potentially record low maximum sea ice extent tihs year
                            down to low ice. According to the National Oceanic and
                            Atmospheric Administration, Ted, Scambos.
                        </p>
                    </div>
                </div>
                <div class="flex flex-wrap mt-12 justify-center">
                    <div class="w-full lg:w-3/12 px-4 text-center">
                        <div
                            class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                            <i class="fas fa-medal text-xl"></i>
                        </div>
                        <h6 class="text-xl mt-5 font-semibold text-white">
                            Excelent Services
                        </h6>
                        <p class="mt-2 mb-4 text-gray-500">
                            Some quick example text to build on the card title and make up
                            the bulk of the card's content.
                        </p>
                    </div>
                    <div class="w-full lg:w-3/12 px-4 text-center">
                        <div
                            class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                            <i class="fas fa-poll text-xl"></i>
                        </div>
                        <h5 class="text-xl mt-5 font-semibold text-white">
                            Grow your market
                        </h5>
                        <p class="mt-2 mb-4 text-gray-500">
                            Some quick example text to build on the card title and make up
                            the bulk of the card's content.
                        </p>
                    </div>
                    <div class="w-full lg:w-3/12 px-4 text-center">
                        <div
                            class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                            <i class="fas fa-lightbulb text-xl"></i>
                        </div>
                        <h5 class="text-xl mt-5 font-semibold text-white">Launch time</h5>
                        <p class="mt-2 mb-4 text-gray-500">
                            Some quick example text to build on the card title and make up
                            the bulk of the card's content.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative block py-24 lg:pt-0 bg-gray-900">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
                    <div class="w-full lg:w-6/12 px-4">
                        <div
                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300">
                            <div class="flex-auto p-5 lg:p-10">
                                <h4 class="text-2xl font-semibold">Want to work with us?</h4>
                                <p class="leading-relaxed mt-1 mb-4 text-gray-600">
                                    Complete this form and we will get back to you in 24 hours.
                                </p>
                                <div class="relative w-full mb-3 mt-8">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                        for="full-name">Full Name</label><input type="text"
                                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                        placeholder="Full Name" style="transition: all 0.15s ease 0s;" />
                                </div>
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                        for="email">Email</label><input type="email"
                                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                        placeholder="Email" style="transition: all 0.15s ease 0s;" />
                                </div>
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                        for="message">Message</label>
                                    <textarea rows="4" cols="80"
                                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                        placeholder="Type a message..."></textarea>
                                </div>
                                <div class="text-center mt-6">
                                    <button
                                        class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                        type="button" style="transition: all 0.15s ease 0s;">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
