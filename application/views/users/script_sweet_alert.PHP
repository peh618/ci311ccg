<!--  sumber  data https://medikre.com/stories/bagaimana-cara-menggunakan-sweet-alert-delete-confirm-di-codeigniter -->
 <script type="text/javascript">
     $(document).ready(function () { 
       $('#mytable').dataTable(); 
       $('.hapus-tombol').click(function () {
            var id = $(this).parents("tr").attr("id");
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan",
                type: "warning",
                showCancelButton: true,
                cancelButtonClass: 'btn-white btn-md waves-effect',
                confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                confirmButtonText: 'Hapus'
            },
      function(isConfirm) {
        if (isConfirm) {
        $.ajax({
          url: '<?php echo site_url('users/delete/') ?>'+id,
          type: 'DELETE',
          error: function() {
            alert('Something is wrong');
          },
          success: function(data) {
            $("#"+id).remove();
            Swal.fire("Terhapus!", "Data berhasil dihapus.", "success");
          }
        });
        } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
      
        }); 
  }); 
    </script>