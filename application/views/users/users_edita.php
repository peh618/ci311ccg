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
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input atau edit Users -->
			<h2 style="margin-top:0px">Users <?php echo $button ?></h2>
			<form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">
			<!-- <input type="hidden"  class="form-control" name="image" id="image" value="<?php echo $image; ?>" /> -->
			<input type="hidden"  class="form-control" name="username" id="username" value="<?php echo $username; ?>" />
				<div class="form-group">
					<label for="varchar">Username <?php echo form_error('username') ?></label>
					<input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" disabled/>
					<!-- <?php echo form_error('username') ?> -->
				</div>
				<div class="form-group">
					<label for="varchar">Password <?php echo form_error('password') ?></label>
					<input type="text" class="form-control" name="password" id="password" placeholder="Password"/>
				</div>
				<div class="form-group">
					<label for="varchar">Email <?php echo form_error('email') ?></label>
					<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
				</div>		
				
				<!-- <div class="form-group">
					<label for="varchar">Level<?php echo form_error('ur_level') ?></label>
					<input type="text" class="form-control" name="ur_level" id="ur_level" placeholder="Level" value="<?php echo $ur_level; ?>" /> -->
					  
				    
					<label for="varchar">Level </label>
					
						<?php 
							$pil_level= array("" => "-- Pilihan --",
													"admin" => "admin", 
													"pengguna1" => "pengguna1",
													"pengguna2"=>"pengguna2");
							echo form_dropdown('ur_level', $pil_level,$ur_level, 'class="form-control" id="level"'); 
							echo form_error('ur_level') 
						?>   
					
				</div>
				
				<div class="form-group">
					
					<label for="int">Bidang <?php echo form_error('kd_bid') ?></label>
					
						 <?php 
							   $query1 = $this->db->query('SELECT kd_bid,ur_bid FROM kd_bidang');
							   $dropdowns1 = $query1->result();
							   foreach($dropdowns1 as $dropdown1) {
									   $dropDownList1[$dropdown1->kd_bid] = $dropdown1->ur_bid;
									}
								  $finalDropDown1 = array_merge(array("" => "-- Pilihan --"), $dropDownList1); 
							  echo  form_dropdown('kd_bid',$finalDropDown1 , $kd_bid, 
								    'class="form-control" id="kd_bid"'); 	
							  // echo form_error('ur_level') 
						  ?> 
					
				</div>
				<div class="form-group">
					
					<label  for="enum">Blokir <?php echo form_error('blokir') ?></label>
					<!-- <div class="col-sm-4"> -->
					<select name="blokir" class="form-control select2" style="width: 100%;">		
						<?php
							if($blokir == 'Y'){
						?>
							<option value="Y" selected>Ya</option>
							<option value="N">Tidak</option>
						<?php
							}
							elseif($blokir == 'N'){
						?>
							<option value="Y">Ya</option>
							<option value="N" selected>Tidak</option>
						<?php
							}
							else{
						?>
							<option value="Y">Ya</option>
							<option value="N">Tidak</option>
						<?php
							}
						?>
					</select> 
					<!-- </div>              -->
				</div>
				<!-- image -->

				<div class="form-group">
					<label for="varchar" <?php echo form_error('image') ?> class="col-sm-2">Photo</label>
						</br>
						<!-- <div class="col-sm-4"> -->
							<?php
								if($image==""){
									echo"<p class='help-block'>Silahkan upload foto user </p>";
								}
								else{
							?>
									<div >			
										<img src="<?php echo base_url()?>images/user/<?php echo $image; ?>" width="100px" height="100px">
									</div><br /><br />
							<?php
								}
							?>
							<input type="file" name="image" id="image">							
				</div>
					<!-- image -->
			<!-- <div class="form-group"> -->
				<button type="submit" class="btn btn-primary "><?php echo $button ?></button> 
				<a href="<?php echo site_url('users') ?>" class="btn btn-default ">Cancel</a>
			<!-- </div> -->
	</form>
	


    