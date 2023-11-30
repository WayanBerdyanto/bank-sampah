<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3">
                        Pengguna
                    </div>
                </li>
                <li>
                    <a href="/pengguna" class="nav-link px-3 mt-4 {{ $key == 'index' ? 'active bg-primary' : '' }}">
                        <span class="mx-2"><i class="bi bi-speedometer2"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="my-2">
                    <hr class="dropdown-divider bg-light" />
                </li>
                @if ($result->status == 'Sudah berlangganan')
                    <li class="py-2">
                        <a class="nav-link px-3" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <span class="mx-2"><i class="bi bi-list"></i></i></span>
                            <span>Menu Langganan</span>
                        </a>
                        <div class="collapse px-3 ml-4" id="collapseExample">
                            <a href="/pengguna/buanglangganan"
                                class="nav-link {{ $key == 'buanglangganan' ? 'active bg-primary' : '' }}">
                                <span class="mx-2"><i class="bi bi-trash"></i></span>
                                <span>Buang Sampah</span>
                            </a>
                            <a href="/pengguna/transaksi" class="nav-link">
                                <span class="mx-2"><i class="fa-solid fa-clock-rotate-left"></i></span>
                                <span>Transaksi</span>
                            </a>
                        </div>
                    </li>
                @else
                    <li class="py-2">
                        <a href="/pengguna/buangsampah"
                            class="nav-link px-3 {{ $key == 'buangsampah' ? 'active bg-primary' : '' }}">
                            <span class="mx-2"> <i class="bi bi-trash"></i>
                            </span>
                            <span>Buang Sampah</span>
                        </a>
                    </li>

                    <li class="py-2">
                        <a href="/pengguna/langganan"
                            class="nav-link px-3 {{ $key == 'langganan' ? 'active bg-primary' : '' }}">
                            <span class="mx-2"><i class="fa-solid fa-crown"></i></span>
                            <span>Langganan</span>
                        </a>
                    </li>
                @endif

                <li class="py-2">
                    <a href="/pengguna/transaksi"
                        class="nav-link px-3 {{ $key == 'transaksi' ? 'active bg-primary' : '' }}">
                        <span class="mx-2"><i class="fa-solid fa-clock-rotate-left"></i></span>
                        <span>Transaksi</span> 
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- offcanvas -->
