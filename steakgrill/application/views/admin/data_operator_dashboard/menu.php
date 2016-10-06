<?php
	if($this->session->userdata('user_email')==false)
	{
		redirect('admin/dashboard');
	}
?>
 <div class="template-page-wrapper">
      <div class="navbar-collapse collapse templatemo-sidebar">
      <?php echo $this->session->userdata('user_email');?>
        <ul class="templatemo-sidebar-menu">
          <li>
            <form class="navbar-form">
              <input type="text" class="form-control" id="templatemo_search_box" placeholder="Search...">
              <span class="btn btn-default">Go</span>
            </form>
          </li>
          <li class="active"><a href="<?php echo base_url();?>index.php/admin/data_operator_dashboard/home"><i class="fa fa-home"></i>Dashboard</a></li>
           <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i> Food <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="<?php echo base_url();?>index.php/admin/data_operator_food/fatch_category">Category</a></li>
              <li><a href="<?php echo base_url();?>index.php/admin/data_operator_dashboard/food_menu">Menu</a></li>
              <li><a href="<?php echo base_url();?>index.php/admin/data_operator_food/fatch_item">Item Type</a></li>
            </ul>
          </li>
           <!-- <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i> Restaurent <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="<?php echo site_url('admin/data_operator_restaurent/fatch_restaurent');?>">List Restaurent</a></li>
              <li><a href="<?php echo base_url();?>index.php/admin/data_operator_dashboard/add_restaurent">Add Restaurent</a></li>
              <li><a href="<?php echo base_url();?>index.php/admin/data_operator_dashboard/search_restaurent">Search Restaurent</a></li>
              <li><a href="<?php echo site_url('admin/data_operator_restaurent/fatch_restaurent_feature_information');?>">Feature Information</a></li>
            </ul>
          </li> -->
          <li><a href="<?php echo site_url('admin/login/logout'); ?>"></i>Sign Out</a></li>
        </ul>
      </div>