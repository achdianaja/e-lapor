<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="index.html" class="logo logo-light">
        <span class="logo-lg py-3">
            <h3 class="text-white" alt="dark logo"><span class="text-warning">E - </span>LAPOR</h3>
        </span>
        <span class="logo-sm">
            <img src="/assets/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="index.html" class="logo logo-dark">
        <span class="logo-lg">
            <img src="/assets/images/logo-dark.png" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="/assets/images/logo-dark-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="pages-profile.html">
                <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42"
                    class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">Dominic Keller</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">
            @if(Auth::guard('admin')->user()->level == 'petugas')
            <li class="side-nav-item">
                <a href="{{ route('dashboard.index') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
                <li class="side-nav-title">pengaduan</li>
                

                <li class="side-nav-item">
                    <a href="{{ route('petugas.showLaporan') }}" class="side-nav-link">
                        <i class="uil-comments-alt"></i>
                        <span> Semua pengaduan </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="/admin/kategori" class="side-nav-link">
                        <i class="uil-dialpad"></i>
                        <span> Kelola kategori </span>
                    </a>
                </li>



            @else
            <li class="side-nav-item">
                <a href="{{ route('dashboard.index') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="side-nav-title">Pengguna</li>

            <li class="side-nav-item">
                <a href="/admin/petugas" class="side-nav-link">
                    <i class="uil-user"></i>
                    <span> Petugas / Admin </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.masyarakat') }}" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> Masyarakat </span>
                </a>
            </li>

            <li class="side-nav-title">Pengduan</li>
                <li class="side-nav-item">
                    <a href="{{ route('petugas.showLaporan') }}" class="side-nav-link">
                        <i class="uil-comments-alt"></i>
                        <span> Semua pengaduan </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="/admin/kategori" class="side-nav-link">
                        <i class="uil-dialpad"></i>
                        <span> Kelola kategori </span>
                    </a>
                </li>
            @endif
            <!-- end Help Box -->


        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->