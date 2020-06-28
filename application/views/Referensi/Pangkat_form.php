<section class="content-header">
      <h1>
        <?= $univ; ?>
        <small>code your life with your style</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Pangkat</a></li>
        <li class="active"><?php echo $button ?> Pangkat</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input dan edit Jurusan -->
			<legend><?php echo $button ?> Pangkat / Golongan</legend>	   
			<form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
					<label for="varchar">Golongan <?php echo form_error('kd_pangkat') ?></label>
					<input type="text" class="form-control" name="kd_pangkat" id="kd_pangkat" placeholder=" Nama Golongan" value="<?php echo $kd_pangkat; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Pangkat <?php echo form_error('ur_pangkat') ?></label>
					<input type="text" class="form-control" name="ur_pangkat" id="ur_pangkat" placeholder="Nama Pangkat" value="<?php echo $ur_pangkat; ?>" />
				</div>
				<input type="hidden" name="idpanggol" value="<?php echo $idpanggol; ?>" /> 
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
				<a href="<?php echo site_url('refpangkat') ?>" class="btn btn-default">Cancel</a>
			</form>  
			<!--// Form Jurusan -->