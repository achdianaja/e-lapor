<!-- NAVBAR START -->
<nav class="navbar navbar-expand-lg py-lg-3 navbar-dark">
    <div class="container">

        <!-- logo -->
        <a href="/" class="navbar-brand me-lg-5">
            <h4><span class="text-warning">E - </span>LAPOR</h4>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>

        <!-- menus -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <!-- left menu -->
            <ul class="navbar-nav me-auto align-items-center">
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="/dashboard">Laporan</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="#">Pengaduan</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="#">FAQs</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="#">Clients</a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>

            <!-- right menu -->
            <ul class="navbar-nav ms-auto align-items-center">
                @if (Auth::guard('masyarakat')->check())
                <li>
                    <div class="btn-group dropstart">
                        <a type="button" class="text-white  dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ Auth::guard('masyarakat')->user()->nama }}

                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('pekat.laporan') }}">Laporan Saya</a>
                            <a class="dropdown-item" href="#">Edit Profile</a>
                            <a class="dropdown-item" href="{{ url('/home') }}" class="text-sm text-light">home</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">logout</a>
                        </div>
                    </div>

                </li>
                @else

                <li class="nav-item align-items-center">
                    <a href="/formlogin" class="nav-link d-lg-none ">
                        login
                    </a>
                </li>

                <li>
                    <a href="/register" class="nav-link d-lg-none ">
                        register
                    </a>
                </li>

                <li class="nav-item me-1">
                    <a href="/formlogin" class="btn btn-light btn-sm  rounded-pill d-none d-lg-inline-flex">
                        login
                    </a>
                </li>
                <li class="nav-item me-0">
                    <a href="/register" class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex">
                        register
                    </a>
                </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
<!-- NAVBAR END -->
