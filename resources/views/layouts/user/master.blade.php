<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper/saas/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 03:49:17 GMT -->

<head>
    <meta charset="utf-8" />
    <title>E-Lapor | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    @include('component.style')
</head>

<body>

    @include('partials.user.navbar')

    @yield('content')

    <!-- START FOOTER -->
    <footer class="bg-dark py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    {{-- <img src="assets/images/logo.png" alt="logo" class="logo-dark" height="22" /> --}}
                    <h2 class="text-white"><span class="text-warning">E - </span>LAPOR</h2>
                    <ul class="social-list list-inline mt-3">
                        <li class="list-inline-item text-center">
                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                    class="mdi mdi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item text-center">
                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                    class="mdi mdi-google"></i></a>
                        </li>
                        <li class="list-inline-item text-center">
                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                    class="mdi mdi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item text-center">
                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                    class="mdi mdi-github"></i></a>
                        </li>
                    </ul>

                </div>

                {{-- <div class="col-lg-2 col-md-4 mt-3 mt-lg-0">
                        <h5 class="text-light">Kompani</h5>

                        <ul class="list-unstyled ps-0 mb-0 mt-3">
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Laporan</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Pengaduan</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Blog</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Affiliate Program</a></li>
                        </ul>

                    </div> --}}
    </footer>
    <!-- END FOOTER -->
    @include('component.script')
    @yield('js')
</body>


<!-- Mirrored from coderthemes.com/hyper/saas/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 03:49:20 GMT -->

</html>
