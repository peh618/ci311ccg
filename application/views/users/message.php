<?php if ($this->session->has_userdata('message')) { ?>
<div class="alert alert-info alert-dismissible">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-info"></i> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></h4>
  </div>
  <?php } ?>