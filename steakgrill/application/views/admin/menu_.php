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
          <li class="active"><a href="<?php echo base_url();?>index.php/admin/dashboard/home"><i class="fa fa-home"></i>Dashboard</a></li>
          <li><a href="<?php echo site_url('admin/restaurent/details');?>">Restaurent</a></li>
          <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i> Usres <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="<?php echo site_url('admin/users/fatch_users'); ?>">List Users</a></li>
              <li><a href="<?php echo base_url();?>index.php/admin/dashboard/add_users">Add Users</a></li>
<!--              <li><a href="<?php echo base_url();?>index.php/admin/users/postcode_update">post_code</a></li>-->
            </ul>
          </li>
           <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i> Food <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="<?php echo base_url();?>index.php/admin/food/fatch_category">Category</a></li>
              <li><a href="<?php echo base_url();?>index.php/admin/food/add_item">Menu</a></li>
              <li><a href="<?php echo base_url();?>index.php/admin/food/fatch_item">Item List</a></li>
              <li><a href="<?php echo base_url();?>index.php/admin/dashboard/item_notification">Item Notification</a></li>
            </ul>
          </li>          
          <li><a href="<?php echo base_url();?>index.php/admin/dashboard/list_order"><i class="fa fa-cubes"></i><span class="badge pull-right">9</span>List Order</a> </li>
          <li><a href="<?php echo base_url();?>index.php/admin/dashboard/list_reservation"><i class="fa fa-cubes"></i><span class="badge pull-right">9</span>List Reservation</a> </li>
          <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i> Statement<div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
                       <li><a href="<?php echo base_url();?>index.php/admin/dashboard/restaurant_order_statement">Order Statement</a> </li>
                       <li><a href="<?php echo base_url();?>index.php/admin/dashboard/restaurant_reservation_statement">Reservation Statement</a> </li>
                       <li><a href="<?php echo base_url();?>index.php/admin/dashboard/restaurant_order_statement">Statement Summery</a> </li>  
            </ul>
          </li>     
          <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i>Page Management<div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="<?php echo base_url();?>index.php/admin/dashboard/page_category">Page Category</a></li>
              <li><a href="<?php echo base_url();?>index.php/admin/dashboard/page">Page</a></li>
              <li><a href="<?php echo base_url();?>index.php/admin/dashboard/page_management_menu">Menu</a></li>
              <li><a href="<?php echo base_url();?>index.php/admin/dashboard/footer_content">Footer Content</a></li>
              <li><a href="<?php echo base_url();?>index.php/admin/dashboard/overview_content">Overview Content</a></li>
            </ul>
          </li>
           <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i>Blog Management<div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="<?php echo base_url();?>index.php/admin/dashboard/category">Category</a></li>
              <li><a href="<?php echo base_url();?>index.php/admin/dashboard/post">Post</a></li>
              <li><a href="<?php echo base_url();?>index.php/admin/blog/comment">Comment</a></li>
            </ul>
          </li>
          <li><a href="<?php echo base_url();?>index.php/admin/dashboard/vedio_management"><i class="fa fa-cubes"></i><span class="badge pull-right">9</span>Video Management</a></li>

          <li><a href="#"><i class="fa fa-cubes"></i><span class="badge pull-right">9</span>Data Visualization</a></li>
          <li><a href="<?php echo site_url('admin/login/logout'); ?>"></i>Sign Out</a></li>
        </ul>
      </div>