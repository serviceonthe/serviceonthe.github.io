<?php 
	// print_r($customer_info); 
	extract($customer_info);
	$l_order_pin=$this->session->userdata('l_order_pin');
?>


	<br>
	<section>
		<div class="container">
			<div class="box2">
				<div class="row">
					<div class="col-md-12">
						<h3>Address book</h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 Delivery">
						<h4>Delivery address:</h4>
						<form>
						     <input type="text" id="name" class="input" name="name"  value="<?php echo $address_line1; ?>" size="35" /><br><br>
						     <input type="text" id="name" class="input" name="name"  value="<?php echo $address_line2; ?>" size="35" /><br><br>
						     <input type="text" id="name" class="input" name="name"  value="<?php echo $city.' '.$country; ?>" size="35" /><br><br>
						     City / Postcode: * 
						     <input type="text" id="name" class="input" name="name"  value="<?php echo $post_code; ?>" size="15" />
						     <input type="text" id="name" class="input" name="name"  value="" size="6" />
						     <input type="text" id="name" class="input" name="name"  value="" size="4" /><br>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h3>Additional information:</h3>
						<p>Please input the additional fields below which will help us improve our service.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
					</div>
					<div class="col-md-4">
						<button type="button" class="btn btn-default btn-lg active">Delete</button>
						<button type="button" class="btn btn-warning btn-lg active">Save changes</button>
					</div>
				</div>
			</div>
		</div>
	</section>


