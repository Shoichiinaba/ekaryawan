<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 3 | DataTables</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/bootstrap-slider/bootstrap-slider.min">   
                     

</head>
<body class="sidebar-mini control-sidebar-slide-open sidebar-collapse accent-warning">
<div class="wrapper">
        




<div>
</body>
</html>
        <!-- jQuery -->
        <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
        <!-- SweetAlert2 -->
        <script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- page script -->
        <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            });
        });
        </script>