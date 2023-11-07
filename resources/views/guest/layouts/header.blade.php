<nav class="top-0 fixed z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 bg-slate-800 border-b-1">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
            <a class="text-lg font-bold leading-relaxed inline-block mr-4 py-2 text-white hitespace-nowrap uppercase md:hover:text-slate-600"
                href="">Bank Sampah</a>
            <button
                class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                type="button" onclick="toggleNavbar('example-collapse-navbar')">
                <i class="text-white fas fa-bars"></i>
            </button>
        </div>
        <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
            id="example-collapse-navbar">
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                <li class="flex items-center mx-3">
                    <a class="lg:text-white text-xs md:hover:text-slate-600  text-gray-800 px-3 py-4 lg:py-2 flex items-center uppercase font-bold"
                        href="#">Home</a>
                </li>
                <li class="flex items-center mx-3">
                    <a class="lg:text-white md:hover:text-slate-600 text-xs text-gray-800 px-3 py-4 lg:py-2 flex items-center uppercase font-bold"
                        href="#tentang">Tentang</a>
                </li>
                <li class="flex items-center mx-3">
                    <a class="lg:text-white md:hover:text-slate-600 text-xs text-gray-800 px-3 py-4 lg:py-2 flex items-center uppercase font-bold"
                        href="#layanan">Langganan</a>
                </li>
                <li class="flex items-center mx-3">
                    <a class="lg:text-white md:hover:text-slate-600 text-xs text-gray-800 px-3 py-4 lg:py-2 flex items-center uppercase font-bold"
                        href="#kontak">Kontak</a>
                </li>
                <li class="flex items-center">
                    <a href="/login"
                        class="bg-white text-xs text-gray-800 active:bg-gray-100 font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3">Log
                        in</a>
                </li>
                <li class="flex items-center">
                    <a href="/register"
                        class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3">Register
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
