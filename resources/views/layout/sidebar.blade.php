<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('akun*') ? 'active' : '' }}" href="{{ url('akun') }}">
                    <span data-feather="users"></span>
                    User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('kategori') ? 'active' : '' }}" href="{{ url('kategori') }}">
                    <span data-feather="tag"></span>
                    Category
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('barang') ? 'active' : '' }}" href="{{ url('barang') }}">
                    <span data-feather="shopping-cart"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('barangMasuk') ? 'active' : '' }}" href="{{ url('barangMasuk') }}">
                    <span data-feather="bar-chart-2"></span>
                    Supply Income
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Integrations
                </a>
            </li>
        </ul>

        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                </a>
            </li>
        </ul>
    </div>
</nav>
