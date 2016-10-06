
<?php 
	if(!$this->session->userdata('user_email')):
        $this->load->view('admin/login_page');
            
    else:
	$this->load->view('admin/common/header');
	$this->load->view('admin/common/menu');
	$category=$email_data=$this->data_model->fatch_all_data('gallery_category');
	// var_dump($category);
?>

<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<div><?php echo $output; ?></div>
<?php $this->load->view('admin/common/footer'); ?>
<?php endif; ?>