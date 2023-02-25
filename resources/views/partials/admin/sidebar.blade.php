<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="index.html" class="logo logo-light">
        <span class="logo-lg">
            <img src="/assets/images/logo.png" alt="logo">
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
                <li class="side-nav-title">Apps</li>
                
                <li class="side-nav-item">
                    <a href="apps-calendar.html" class="side-nav-link">
                        <i class="uil-calender"></i>
                        <span> kelola Pengaduan </span>
                    </a>
                </li>
                
                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-comments-alt"></i>
                        <span> Tanggapan </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                        <i class="uil-envelope"></i>
                        <span> Kelola Pengaduan </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('petugas.showLaporan') }}">Lihat Laporan</a>
                            </li>
                            <li>
                                <a href="crm-orders-list.html">Orders List</a>
                            </li>
                            <li>
                                <a href="crm-clients.html">Clients</a>
                            </li>
                            <li>
                                <a href="crm-management.html">Management</a>
                            </li>
                        </ul>
                    </div>
                </li>

            @else
            <li class="side-nav-title">Pengguna</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false"
                    aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span> Pengguna </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="/admin/petugas">Petugas</a>
                        </li>
                        <li>
                            <a href="apps-email-read.html">Read Email</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title">Apps</li>
                
                <li class="side-nav-item">
                    <a href="apps-calendar.html" class="side-nav-link">
                        <i class="uil-calender"></i>
                        <span> kelola Pengaduan </span>
                    </a>
                </li>
                
                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-comments-alt"></i>
                        <span> Tanggapan </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                        <i class="uil-envelope"></i>
                        <span> Kelola Pengaduan </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('petugas.showLaporan') }}">Lihat Laporan</a>
                            </li>
                            <li>
                                <a href="crm-orders-list.html">Orders List</a>
                            </li>
                            <li>
                                <a href="crm-clients.html">Clients</a>
                            </li>
                            <li>
                                <a href="crm-management.html">Management</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            <!-- end Help Box -->


        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->