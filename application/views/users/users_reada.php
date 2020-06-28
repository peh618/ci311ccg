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

<!-- baru -->
<!-- Tampil Data user -->  
			<legend><?php echo $button ?> User</legend>
			<!-- Button untuk melakukan update -->
			<a href="<?php echo site_url('users/update/'.$username) ?>" class="btn btn-primary">Update</a>	
			<!-- Button cancel untuk kembali ke halaman user list -->	
			<a href="<?php echo site_url('users') ?>" class="btn btn-warning">Cancel</a>
			<p></p>

 <!-- /.col -->
        <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $username; ?></h3>
              <h5 class="widget-user-desc"><?php echo $ur_level; ?></h5>
            </div> </br></br></br>
            <div class="widget-user-image">
              <img class="img-circle" src="<?= base_url(); ?>/images/user/<?php echo $image; ?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <span class="description-text">Alamat Email</span>
                    <h5 class="description-header"><?php echo $email; ?></h5>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <span class="description-text">BIDANG</span>
                    <h5 class="description-header"><?php echo inputtext('kd_bid','kd_bidang','ur_bid','kd_bid',$kd_bid); ?></h5>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <span class="description-text">BLOKIR</span>
                    <h5 class="description-header"><?php  
						if($blokir == "N"){
							echo "Bebas";
						}
						else{
							echo "Blokir";
						    }
					?></h5>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->

<!-- baru -->
      
     
