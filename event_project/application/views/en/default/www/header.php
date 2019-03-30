<!DOCTYPE html>
<html>
  <head>
    <title>AVENAZ SMS Solutions</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->

<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datepicker/jquery.datetimepicker.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/jscrollpane/jquery.jscrollpane.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/fontawesome/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
<script src="<?php echo base_url();?>assets/bootstrap/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/jscrollpane/jquery.jscrollpane.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/mousewheel/jquery.mousewheel.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/datepicker/jquery.datetimepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>

</head>
<body>
<!-- Header -->
<header>
    <div class="topmain navbar-fixed-top">
        <div class="pull-left">
            <a href="javascript:void(0)" class="nav_bars"><i class="fa fa-bars"></i> SMS APP</a>
        </div>
		<?php
			if($this->session->userdata("u_id")){
				$username = $this->mod_users_account->getSingleCol("u_full_name","id",$this->session->userdata("u_id"));
		?>
		<div class="pull-right">
           <div class="accountsection">
            <div class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$username;?> <span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-menu-right" role="menu">
                <li><a href="<?=site_url("user/user_setting");?>">Account Setting</a></li>
                <li><a href="<?=site_url("user/logout");?>">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
        <?php
			}
		?>
    </div>
</header>
<!-- Header -->