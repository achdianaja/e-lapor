<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper/saas/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 03:49:14 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="/assets/js/hyper-config.js"></script>

    <!-- App css -->
    <link href="/assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header py-4 text-center bg-primary">
                            <span><h2 height="" class="text-white fw-bold">E - L<span class="text-warning">APO</span>R</h2></span>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                <p class="text-muted mb-4">Masukan Username dan Password anda dengan teliti.
                                </p>
                            </div>

                            @if (session('pesan'))
                            <div class="alert alert-danger mt-2">
                                {{ session('pesan') }}
                            </div>
                            @endif

                            <div id="btnwizard">
                                <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                                    <li class="nav-item">
                                        <a href="#tab12" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link rounded-0 py-2">
                                            <i class="mdi mdi-account-circle font-18 align-middle me-1"></i>
                                            <span class="d-none d-sm-inline">Masyarakat</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tab22" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link rounded-0 py-2">
                                            <i class="mdi mdi-face-man-profile font-18 align-middle me-1"></i>
                                            <span class="d-none d-sm-inline">Petugas</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content mb-0 b-0">

                                    <div class="tab-pane fade" id="tab12">
                                        <div class="row">
                                            <div class="col-12">
                                                <form action="{{ route('pekat.login') }}" method="POST">
                                                    @csrf
                                                    <div class="tab-pane" id="basictab2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label for="emailaddress" class="form-label">Masukan Username</label>
                                                                    <input
                                                                        class="form-control  @error('username') is-invalid @enderror"
                                                                        type="text" id="emailaddress" required=""
                                                                        placeholder="Enter your email" name="inputan">
                                                                    @error('username')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>


                                                                <div class="mb-3">
                                                                    <a href="pages-recoverpw.html"
                                                                        class="text-muted float-end"><small>Forgot your
                                                                            password?</small></a>
                                                                    <label for="password"
                                                                        class="form-label">Password</label>
                                                                    <div class="input-group input-group-merge">
                                                                        <input type="password" id="password"
                                                                            class="form-control @error('password') @enderror"
                                                                            placeholder="Enter your password"
                                                                            name="password">
                                                                        @error('username')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>

                                                                        @enderror

                                                                        <div class="input-group-text"
                                                                            data-password="false">
                                                                            <span class="password-eye"></span>
                                                                        </div>
                                                                        {{-- @error('password')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror --}}
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 mb-3">
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            id="checkbox-signin" checked>
                                                                        <label class="form-check-label"
                                                                            for="checkbox-signin">Remember me</label>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 mb-0 text-center">
                                                                    <button class="btn btn-primary" type="submit"> Log
                                                                        In
                                                                    </button>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>

                                    <div class="tab-pane fade" id="tab22">
                                        <div class="row">
                                            <div class="col-12">
                                                <form class="theme-form login-form" action="{{ route('admin.login') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="tab-pane" id="basictab2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label for="emailaddress" class="form-label">Masukan Username</label>
                                                                    <input
                                                                        class="form-control  @error('username') is-invalid @enderror"
                                                                        type="text" id="emailaddress" required=""
                                                                        placeholder="Enter your email" name="username">
                                                                    @error('username')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>


                                                                <div class="mb-3">
                                                                    <a href="pages-recoverpw.html"
                                                                        class="text-muted float-end"><small>Forgot your
                                                                            password?</small></a>
                                                                    <label for="password"
                                                                        class="form-label">Password</label>
                                                                    <div class="input-group input-group-merge">
                                                                        <input type="password" id="password"
                                                                            class="form-control @error('password') @enderror"
                                                                            placeholder="Enter your password"
                                                                            name="password">
                                                                        @error('password')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>

                                                                        @enderror

                                                                        <div class="input-group-text"
                                                                            data-password="false">
                                                                            <span class="password-eye"></span>
                                                                        </div>
                                                                        {{-- @error('password')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                        @enderror --}}
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 mb-3">
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            id="checkbox-signin" checked>
                                                                        <label class="form-check-label"
                                                                            for="checkbox-signin">Remember me</label>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 mb-0 text-center">
                                                                    <button class="btn btn-primary" type="submit"> Log
                                                                        In
                                                                    </button>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>
                                                </form>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div class="clearfix"></div>

                                </div> <!-- tab-content -->
                            </div> <!-- end #btnwizard-->

                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="/register"
                                            class="text-muted ms-1"><b>Sign
                                                Up</b></a></p>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end page -->

            <footer class="footer footer-alt">
                2018 - <script>
                    document.write(new Date().getFullYear())

                </script> © Hyper - Coderthemes.com
            </footer>
            <!-- Vendor js -->
            <script src="/assets/js/vendor.min.js"></script>

            <script src="assets/vendor/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

            <script src="assets/js/pages/demo.form-wizard.js"></script>

            <!-- App js -->
            <script src="/assets/js/app.min.js"></script>

</body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 03:49:14 GMT -->

</html>
