
  <script>
  function deletedata($1)
  {
    swal({
      title: "Anda Yakin?",
      text: "Data <?php echo $row->username; ?> Akan Dihapus Secara Permanen!",
      type: "warning",
      showCancelButton: true,
      // confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
    },
    function(){
      $.ajax({
          url: "<?php echo base_url('users/delete/$1') ?>",
          type: "post",
          data: {id:id},
          success:function(){
            swal('Data Berhasil Di Hapus', ' ', 'success');
            $("#delete"+id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })

          },
          error:function(){
            swal('data gagal di hapus', 'error');
          }
      });
      
    });
  }
</script>
<script type="text/javascript">
    $(document).on("click", ".remuks", function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    
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
      function(isConfirm){
        if (isConfirm) {
          // location.reload();
          // document.location.href= href; //harusnya command apus row
          $.ajax({
              url:"<?php echo base_url(); ?>" + href ,
              // url: href ,
              dataType: "json",
              type:"POST"
          })
          
          // window.location.href=href;
          swal("Deleted!", "Your imaginary file has been deleted.", "success");
          window.location.href=href;
          location.reload;
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
    });
      return false

    });// akhir fungsi 
</script>
<script>
  // fungsi untuk hapus data
          //pilih selector dari table id datamahasiswa dengan class .remuk
          // fungsi untuk hapus data
          //pilih selector dari table id datamahasiswa dengan class .hapus-mahasiswa
          // $('#datamahasiswa').on('click','.hapus-mahasiswa', function () {
          $('#mytable').on('click','.remukss', function () {
            var id =  $(this).data('id');
            swal({
                title: 'Konfirmasi',
                text: "Anda ingin menghapus ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Tidak',
                reverseButtons: true
              }).then((result) => {
                if (result.value) {
                  $.ajax({
                    url:"<?=base_url('index.php/users/delete/')?>"+id,  
                    method:"post",
                    beforeSend :function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                          swal.showLoading()
                        }
                      })      
                    },    
                    data:{id:id},
                    success:function(data){
                      swal(
                        'Hapus',
                        'Berhasil Terhapus',
                        'success'
                      )
                      mytable.ajax.reload(null, false)
                    }
                  })
              } else if (result.dismiss === swal.DismissReason.cancel) {
                  swal(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                  )
                }
              })
            });


</script>