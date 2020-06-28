<!-------------------------------------------------------*/
/* Copyright   : Yosef Murya & Badiyanto                 */
/* Publish     : Penerbit Langit Inspirasi               */
/* Revisi 	   : Chairun Chaidirsyah					 */
/*-------------------------------------------------------->
<section class="content-header">
      <h1>
        <?= $univ; ?>
        <small>code your life with your style</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Users</a></li>
        <li class="active"><?php echo $button ?> Users</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box box-success">        
        <div class="box-body">
		
			<!-- Tampil Data user -->  
			<legend><?php echo $button ?> User</legend>
			<!-- Button untuk melakukan update -->
			<a href="<?php echo site_url('users/update/'.$username) ?>" class="btn btn-primary">Update</a>	
			<!-- Button cancel untuk kembali ke halaman user list -->	
			<a href="<?php echo site_url('users') ?>" class="btn btn-warning">Cancel</a>
			<p></p>
			 <!-- Menampilkan data user secara detail -->
			 <table class="table table-striped table-bordered">
				<tr><td>Photo</td><td><img src="<?= base_url(); ?>/images/user/<?php echo $image; ?>" width="200px" height="200px"></td></tr>
				<tr><td>User name</td><td><?php echo $username; ?></td></tr>
				<tr><td>Email</td><td><?php echo $email; ?></td></tr>
				<tr><td>Level</td><td><?php echo $ur_level; ?></td></tr>
				<tr><td>Kode Bidang</td><td><?php echo $kd_bid; ?></td></tr>
				<!-- <tr><td>Blokir</td><td><?php echo $blokir; ?></td></tr> -->
				<tr><td>Bidang</td><td><?php echo inputtext('kd_bid','kd_bidang','ur_bid','kd_bid',$kd_bid); ?></td></tr>
				
				<tr>
					<td>Blokir</td>
					<td>
					<?php  
						if($blokir == "N"){
							echo "Bebas";
						}
						else{
							echo "Blokir";
						    }
					?>
					</td>
				</tr>
				
			 </table>
