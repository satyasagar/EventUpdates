<div class="col-md-3 left_col">

	<div class="left_col scroll-view">



	  <div class="navbar nav_title" style="border: 0;">

	    <a href="<?php echo site_url('admin/dashboard'); ?>" class="site_title"><i class="fa fa-paw"></i> <span>Event Manager</span></a>

	  </div>

	  <div class="clearfix"></div>



	  <!-- menu prile quick info -->

	  <div class="profile">

	    <div class="profile_pic">

	      <img src="<?php echo base_url(); ?>assets/images/img.jpg" alt="..." class="img-circle profile_img">

	    </div>

	    <div class="profile_info">

	      <span>Welcome,</span>

	      <h2><?php echo $this->mod_users->getSingleCol('name','id',$this->session->userdata('u_id')); ?></h2>

	    </div>

	  </div>

	  <!-- /menu prile quick info -->



	  <br />



	  <!-- sidebar menu -->

	  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">



	    <div class="menu_section">

	      <h3>General</h3>

	      <ul class="nav side-menu">

	        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>

	          <ul class="nav child_menu" style="display: none">

	            <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a>

	            </li>

	          </ul>

	        </li>

	        

	        <li><a><i class="fa fa-edit"></i> Users <span class="fa fa-chevron-down"></span></a>

	          <ul class="nav child_menu" style="display: none">

	            <li><a href="<?php echo site_url('admin/users/'); ?>">List All</a></li>

	            <li><a href="<?php echo site_url('admin/users/add'); ?>">Add New</a></li>

	          </ul>

	        </li>

	        

	        

	        <li><a><i class="fa fa-table"></i> Buildings <span class="fa fa-chevron-down"></span></a>

	          <ul class="nav child_menu" style="display: none">

	            <li><a href="<?php echo site_url('admin/buildings/'); ?>">List All</a></li>

	            <li><a href="<?php echo site_url('admin/buildings/add'); ?>">Add New</a></li>

	          </ul>

	        </li>

	        

	        <li><a><i class="fa fa-bar-chart-o"></i> Events <span class="fa fa-chevron-down"></span></a>

	          <ul class="nav child_menu" style="display: none">

	            <li><a href="<?php echo site_url('admin/events/'); ?>">List All</a></li>

	            <li><a href="<?php echo site_url('admin/events/add'); ?>">Add New</a></li>

	          </ul>

	        </li>

	        

	      </ul>

	    </div>

	

	    



	  </div>

	  <!-- /sidebar menu -->



	  <!-- /menu footer buttons -->

	  <div class="sidebar-footer hidden-small">

	    <a data-toggle="tooltip" data-placement="top" title="Settings">

	      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>

	    </a>

	    <a data-toggle="tooltip" data-placement="top" title="FullScreen">

	      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>

	    </a>

	    <a data-toggle="tooltip" data-placement="top" title="Lock">

	      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>

	    </a>

	    <a data-toggle="tooltip" data-placement="top" title="Logout">

	      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>

	    </a>

	  </div>

	  <!-- /menu footer buttons -->

	</div>

</div>



<!-- top navigation -->

<div class="top_nav">



	<div class="nav_menu">

	  <nav class="" role="navigation">

	    <div class="nav toggle">

	      <a id="menu_toggle"><i class="fa fa-bars"></i></a>

	    </div>



	    <ul class="nav navbar-nav navbar-right">

	      <li class="">

	        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

	          <img src="<?php echo base_url(); ?>assets/images/img.jpg" alt=""><?php echo $this->mod_users->getSingleCol('name','id',$this->session->userdata('u_id')); ?>

	          <span class=" fa fa-angle-down"></span>

	        </a>

	        <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">

	          <li><a href="<?php echo site_url('admin/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>

	          </li>

	        </ul>

	      </li>



	    </ul>

	  </nav>

	</div>



</div>

<!-- /top navigation -->



<!-- page content -->

<div class="right_col" role="main">

	<div class="">