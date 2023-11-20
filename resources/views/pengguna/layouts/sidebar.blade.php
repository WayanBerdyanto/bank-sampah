<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3">
                        Bank Sampah
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
                <li class="py-2">
                    <a href="/pengguna/langganan" class="nav-link px-3 {{ $key == 'langganan' ? 'active bg-primary' : '' }}">
                        <span class="mx-2"><i class="fa-solid fa-crown"></i></span>
                        <span>Langganan</span>
                    </a>
                </li>
                <li class="py-2">
                    <a href="/pengguna/history" class="nav-link px-3 {{ $key == 'history' ? 'active bg-primary' : '' }}">
                        <span class="mx-2"><i class="bi bi-clock-history"></i></span>
                        <span>History</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- offcanvas -->
