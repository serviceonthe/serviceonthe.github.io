<a href="<?php echo site_url('admin/image/category/create'); ?>">Create Cateogry</a>
<style type="text/css">
	.category{
		  display: block;
		  width: 100%;
		  padding: 45px 0px;
		  vertical-align: middle;
		  text-align: center;
		  border: 1px solid #ccc;
	}
</style>
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