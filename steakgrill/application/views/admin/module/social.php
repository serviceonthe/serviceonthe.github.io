<style type="text/css">
	#social_link{

	}
	#social_link label,
	#social_link input
	{
		padding: 5px;
		margin: 5px;
	}
	#social_link input[type='text']{
		width: 300px;
	}
	#social_link input[type='submit']{
		width: 100px;
	}


</style>
<div class="template-page-wrapper">
	<div class="templatemo-content">
    	<?php echo form_open('admin/module/social',array('id'=>'social_link')); ?>
    	<div class="row">
    		<style type="text/css">
    			
    		</style>
    		<div class="col-md-3"></div>		
    		<div class="col-md-6">
    			<div class="row">
    				<div class="col-md-4">
    					<label for="facebook">Facebook</label>
    				</div>
    				<div class="col-md-8">
    					<input type="text" placeholder="facebook.com/serviceOn" value="<?php if(isset($social_link['facebook'])) echo $social_link['facebook']->social_link; ?>" name="facebook" id="facebook">
    				</div>
    			</div> 
    			<div class="row">
    				<div class="col-md-4">
    					<label for="twitter">Twitter</label>
    				</div>
    				<div class="col-md-8">
    					<input type="text" placeholder="twitter.com/serviceOn" value="<?php if(isset($social_link['twitter'])) echo $social_link['twitter']->social_link; ?>" name="twitter" id="twitter">
    				</div>
    			</div> 
    			<div class="row">
    				<div class="col-md-4">
    					<label for="google_plus">Google+</label>
    				</div>
    				<div class="col-md-8">
    					<input type="text" placeholder="google.com/+serviceOn" value="<?php if(isset($social_link['google_plus'])) echo $social_link['google_plus']->social_link; ?>" name="google_plus" id="google_plus">
    				</div>
    			</div> 
    			<div class="row">
    				<div class="col-md-4">
    					<label for="thumlar">Thumlar</label>
    				</div>
    				<div class="col-md-8">
    					<input type="text" placeholder="" value="<?php if(isset($social_link['thumlar'])) echo $social_link['thumlar']->social_link; ?>" name="thumlar" id="thumlar">
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