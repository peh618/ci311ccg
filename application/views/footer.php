<!-- /.box-body -->
<div class="box-footer">
    <center>APLIkasi <strong><?= $univ ?></strong></a> &copy; 2018 - 2020</center>
</div>
<!-- </div> -->
</section>
</div>
<!-- /.box-footer-->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved. ---- Page rendered in <strong>{elapsed_time}</strong> seconds
</footer>
<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<!-- <div class="control-sidebar-bg"></div> -->

<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?= base_url(); ?>assets_bs3/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets_bs3/DataTables3/jQuery-3.3.1/jquery-3.3.1.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>assets_bs3/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>assets_bs3/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>assets_bs3/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url(); ?>assets_bs3/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url(); ?>assets_bs3/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url(); ?>assets_bs3/bower_components/fastclick/lib/fastclick.js"></script>
<!-- datepicker -->
<script src="<?= base_url(); ?>assets_bs3/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- link script sweet alert -->
<!-- <script src="<?= base_url(); ?>assets_bs3/plugins/sweetalert/sweetalert2.min.js"></script> -->
<script src="<?= base_url(); ?>assets_bs3/dist/js/myscript1.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets_bs3/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url(); ?>assets_bs3/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets_bs3/dist/js/demo.js"></script>
<script>
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function() {
        return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
</script>

</body>

</html>