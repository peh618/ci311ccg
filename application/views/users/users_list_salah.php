 <!-- Content Header (Page header) -->
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
             <!-- <div class="flash-data" data-flashdata="<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>"></div> -->
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
       <table class="table table-bordered table-hover" id="mytable">
         <!-- <table class="table table-bordered table-striped" id="mytable"> -->
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

       <!-- JavaScript yang berfungsi untuk menampilkan data dari tabel tahun akademik dengan AJAX -->
       <script type="text/javascript">
         $(document).ready(function() {
           $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
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
           // sa

           // sa
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
             // tombol

             // tombol
             oLanguage: {
               sProcessing: "loading..."
             },
             processing: true,
             serverSide: true,
             // dom: 'Bfrtip',
             // buttons: [
             // 'copy', 'csv', 'excel', 
             // {
             // extend : 'pdf',
             // orientation : 'landscape',
             // pageSize : 'A4',
             // title : 'data user',
             // download : 'open'
             // } 
             // , 'print'
             // ],
             ajax: {
               "url": "users/json",
               "type": "POST"
             },
             columns: [{
                 "data": "username",
                 "orderable": false
               },
               {
                 "data": "username"
               },
               {
                 "data": "email"
               },
               {
                 "data": "level"
               },
               // {
               //   "data": "level",
               //   "render" : function(data){
               //     var is_level = "user";
               //     if(data == 'admin'){
               //       is_level = "Admin"; 
               //     }
               //     return is_level;
               //   }
               // },
               {
                 "data": "blokir",
                 "render": function(data) {
                   var is_blokir = "Tidak";
                   if (data == 'Y') {
                     is_blokir = "Ya";
                   }
                   return is_blokir;
                 }
               },
               {
                 "data": "kd_bid"
               },

               {
                 "data": "action",
                 "orderable": false,
                 "className": "text-center"
               }
             ],
             order: [
               [0, 'desc']
             ],
             rowCallback: function(row, data, iDisplayIndex) {
               var info = this.fnPagingInfo();
               var page = info.iPage;
               var length = info.iLength;
               var index = page * length + (iDisplayIndex + 1);
               $('td:eq(0)', row).html(index);
             }
           }); // setup tabel
           // script sweet alert awal

           // scrip sweet alert akhir

         }); // document actvive
       </script>

       <script type="text/javascript">
         // $(document).ready(function(){
         $(".shapus-tombol").click(function(event) {
           // $('.hapus-tombol').on('click', function (e) {
           event.preventDefault();
           // event.stopImmediatePropagation();
           // return false;
           // var dataString = $("#FormId").serialize();
           // var url="ControllerName/MethodName"
           const href = $(this).attr('href');
           // var dataString = $("#hapus-tombol").serialize();
           var user_id = $("username").val();
           var url = "Users/delete/"
           $.ajax({
             type: "POST",
             url: "<?php echo base_url() ?>" + url,
             data: {
               'username': user_id
             },
             success: function(data) {
               console.log(data);
               // document.location.href = href
               swal({
                   title: "Are you sure?",
                   text: "You will not be able to recover this imaginary file!",
                   type: "warning",
                   showCancelButton: true,
                   confirmButtonColor: "#DD6B55",
                   confirmButtonText: "Yes, delete it!",
                   closeOnConfirm: false
                 },
                 function() {
                   swal("Deleted!", "Your imaginary file has been deleted.", "success");
                 });
             }
           });
         });
         // });
       </script>

       <script type="text/javascript">
         function deletedata(id) {
           // summber  https://webnyait.blogspot.com/2018/04/tutorial-codeigniter-3-make.html

           // let id = $(this).attr('data-id');
           //  console.log(id);
           var user_id = $("#hapus-tombol").serialize();
           // var user_id= $("username").val();
           // var dataString = $("#hapus-tombol").serialize();
           // var url="Users/delete"
           $.ajax({
             url: "<?php echo base_url() ?> + url",
             data: $(this).serialize(),
             type: post,
             success: function(data) {
               console.log(data);
             }
           });
           swal({
               title: "Anda Yakin?",
               text: "Data + user_id  Akan Dihapus Secara Permanen!",
               type: "warning",
               showCancelButton: true,
               // confirmButtonColor: "#DD6B55",
               confirmButtonText: "Yes, delete it!",
               closeOnConfirm: false
             },
             function() {
               $.ajax({
                 url: "<?php echo base_url('users/delete') ?>",
                 type: "post",
                 data: {
                   'id': user_id
                 },
                 success: function() {
                   swal({
                       title: "Are you sure?",
                       text: "You will not be able to recover this imaginary file!",
                       type: "warning",
                       showCancelButton: true,
                       confirmButtonColor: "#DD6B55",
                       confirmButtonText: "Yes, delete it!",
                       cancelButtonText: "No, cancel plx!",
                       closeOnConfirm: false,
                       closeOnCancel: false
                     },
                     function(isConfirm) {
                       if (isConfirm) {
                         swal("Deleted!", "Your imaginary file has been deleted.", "success");
                       } else {
                         swal("Cancelled", "Your imaginary file is safe :)", "error");
                       }
                     });

                 }

               });

             })
         };
       </script>

       <script type="text/javascript">
         $(document).on("click", ".remuk", function(e) {
           e.preventDefault();
           // $(".remuk").click(function(){

           // var id = $(this).parents("tr").attr("id");  
           const href = $(this).attr('href');
           // var id = $(this).parents("tr").attr("href");  
           // event.preventDefault();
           swal({

               title: "Are you sure?",
               text: "You will not be able to recover this imaginary file!",
               type: "warning",
               showCancelButton: true,
               confirmButtonClass: "btn-danger",
               confirmButtonText: "Yes, delete it!",
               cancelButtonText: "No, cancel plx!",
               closeOnConfirm: false,
               closeOnCancel: false
             },

             function(isConfirm) {
               if (isConfirm) {
                 $.ajax({
                   // url: '/users/json/'
                   url: "<?php echo base_url(); ?>" + href,
                   data: json,
                   type: 'POST',
                   // type: 'POST',
                   success: function(data) {
                     document.location.href = href
                     // $("#"+id).remove();
                     swal("Deleted!", "Your imaginary file has been deleted.", "success");
                   },
                   error: function() {
                     alert('Something is wrong');
                   },
                 });
               } else {
                 swal("Cancelled", "Your imaginary file is safe :)", "error");
               }
             });

         });
       </script>
       <script>
         $(document).ready(function() {
           var table = $('#ads-overview').DataTable();

           $('#ads-overview tbody').on('click', 'button[data-target="#delete"]', function() {
             var btn = this;

             swal({
               title: "Weet u het zeker?",
               text: "Deze actie is niet meer te herstellen",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ja, ik weet het zeker!",
               cancelButtonText: "Annuleren",
               closeOnConfirm: false,
               closeOnCancel: false
             }, function(isConfirm) {
               if (isConfirm) {
                 swal("Verwijderd!", "De advertentie is succesvol verwijderd", "success");
                 table.row($(btn).parents('tr')).remove().draw(false);
               } else {
                 swal("Geanulleerd", "De advertentie is niet verwijderd", "error");
               }
             });
           });
         });
         //sumber : https://stackoverflow.com/questions/31898143/remove-row-in-data-table-with-sweetalert-confirmation
       </script>
       <script>
         $(document).on("click", ".remuks", function(e) {
           e.preventDefault();
           url = $(this).attr("href");
           swal({
               title: "Do you want delete this item?",
               type: "warning",
               showCancelButton: true,
               confirmButtonClass: 'btn btn-success',
               cancelButtonClass: 'btn btn-danger',
               buttonsStyling: false,
               confirmButtonText: "Delete",
               cancelButtonText: "Cancel",
               closeOnConfirm: false,
               showLoaderOnConfirm: true,
             },
             function(isConfirm) {
               if (isConfirm) {
                 window.location.href = url;
                 $.ajax({
                   url: url,
                   type: "POST",
                   success: function(resp) {
                     // console.log(url)
                   }
                 });
               }
               return False
             });
         });
         // sumber :: https://stackoverflow.com/questions/52194956/delete-with-sweetalert-ajax
       </script>
       <script>
         function konfirmasi(id, e) {
           e.preventDefault();
           var originLink = document.getElementById('btnkonfirmasi' + id).href;
           swal({
             title: 'Konfirmasi',
             text: 'Anda yakin akan melakukan proses ini? (tidak bisa diulangi)',
             type: 'warning',
             showCancelButton: true,
             cancelButtonText: 'Batal',
             confirmButtonText: 'Lakukan',
             reverseButtons: false,
             // closeOnConfirm: false,
             closeOnCancel: true
           }).then(result => {
             if (result.value) {
               // handle Confirm button click
               window.location.href = originLink;
               // window.open(originLink,'_blank');
             } else {
               // handle dismissals
               // result.dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
             }
           });
         };
         // sumber  http://10.10.20.243/kinerja 
         // app bpkp go id catat kinerja
       </script>
       <script>
         $(document).ready(function() {
           var table = $('#ads-overview').DataTable();

           $('#ads-overview tbody').on('click', 'button[data-target="#delete"]', function() {
             var btn = this;

             swal({
               title: "Weet u het zeker?",
               text: "Deze actie is niet meer te herstellen",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ja, ik weet het zeker!",
               cancelButtonText: "Annuleren",
               closeOnConfirm: false,
               closeOnCancel: false
             }, function(isConfirm) {
               if (isConfirm) {
                 swal("Verwijderd!", "De advertentie is succesvol verwijderd", "success");
                 table.row($(btn).parents('tr')).remove().draw(false);
               } else {
                 swal("Geanulleerd", "De advertentie is niet verwijderd", "error");
               }
             });
           });
         });
         //sumber : https://stackoverflow.com/questions/31898143/remove-row-in-data-table-with-sweetalert-confirmation   
       </script>

       <script type="text/javascript">
         // ====================================================================================================

         // Proses Hapus Data ==================================================================================
         // ----------------------------------------------------------------------------------------------------
         $('#mytable tbody').on('click', '.remuk', function() {
           var data = table.row($(this).parents('tr')).data();
           // tampilkan notifikasi saat akan menghapus data
           swal({
               title: "Apakah Anda Yakin?",
               text: "Anda akan menghapus data transaksi penjualan dengan ID Penjualan : " + data[1] + "",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ya, Hapus!",
               closeOnConfirm: false
             },
             // jika dipilih ya, maka jalankan perintah hapus data
             function() {
               var id_transaksi = data[1];
               $.ajax({
                 type: "POST",
                 // url  : "proses_hapus.php",
                 url: "<?= base_url('User/delete/'); ?> " + data[1] +
                   "",
                 data: {
                   username: id_transaksi
                 },
                 success: function(result) { // ketika sukses menghapus data
                   if (result === "sukses") {
                     // tampilkan pesan sukses hapus data
                     swal("Sukses!", "Data Transaksi Penjualan berhasil dihapus.", "success");
                     // tampilkan data transaksi
                     var table = $('#mytable').DataTable();
                     table.ajax.reload(null, false);
                   } else {
                     // tampilkan pesan gagal hapus hapus data
                     swal("Gagal!", "Data Transaksi Penjualan tidak bisa dihapus.", "error");
                   }
                 }
               });
             });
         });
       </script>