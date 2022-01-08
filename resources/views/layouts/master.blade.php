<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Madrasah Tsanawiyah Negeri 3 Muaro Jambi </title>
    <link rel="icon" type="image/png" href="/admin/assets/img/logo.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/assets/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="/admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.includes._navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.includes._sidebar')
        <!-- /.Sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            @if (Session::has('pesan'))
                <div class="alert alert-info alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ Session::get('pesan') }}
                </div>
            @endif
            @yield('content')
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline-block">
                <strong>Copyright &copy; <span>{{ date('Y') }}</span> <a href="#">Madrasah Tsanawiyah Negeri 3 Muaro Jambi</a>.</strong>

            </div>
        </footer><br>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/admin/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- DataTables -->
    <script src="/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/assets/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/admin/assets/js/demo.js"></script>

    <script src="/admin/assets/plugins/moment/moment.min.js"></script>

    <script src="/admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    @yield('script')

    <script>
        const sekarang = $('#waktu_sekarang').data('sekarang');

        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#datetimepicker1').datetimepicker({
                format: 'DD/MM/YYYY HH:mm',
                minDate: sekarang,
                icons: {
                    time: "fa fa-clock",
                }
            });
            $('#datetimepicker2').datetimepicker({
                format: 'DD/MM/YYYY HH:mm',
                minDate: sekarang,
                icons: {
                    time: "fa fa-clock",
                }
            });

        });

    </script>
</body>

</html>
