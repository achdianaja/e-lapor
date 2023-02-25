        <!-- Vendor js -->
        <script src="{{asset("assets/js/vendor.min.js")}}"></script>
        {{-- myscript --}}
        <script src="{{asset("assets/js/myscript.js")}}"></script>
        
        <!-- Daterangepicker js -->
        <script src="{{asset("assets/vendor/daterangepicker/moment.min.js")}}"></script>
        <script src="{{asset("assets/vendor/daterangepicker/daterangepicker.js")}}"></script>
        <script src="{{asset("assets/js/pages/demo.datatable-init.js")}}"></script>

        <!-- Apex Charts js -->
        <script src="{{asset("assets/vendor/apexcharts/apexcharts.min.js")}}"></script>

        <!-- Vector Map js -->
        <script src="{{asset("assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js")}}"></script>
        <script src="{{asset("assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js")}}"></script>

        <!-- Dashboard App js -->
        <script src="{{asset("assets/js/pages/demo.dashboard.js")}}"></script>

        <!-- App js -->
        <script src="{{asset("assets/js/app.min.js")}}"></script>
        <script src="{{asset("assets/js/jquery.js")}}"></script>

        <script src="{{asset("assets/vendor/dropzone/min/dropzone.min.js")}}"></script>
        <script src="{{asset("assets/js/ui/component.fileupload.js")}}"></script>

        <script src="{{asset("assets/js/pages/demo.form-wizard.js")}}"></script>
        <script src="{{asset("assets/vendor/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js")}}"></script>

        <!-- Bootstrap Datepicker js -->
        <script src="{{asset("assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js")}}"></script>

        <!-- Datatables js -->
        <script src="{{asset("assets/vendor/datatables.net/js/jquery.dataTables.min.js")}}"></script>
        <script src="{{asset("assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js")}}"></script>
        <script src="{{asset("assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
        <script src="{{asset("assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js")}}"></script>
        <script src="{{asset("assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js")}}"></script>
        <script src="{{asset("assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js")}}"></script>
        <script src="{{asset("assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js")}}"></script>
        <script src="{{asset("assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js")}}"></script>
        <script src="{{asset("assets/vendor/datatables.net-buttons/js/buttons.html5.min.js")}}"></script>
        <script src="{{asset("assets/vendor/datatables.net-buttons/js/buttons.flash.min.js")}}"></script>
        <script src="{{asset("assets/vendor/datatables.net-buttons/js/buttons.print.min.js")}}"></script>
        <script src="{{asset("assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js")}}"></script>
        <script src="{{asset("assets/vendor/datatables.net-select/js/dataTables.select.min.js")}}"></script>

        <!-- SimpleMDE js -->
        <script src="/assets/vendor/simplemde/simplemde.min.js"></script>
        <!-- SimpleMDE demo -->
        <script src="/assets/js/pages/demo.simplemde.js"></script>

        <script>
            $(document).ready(function () {
                $('.gambar-lampiran').click(function () {
                    var src = $(this).data('src');
                    $('#modalImage').attr('src', src);
                });
            });
        </script>
                              

        {{-- <script>
        const Form;
        const InnerHTML;

        if
</script> --}}

        <script>
            jQuery({
                Counter: 0
            }).animate({
                Counter: jQuery('.counter').text()
            }, {
                duration: 10000,
                easing: 'swing',
                step: function () {
                    jQuery('.counter').text(Math.ceil(this.Counter).toLocaleString('id'));
                }
            });

        </script>
