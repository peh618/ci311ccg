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
		
			<!-- Form input atau edit Users -->
			<h2 style="margin-top:0px">Users <?php echo $button ?></h2>
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			<!-- <input type="hidden"  class="form-control" name="username" id="username" value="<?php echo $username; ?>" /> -->
			<input type="hidden"  class="form-control" name="image" id="image" value="<?php echo $image; ?>" />
	        <div class="form-group">
				<div class="form-group">
					<label for="varchar">Username <?php echo form_error('username') ?></label>
					<input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
					<!-- <?php echo form_error('username') ?> -->
				</div>
				<div class="form-group">
					<label for="varchar">Password <?php echo form_error('password') ?></label>
					<input type="text" class="form-control" name="password" id="password" placeholder="Password"  />
					<!-- <?php echo form_error('password') ?> -->
				</div>
				<div class="form-group">
					<label for="varchar">Email <?php echo form_error('email') ?></label>
					<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
				</div>		
				<!-- <div class="form-group">
					<label for="enum">Level <?php echo form_error('level') ?></label>
					<select name="level" class="form-control select2" style="width: 100%;">		
						<?php
							if($level == 'admin'){
						?>
							<option value="admin" selected>Admin</option>
							<option value="mahasiswa">Mahasiswa</option>
						<?php
							}
							elseif($level == 'mahasiswa'){
						?>
							<option value="admin">Admin</option>
							<option value="mahasiswa" selected>Mahasiswa</option>
						<?php
							}
							else{
						?>
							<option value="admin">Admin</option>
							<option value="mahasiswa">Mahasiswa</option>
						<?php
							}
						?>
					</select>            
				</div> -->

				<div class="form-group">
					<!-- <label class="col-sm-2" for="int">Level </label> -->
					<label for="int">Level <?php echo form_error('ur_level') ?></label>
					
						 <?php 
							   $query = $this->db->query('SELECT id_level,ur_level FROM kd_level');
							   $dropdowns = $query->result();
							   foreach($dropdowns as $dropdown) {
									   $dropDownList[$dropdown->id_level] = $dropdown->ur_level;
									}
								  $finalDropDown = array_merge(array("" => "-- Pilihan --"), $dropDownList); 
							  // var_dump($finalDropDown);
							  // die;
							  echo form_dropdown('ur_level',$finalDropDown , $ur_level, 
								    'class="form-control" id="ur_level"'); 	
							  // echo form_error('ur_level') 
						  ?> 
					
				</div>

				<div class="form-group">
					
					<label for="varchar">Bidang <?php echo form_error('kd_bid') ?></label>
					
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

				<div class="form-group">
					<label class="col-sm-2" for="image">Photo <?php echo form_error('image') ?></label>
					<div class="col-sm-4">
					<?php
						if($image==""){
							echo"<p class='help-block'>Silahkan upload foto user </p>";
						}
						else{
					?>
							<div>			
								<img src="<?= base_url('/images/user/') . $image; ?>" class="img-thumbnail"  width="100px" height="100px">
							</div><br />
					<?php
						}
					?>
					<input type="file" name="image" id="image">							
					</div>
				</div>	

			

				
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
				<a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
			</form>
    