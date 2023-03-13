<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper/saas/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 03:49:15 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Register | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Select2 css -->
    <link href="/assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Daterangepicker css -->
    <link href="/assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Touchspin css -->
    <link href="/assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap Datepicker css -->
    <link href="/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap Timepicker css -->
    <link href="/assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Flatpickr Timepicker css -->
    <link href="/assets/vendor/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

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
                <div class="col-xxl-4 col-lg-8">
                    <div class="card">
                        <!-- Logo-->
                        <div class="card-header py-4 text-center bg-primary">
                            <span>
                                <h2 height="" class="text-white fw-bold"><span class="text-warning">E - </span>LAPOR
                                </h2>
                            </span>
                        </div>


                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Register</h4>
                            </div>

                            <form action="{{ route('pekat.register') }}" method="post" class="row">
                                @csrf
                                @if (Session::has('pesan'))
                                <div class="alert alert-danger" role="alert">
                                    {{ (Session::get('pesan')) }}
                                </div>
                                @endif
                                <div class="col-xl-6">

                                    <div class="mb-3">
                                        <label for="nik" class="form-label">NIK</label>
                                        <input class="form-control  @error('nik') is-invalid @enderror" type="text"
                                            id="nik" placeholder="Nomor Induk Kependudukan"  data-toggle="input-mask" data-mask-format="0000000000000000" name="nik" value="{{ old('nik') }}">
                                        @error('nik')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input class="form-control @error('nama') is-invalid @enderror" type="text"
                                            id="nama" placeholder="Nama Lengkap" name="nama" value="{{ old('nama') }}">
                                        @error('nama')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input class="form-control  @error('username') is-invalid @enderror" type="text"
                                            id="username" placeholder="Ketikan username" name="username" value="{{ old('username') }}">
                                        @error('username')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input class="form-control  @error('email') is-invalid @enderror" 
                                            id="username" placeholder="Ketikan Email" name="email" {{ old('email') }}>
                                        @error('email')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">

                                    <div class="mb-3">
                                        <label for="telp" class="form-label">No. Tlp</label>
                                        <input class="form-control  @error('telp') is-invalid @enderror" type="text"
                                            id="telp" placeholder="Ketikan Nomor Telepon" name="telp"
                                            data-toggle="input-mask" data-mask-format="0000000000000" value="{{ old('telp') }}">
                                        @error('telp')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="@error('password') is-invalid @enderror form-control"
                                                placeholder="Ketikan password" name="password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                            @error('password')
                                            <small class="invalid-feedback">
                                                {{ $message }}
                                                {{-- Mohon Masukan Password --}}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">konfirmasi password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="@error('password') is-invalid @enderror form-control"
                                                placeholder="Konfirmasi password" name="password_confirmation">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                            @error('password')
                                            <small class="invalid-feedback">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Jenis kelamin</label>
                                        <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                            <option selected disabled>Pilih jenis kelamin</option>
                                            <option value="laki_laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                        @error('gender')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                        <label class="form-check-label" for="checkbox-signup">Saya menyetujui peryaratanya</label>
                                    </div>
                                </div>

                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary" type="submit"> Sign Up </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            
                            <p class="text-muted">Sudah punya akun? <a href="{{ route('admin.formLogin') }}"
                                    class="text-muted ms-1"><b>Log
                                        In</b></a></p>
                        </div> <!-- end col-->
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
        2023 - <script>
            document.write(new Date().getFullYear())

        </script> © achdian - E -  LAPOR
    </footer>

    <!-- Vendor js -->
    <script src="/assets/js/vendor.min.js"></script>

    <!-- Code Highlight js -->
    <script src="/assets/vendor/highlightjs/highlight.pack.min.js"></script>
    <script src="/assets/vendor/clipboard/clipboard.min.js"></script>
    <script src="/assets/js/hyper-syntax.js"></script>

    <!--  Select2 Plugin Js -->
    <script src="/assets/vendor/select2/js/select2.min.js"></script>

    <!-- Daterangepicker Plugin js -->
    <script src="/assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="/assets/vendor/daterangepicker/daterangepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin js -->
    <script src="/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Bootstrap Timepicker Plugin js -->
    <script src="/assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

    <!-- Input Mask Plugin js -->
    <script src="/assets/vendor/jquery-mask-plugin/jquery.mask.min.js"></script>

    <!-- Bootstrap Touchspin Plugin js -->
    <script src="/assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Bootstrap Maxlength Plugin js -->
    <script src="/assets/vendor/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

    <!-- Typehead Plugin js -->
    <script src="/assets/vendor/handlebars/handlebars.min.js"></script>
    <script src="/assets/vendor/typeahead.js/typeahead.bundle.min.js"></script>

    <!-- Flatpickr Timepicker Plugin js -->
    <script src="/assets/vendor/flatpickr/flatpickr.min.js"></script>

    <!-- Typehead Demo js -->
    <script src="/assets/js/pages/demo.typehead.js"></script>

    <!-- Timepicker Demo js -->
    <script src="/assets/js/pages/demo.timepicker.js"></script>

    <!-- App js -->
    <script src="/assets/js/app.min.js"></script>


</body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 03:49:15 GMT -->

</html>
