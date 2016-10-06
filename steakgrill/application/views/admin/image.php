
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
	if($category):
		?>
		<div class="row" style="margin: 10px;">
		<?php
		foreach($category as $c):			
			?>			
			<div class="col-md-3">
				<a href="<?php echo site_url('admin/image/gallery/'.$c['id']); ?>" class="category"><?php echo $c['name']; ?></a> 
			</div>
			<?php							
		endforeach;
		?>
		</div>
		<?php
	else:
		?>
		<div class="row">
			No Category Available.
		</div>
		<?php
	endif;
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