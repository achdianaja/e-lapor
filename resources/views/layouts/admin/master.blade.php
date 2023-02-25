<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 03:47:34 GMT -->

<head>
    <meta charset="utf-8" />
    <title>E-Lapor | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    @include('component.style')
</head>

<body>

    {{-- @include('partials.admin.preloader') --}}
    <!-- Begin page -->
    <div class="wrapper">


        @include('partials.admin.navbar')

        @include('partials.admin.sidebar')


        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            @yield('adminContent')

            @include('partials.admin.footer')
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->
    @include('component.script')
</body>

<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 03:48:19 GMT -->

</html>
