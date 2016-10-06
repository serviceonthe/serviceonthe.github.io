<?php
	$this->load->view('admin/header_link');
	$this->load->view('admin/header');
	$this->load->view('admin/menu');

?>
<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
        <a href="<?php echo base_url();?>/index.php/admin/pages/add_new_menu"><button type="button" class="btn btn-success">Create New Menu</button></a>
        <a href="#"><button type="button" class="btn btn-success">Menu Management</button></a>
        
    <!--all code here -->
    <!--here is end changable content -->
	</div>
</div>

<?php
	$this->load->view('admin/footer');
?>