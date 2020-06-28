<!-------------------------------------------------------*/
/* Copyright   : Yosef Murya & Badiyanto ==                */
/* Publish     : Penerbit Langit Inspirasi               */
/* revisi       : Chairun Chaidirsyah */
/*-------------------------------------------------------->
    <section class="content-header">
      <h1>
        <?= $univ; ?>
        <small>code your life with your style</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
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
					<h2 style="margin-top:0px">Users</h2>
				</div>
				<div class="col-md-4 text-center">
					<div style="margin-top: 4px" id="message">
						<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
					</div>
				</div>
				<div class="col-md-4 text-right">
					<?php
					// Button untuk membuat data baru
					echo anchor(site_url('users/create'), 'Create', 'class="btn btn-primary"');
					?>
				</div>
			</div>
			<table class="table table-bordered table-striped" id="mytable">
				<thead>
					<tr>
						<th width="80px">No</th>
						<th>Username</th>
						<th>Email</th>
						<th>Level</th>
						<th>Blokir</th>
						<th>Bidang</th>
						<th width="150px">Action</th>
					</tr>
				</thead>
			</table>
			<!-- jQuery 3 -->
			<script src="<?= base_url('assets_bs3/DataTables3/jQuery-3.3.1/jquery-3.3.1.js'); ?>"></script> 
			<!-- DataTables -->
			 <script src="<?= base_url('assets_bs3/DataTables3/DataTables-1.10.21/js/jquery.dataTables.min.js'); ?>"></script> 
			<script src="<?= base_url('assets_bs3/DataTables3/DataTables-1.10.21/js/dataTables.bootstrap.min.js'); ?>"></script> 
			<!-- JavaScript yang berfungsi untuk menampilkan data dari tabel tahun akademik dengan AJAX -->
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
						ajax: {"url": "users/json", "type": "POST"},
						columns: [
							{
								"data": "username",
								"orderable": false
							},
							{"data": "username"},
							{"data": "email"},
							{
								"data": "level",
								"render" : function(data){
									var is_level = "user";
									if(data == 'admin'){
										is_level = "Admin";	
									}
									return is_level;
								}
							},
							{
								"data": "blokir",
								"render" : function(data){
									var is_blokir = "Tidak";
									if(data == 'Y'){
										is_blokir = "Ya";	
									}
									return is_blokir;
								}
							},
							{"data": "kd_bid"},

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