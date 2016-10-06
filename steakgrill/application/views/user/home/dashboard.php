<?php //print_r($customer_info); ?>
<div class="container">
		<div class="box1 overview">
			<strong>Order overview</strong>
				<table class="table">
					<thead>
						<tr>
							<td width="15%">Date</td>
							<td width="15%">Order number</td>
							<td width="40%">Order type</td>
							<td width="10%">Price</td>
							<td width="10%">Review</td>
							<td width="10%">Action</td>
						</tr>
					</thead>
					<tbody>
					<?php 
					if($order_list){
					$no_order=0;
						foreach($order_list as $key=> $value){
						$no_order +=1;
					?>
						<tr>
							<td ><?php echo $value['order_date']; ?></td>
							<td><?php echo $value['order_id']; ?></td>
							<td><?php echo $value['order_type']; ?></td>
							<td><?php echo $value['total_price']; ?></td>
							<td>
								<a href="<?php echo base_url(); ?>user/order_review/<?php echo $value['order_id'];?>"> <button class="btn btn-warning">Leave a review</button></a>
							</td>

							<td>
								<a href="<?php echo base_url(); ?>user/order_details/<?php echo $value['order_id'];?>"> <button class="btn btn-info">view</button></a>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<td colspan="5">Number of Review: <?php echo $no_order; ?></td>
						</tr>

					<?php }else{ ?>
								<tr>
									<td colspan="5">No data available</td>
								</tr>
					<?php	}?>
					</tbody>
				</table>
		</div>
	</div>

	<br>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4>Hi <?php echo $customer_info['first_name'].' '.$customer_info['last_name']; ?>, how was your meal?</h4>
			</div>
			<div class="col-md-6 review">
				ORDERED FROM<br>
				<b>Radhuni Restaurant</b><br>
				The Old Library, Church Street, Princes Risborough, <br/> Buckinghamshire, HP27 9AA London,United Kingdom
			</div>
			<div class="col-md-6">
				DELIVERED TO<br>
				<b><?php echo $customer_info['first_name'].' '.$customer_info['last_name']; ?></b><br>
				<?php 
					echo $customer_info['address_line1'].' '.
						$customer_info['address_line2'].' '.
						$customer_info['city'].' '.
						$customer_info['country'].' '.
						$customer_info['post_code']; 
				?>

			</div>
		</div>
	</div>

	<br>
<!-- <section class="rating-sec">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="box2 rate">
				<?php echo form_open('user/order_review'); ?>
					<table>
						<tr>
							<td><h3>Rate your meal</h3></td>
						</tr>
						<tr>
							<td><strong>Food quality</strong></td>
						</tr>
						<tr>
							<td>
								<input name="food_quality" type="hidden" class="rating" data-filled="fa fa-star fa-3x" data-empty="fa fa-star-o fa-3x"/>
							</td>
						</tr>
						<tr>
							<td><strong>Delivery time</strong></td>
						</tr>
						<tr>
							<td>
								<input name="delivery_time" type="hidden" class="rating" data-filled="fa fa-star fa-3x" data-empty="fa fa-star-o fa-3x"/>
							</td>
						</tr>
						<tr>
							<td><strong>Takeway service</strong></td>
						</tr>
						<tr>
							<td>
								<input name="takeway_service" type="hidden" class="rating" data-filled="fa fa-star fa-3x" data-empty="fa fa-star-o fa-3x"/>
							</td>
						</tr>
					</table>
					  <textarea name='review_massage' placeholder="Tell us more about your meal"></textarea> 
					  <br>
					  <button class="btn btn-warning btn-block btn-lg" type="submit"> Leave a review </button> 
					<?php echo form_close(); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="re-box">
					<a href="#" class="btn btn-warning btn-block btn-lg">Re-order this meal</a>
				</div>
				<div class="box2 reorder">
					<table width="100%">
						<thead>
							<tr class="bor">
								<td width="50%">Order summary</td>
								<td width="50%">#1254789935</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Set Meal for 1</td>
								<td>13.50</td>
							</tr>
							<tr class="bor">
								<td>Onion Bhaji</td>
								<td>2.50</td>
							</tr>
							<tr>
								<td><strong>Sub total</strong></td>
								<td><strong>13.50</strong></td>
							</tr>
							<tr>
								<td>Offer Discount</td>
								<td>-5.50</td>
							</tr>
							<tr>
								<td>Delivery fee </td>
								<td>0.00</td>
							</tr>
							<tr class="bor">
								<td><strong>Total</strong></td>
								<td><strong>&pound;20.00</strong></td>
							</tr>
							<tr class="bor">
								<td><strong>Total paid by Cash</strong>  </td>
								<td><strong>&pound;20.00</strong></td>
							</tr>
							<tr>
								<td colspan="2"><strong>Requested delivery time</strong> </td>
								
							</tr>
							<tr>
								<td colspan="2">Sunday 4th Octobor 10:15 PM</td>
								
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section> -->