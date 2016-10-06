<style type="text/css">
	#social_link{

	}
	#social_link label,
	#social_link input,
	#social_link textarea
	{
		padding: 5px;
		margin: 5px;
	}
	#social_link input[type='text'],
	#social_link textarea
	{
		width: 300px;
	}
	#social_link input[type='submit']{
		width: 100px;
	}


</style>
<h2 style="text-align:center;">Create Category</h2>
<div class="template-page-wrapper">
	<div class="templatemo-content">
    	<?php echo form_open('admin/image/category',array('id'=>'social_link')); ?>
        <!-- <input type="hidden" name="type" value="<?php echo $email_type; ?>"/> -->
    	<div class="row">
    		<style type="text/css">
    			
    		</style>		
    		<div class="col-md-6">
    			<div class="row">
                    <div class="col-md-5">
                        <label for="name">Category Name</label>
                    </div>
                    <div class="col-md-7">
                        <input 
                            type="text" 
                            placeholder="" 
                            value="" 
                            name="name" 
                            id="name">
                    </div>
                </div>

    			<div class="row">
    				<div class="col-md-5"></div>
    				<div class="col-md-7">
    					<input type="submit" value="Submit" name="submit">
    				</div>
    			</div>
    		</div>		    		
    		<div class="col-md-6">
    			<?php 
					if($category):
						?>
						<div class="row" style="
											font-weight: bold;
										  	color: #111;
										  	font-size: 115%;">
							<div class="col-md-1">
								SL
							</div>
							<div class="col-md-7">
								Category Name
							</div>
							<div class="col-md-4">
								Create At
							</div>									
						</div>
						<?php
						$i=1;
						foreach($category as $c):
							?>
							<div class="row">
								<div class="col-md-1">
									<?php echo $i; ?>
								</div>
								<div class="col-md-7">
									<?php echo $c['name']; ?>
								</div>
								<div class="col-md-4">
									<?php echo $c['create_at']; ?>
								</div>									
							</div>
							<?php
							$i++;							
						endforeach;
					else:
						?>
						<div class="row">
							No Category Available.
						</div>
						<?php
					endif;
				 ?>
    		</div>		
    	</div>
    	
    	<?php echo form_close(); ?>
	</div>
</div>