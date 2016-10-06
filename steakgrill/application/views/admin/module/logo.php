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
<div class="template-page-wrapper">
	<div class="templatemo-content">
    	<?php echo form_open('admin/module/logo',array('id'=>'social_link')); ?>
    	<div class="row">
    		<style type="text/css">
    			
    		</style>
    		<div class="col-md-3"></div>		
    		<div class="col-md-6">
    			<div class="row">
    				<div class="col-md-4">
    					<label for="logo">Logo</label>
    				</div>
    				<div class="col-md-8">
    					<input 
    						type="text" 
    						placeholder="" 
    						value="<?php if(isset($social_link['logo'])) echo $social_link['logo']->value; ?>" 
    						name="logo" 
    						id="logo">
    				</div>
    			</div>    			

    			<div class="row">
    				<div class="col-md-4"></div>
    				<div class="col-md-8">
    					<input type="submit" value="Submit" name="submit">
    				</div>
    			</div>
    		</div>		    		
    		<div class="col-md-3"></div>		
    	</div>
    	
    	<?php echo form_close(); ?>
	</div>
</div>