<?php 
	if ($this->session->userdata('l_customer_id')=='') {
		redirect('user/login');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Steak Grill</title>
	<link href="<?php echo base_url();?>user_panel/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>user_panel/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>user_panel/css/layout.css" rel="stylesheet" type="text/css">
	 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- rating link -->
	<link href="<?php echo base_url();?>star_rating/bootstrap-rating.css" rel="stylesheet" type="text/css">
	
	<script src="<?php echo base_url();?>star_rating/bootstrap-rating.js"></script>
	<script src="<?php echo base_url();?>star_rating/bootstrap-rating.min.js"></script>
	<script src="<?php echo base_url();?>star_rating/Gruntfile.js"></script>
	<!-- rating link -->
</head>
<body>
<?php 
	// print_r($customer_info); 
	if ($this->session->userdata('l_customer_id')=='') {
		redirect('user/login');
	}
	$id=$this->session->userdata('l_customer_id');
	$l_order_pin=$this->session->userdata('l_order_pin');
?>

	<div class="header">
		<div class="container">
			<div class="col-md-2">
				<div class="logo">
					<a href="<?php echo base_url();?>" target="_blank"><img src="<?php echo base_url();?>assets/front/images/logo.png"></a>
				</div>
			</div>
			<div class="col-md-10">
				<div class="menu">
					<ul>
						<li><a href="<?php echo base_url(); ?>user/user_panel/<?php echo $id;?>"><i class="fa fa-user"></i> My account</a></li>
						<li><a href="<?php echo base_url();?>user/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
						<li><a href="#"><i class="fa fa-info-circle"></i> Help</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<br>

	<div class="container">
		<div class="box">
			<div class="row">
				<div class="col-md-4 account">
					<strong>My account details</strong><br>
					<a href="<?php echo base_url(); ?>user/dashboard/<?php echo $id;?>">Dashboard</a><br>
					<a href="<?php echo base_url(); ?>user/user_panel/<?php echo $id;?>">Account info</a><br>
					<!-- <a href="<?php echo base_url(); ?>user/address_book/<?php echo $id;?>">Address book</a><br><br><br> -->
				</div>
				<div class="col-md-4 account">
					<strong>My orders</strong><br>
					<a href="<?php echo base_url(); ?>user/order_list/<?php echo $id;?>">Order overview</a><br>
					<a href="<?php echo base_url(); ?>user/rating_review/<?php echo $id;?>">Ratings & reviews</a><br><br>
				</div>
				<div class="col-md-4 account">
					<strong>PIN no</strong><br>
					<a href=""><?php echo $l_order_pin;?></a>
					
				</div>
			</div>
		</div>
	</div>

	<div class="validation_error" style="color:red;">  
          <?php echo validation_errors(); ?> 
        </div> 
        <!--Start For display success and error massage -->
            <?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-success" id="mydiv">
	            <button type="button" class="close" data-dismiss="alert">×</button>
	            <span>
		            <?php if($this->session->flashdata('message')) {
		            echo '<div class="message"> ';
		            echo ''.$this->session->flashdata('message').'';
		            //$this->session->keep_flashdata('message');
		            echo'</div>';
		            }?>
	            </span> 
            </div>    
            <script>
	            setTimeout(function() {
	            $('#mydiv').fadeOut('fast');
	            }, 4000); // <-- time in milliseconds
            </script>

            <?php } ?>
            <?php if($this->session->flashdata('danger')) { ?>
            <div class="alert alert-danger" id="mydivdanger">
	            <button type="button" class="close" data-dismiss="alert">×</button>
	            <span>
		            <?php if($this->session->flashdata('danger')) {
		            echo '<div class="danger"> ';
		            echo ''.$this->session->flashdata('danger').'';
		            //$this->session->keep_flashdata('message');
		            echo'</div>';
		            }?>
	            </span> 
            </div>    
            <script>
	            setTimeout(function() {
	            $('#mydivdanger').fadeOut('fast');
	            }, 4000); // <-- time in milliseconds
            </script>

            <?php } ?>