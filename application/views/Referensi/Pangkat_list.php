 <!-- Content Header (Page header) -->
       <section class="content-header">
      <h1>
        <?= $univ; ?>
        <small>code your life with your style</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pangkat</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-body">

      <!-- Data Users -->
      <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
          <h2 style="margin-top:0px">Pangkat - Golongan</h2>
        </div>
        <div class="col-md-4 text-center">
          <div style="margin-top: 4px" id="message">
            <div class="flash-data" data-flashdata="<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>"></div> 
             <!-- <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> -->
          </div>
        </div>
        <div class="col-md-4 text-right">
          <?php
          // Button untuk membuat data baru
          echo anchor(site_url('refpangkat/create'), '<i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;Create', 'class="btn btn-primary"');
          ?>
        </div>
      </div>
      <table class="table table-bordered table-hover" id="mytable">
      <!-- <table class="table table-bordered table-striped" id="mytable"> -->
        <thead>
          <tr>
            <th width="80px">No</th>
            <th>Golongan</th>
            <th>Pangkat</th>
            <th width="200px">Action</th>
          </tr>
        </thead>
      </table>
      <!-- jQuery 3 -->
      <script src="<?= base_url('assets_bs3/DataTables3/jQuery-3.3.1/jquery-3.3.1.js'); ?>"></script> 
      <!-- DataTables -->
       <script src="<?= base_url('assets_bs3/DataTables3/DataTables-1.10.21/js/jquery.dataTables.min.js'); ?>"></script> 
      <script src="<?= base_url('assets_bs3/DataTables3/DataTables-1.10.21/js/dataTables.bootstrap.min.js'); ?>"></script> 
      <!-- tombol -->
      <!-- <script src="<?= base_url('assets_bs3/DataTables3/Buttons-1.6.2/js/dataTables.buttons.min.js'); ?>"></script>  -->
      <!-- <script src="<?= base_url('assets_bs3/DataTables3/Buttons-1.6.2/js/buttons.flash.min.js'); ?>"></script>  -->
      <!-- <script src="<?= base_url('assets_bs3/DataTables3/JSZip-2.5.0/jszip.min.js'); ?>"></script>  -->
      <!-- <script src="<?= base_url('assets_bs3/DataTables3/pdfmake-0.1.36/pdfmake.min.js'); ?>"></script>  -->
      <!-- <script src="<?= base_url('assets_bs3/DataTables3/pdfmake-0.1.36/vfs_fonts.js'); ?>"></script>  -->
      <!-- <script src="<?= base_url('assets_bs3/DataTables3/Buttons-1.6.2/js/buttons.html5.min.js'); ?>"></script>  -->
      <!-- <script src="<?= base_url('assets_bs3/DataTables3/Buttons-1.6.2/js/buttons.print.min.js'); ?>"></script>   -->

<!-- https://code.jquery.com/jquery-3.5.1.js
https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js
https://cdn.datatables.net/Buttons-1.6.2/js/dataTables.buttons.min.js
https://cdn.datatables.net/Buttons-1.6.2/js/buttons.flash.min.js
https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js
https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js
https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js
https://cdn.datatables.net/Buttons-1.6.2/js/buttons.html5.min.js
https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js
      <!- tombol -->

      <!-- JavaScript yang berfungsi untuk menampilkan data dari tabel jurusan dengan AJAX -->
      <script type="text/javascript">
        $(document).ready(function() {
          $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
            {
              return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
              };
            };

             var t = $("#mytable").dataTable({
                initComplete: function() {
                  var api = this.api();
                  $('#mytable_filter input')
                      .off('.DT')
                      .on('keyup.DT', function(e) {
                        if (e.keyCode == 13) {
                          api.search(this.value).draw();
                    }
                  });
                },
                oLanguage: {
                  sProcessing: "loading..."
                },
                processing: true,
                serverSide: true,
                ajax: {"url": "refpangkat/json", "type": "POST"},
                columns: [
                  {
                    "data": "idpanggol",
                    "orderable": false
                  },
                  {"data": "kd_pangkat","orderable": true
                  },
                  {"data": "ur_pangkat"},
                  {
                    "data" : "action",
                    "orderable": false,
                    "className" : "text-center"
                  }
                ],
                order: [[0, 'desc']],
                rowCallback: function(row, data, iDisplayIndex) {
                  var info = this.fnPagingInfo();
                  var page = info.iPage;
                  var length = info.iLength;
                  var index = page * length + (iDisplayIndex + 1);
                  $('td:eq(0)', row).html(index);
                }
            });
        });
        </script>
        
      <!--// Tampil Data Jurusan -->


     


      