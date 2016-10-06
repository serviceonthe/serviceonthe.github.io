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
    	<?php echo form_open('admin/settings/discount',array('id'=>'social_link')); ?>
    	<div class="row">
    		<style type="text/css">
    			
    		</style>
    		<div class="col-md-3"></div>		
    		<div class="col-md-6">
    			<div class="row">
    				<div class="col-md-5">
    					<label for="minimum_amount_descount">Minimum Amount Descount</label>
    				</div>
    				<div class="col-md-7">
    					<input 
    						type="text" 
    						placeholder="" 
    						value="<?php if(isset($social_link['minimum_amount_descount'])) echo $social_link['minimum_amount_descount']->value; ?>" 
    						name="minimum_amount_descount" 
    						id="minimum_amount_descount">
    				</div>
    			</div> 
    			<div class="row">
    				<div class="col-md-5">
    					<label for="free_delivery_distance">Free Delivery Distance</label>
    				</div>
    				<div class="col-md-7">
    					<input 
    						type="text" 
    						placeholder="" 
    						value="<?php if(isset($social_link['free_delivery_distance'])) echo $social_link['free_delivery_distance']->value; ?>" 
    						name="free_delivery_distance" 
    						id="free_delivery_distance">
    				</div>
    			</div> 
    			<div class="row">
    				<div class="col-md-5">
    					<label for="secondary_delivery_distance">Secondary Delivery Distance</label>
    				</div>
    				<div class="col-md-7">
    					<input 
    						type="text" 
    						placeholder="" 
    						value="<?php if(isset($social_link['secondary_delivery_distance'])) echo $social_link['secondary_delivery_distance']->value; ?>" 
    						name="secondary_delivery_distance" 
    						id="secondary_delivery_distance">
    				</div>
    			</div>    			 
    			<div class="row">
    				<div class="col-md-5">
    					<label for="secondary_delivery_fee">Secondary Delivery Fee</label>
    				</div>
    				<div class="col-md-7">
    					<input 
    						type="text" 
    						placeholder="" 
    						value="<?php if(isset($social_link['secondary_delivery_fee'])) echo $social_link['secondary_delivery_fee']->value; ?>" 
    						name="secondary_delivery_fee" 
    						id="secondary_delivery_fee">
    				</div>
    			</div> 
                <!-- 
    			<div class="row">
    				<div class="col-md-5">
    					<label for="collection_discount_distance">Collection Discount Distance</label>
    				</div>
    				<div class="col-md-7">
    					<input 
    						type="text" 
    						placeholder="" 
    						value="<?php if(isset($social_link['collection_discount_distance'])) echo $social_link['collection_discount_distance']->value; ?>" 
    						name="collection_discount_distance" 
    						id="collection_discount_distance">
    				</div>
    			</div> 
    			<div class="row">
    				<div class="col-md-5">
    					<label for="collection_discount">Collection Discount</label>
    				</div>
    				<div class="col-md-7">
    					<input 
    						type="text" 
    						placeholder="" 
    						value="<?php if(isset($social_link['collection_discount'])) echo $social_link['collection_discount']->value; ?>" 
    						name="collection_discount" 
    						id="collection_discount">
    				</div>
    			</div> 
 -->



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