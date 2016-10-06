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
    	<?php echo form_open('admin/settings/payment',array('id'=>'social_link')); ?>
    	<div class="row">
    		<style type="text/css">
    			
    		</style>
    		<div class="col-md-3"></div>		
    		<div class="col-md-6">
    			<div class="row">
    				<div class="col-md-5">
    					<label for="paypal">PayPal</label>
    				</div>
    				<div class="col-md-7">
    					<input 
    						type="radio" 
    						id="paypal" 
    						name="payment_method" 
    						value="paypal" 
    						<?php if(isset($social_link['payment_method'])) if($social_link['payment_method']->value=='paypal')  echo 'checked'; ?>
    						/>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-md-5">
    					<label for="worldpay">World Pay</label>
    				</div>
    				<div class="col-md-7">
    					<input 
    						type="radio" 
    						id="worldpay" 
    						name="payment_method" 
    						value="worldpay" 
    						<?php if(isset($social_link['payment_method'])) if($social_link['payment_method']->value=='worldpay') echo 'checked'; ?>
    						/>
    				</div>
    			</div>


    			<div class="row">
    				<div class="col-md-5"></div>
    				<div class="col-md-7">
    					<input type="submit" value="Submit" name="submit">
    				</div>
    			</div>
    		</div>		    		
    		<div class="col-md-3"></div>		
    	</div>
    	
    	<?php echo form_close(); ?>
	</div>
</div>