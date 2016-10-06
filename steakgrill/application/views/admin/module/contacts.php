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
    	<?php echo form_open('admin/module/contact',array('id'=>'social_link')); ?>
    	<div class="row">
    		<style type="text/css">
    			
    		</style>
    		<div class="col-md-3"></div>		
    		<div class="col-md-6">
    			<div class="row">
    				<div class="col-md-4">
    					<label for="home_phone">Home Phone</label>
    				</div>
    				<div class="col-md-8">
    					<input 
    						type="text" 
    						placeholder="" 
    						value="<?php if(isset($social_link['home_phone'])) echo $social_link['home_phone']->social_link; ?>" 
    						name="home_phone" 
    						id="home_phone">
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-md-4">
    					<label for="contact_address">Contact Address</label>
    				</div>
    				<div class="col-md-8">
    					<textarea 
    						placeholder=""
    						maxlength="250"
    						name="contact_address" 
    						id="contact_address"><?php if(isset($social_link['contact_address'])) echo $social_link['contact_address']->social_link; ?></textarea>
    				</div>
    			</div>

    			<div class="row">
    				<div class="col-md-4">
    					<label for="contact_email">Contact Email</label>
    				</div>
    				<div class="col-md-8">
    					<input 
	    					type="text" 
	    					placeholder="" 
	    					value="<?php if(isset($social_link['contact_email'])) echo $social_link['contact_email']->social_link; ?>" 
	    					name="contact_email" 
	    					id="contact_email">
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-md-4">
    					<label for="reservation_email">Reservation Email</label>
    				</div>
    				<div class="col-md-8">
    					<input 
	    					type="text" 
	    					placeholder="" 
	    					value="<?php if(isset($social_link['reservation_email'])) echo $social_link['reservation_email']->social_link; ?>" 
	    					name="reservation_email" 
	    					id="reservation_email">
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-md-4">
    					<label for="order_email">Order Email</label>
    				</div>
    				<div class="col-md-8">
    					<input 
	    					type="text" 
	    					placeholder="" 
	    					value="<?php if(isset($social_link['order_email'])) echo $social_link['order_email']->social_link; ?>" 
	    					name="order_email" 
	    					id="order_email">
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