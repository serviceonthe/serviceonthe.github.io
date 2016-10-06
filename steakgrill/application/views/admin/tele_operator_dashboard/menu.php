<?php
	if($this->session->userdata('user_email')==false)
	{
		redirect('admin/dashboard');
	}
?>
 <div class="template-page-wrapper">
      <div class="navbar-collapse collapse templatemo-sidebar">
          Wellcome Telephone Operator
          
      <?php echo $this->session->userdata('user_email');?>
          
        <ul class="templatemo-sidebar-menu">
          <li>
            <form class="navbar-form">
              <input type="text" class="form-control" id="templatemo_search_box" placeholder="Search...">
              <span class="btn btn-default">Go</span>
            </form>
          </li>
          <li class="active"><a href="<?php echo base_url();?>index.php/admin/tele_operator_dashboard/home"><i class="fa fa-home"></i>Dashboard</a></li>
           
           <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i> Order <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="<?php echo site_url('admin/tele_operator_dashboard/order_list');?>">Order List</a></li>
              <li><a href="<?php echo site_url('admin/tele_operator_dashboard/order_list_report');?>">Order Report By Date</a></li>
            </ul>
          </li>
          <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i> Reservation <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="<?php echo site_url('admin/tele_operator_dashboard/list_reservation');?>">List reservation</a></li>
              <li><a href="<?php echo site_url('admin/tele_operator_dashboard/list_reservation_report');?>">Reserve Report By Date</a></li>
            </ul>
          </li>
          <li><a href="<?php echo site_url('admin/login/logout'); ?>"></i>Sign Out</a></li>
        </ul>
      </div>