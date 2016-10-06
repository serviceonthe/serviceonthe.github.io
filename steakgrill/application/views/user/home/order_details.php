<style type="text/css">
	.ratings .fa{
		color: #ce0b10;
		font-size: 17px;
	}
</style>

<?php 
	// echo '<pre>';
	// print_r($order_list); 
	// echo '</pre>';
?>

	<div class="container">
		<div class="row">
			<!-- <div class="col-md-12">
				<h4>Hi <?php echo $customer_info['first_name'].' '.$customer_info['last_name']; ?>, how was your mail?</h4>
			</div> -->
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
<section class="rating-sec">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="box2 rate ratings">
				<h3>Your Review</h3>
				<table class="table">

						<tr>
							<td width="15%">Food quality rating</td>
						</tr>
						<tr>
							<td>
								<input name="food_quality" type="hidden" readonly="" class="rating" data-filled="fa fa-star fa-3x" data-empty="fa fa-star-o fa-3x" value="<?php echo $review_details[0]['food_quality_rating']; ?>" />
							</td>
						</tr>
						<tr>
							<td width="15%">Delivery time rating</td>
						</tr>

						<tr>
							<td>
								<input name="food_quality" type="hidden" readonly="" class="rating" data-filled="fa fa-star fa-3x" data-empty="fa fa-star-o fa-3x" value="<?php echo $review_details[0]['delivery_time_rating']; ?>" />
							</td>
						</tr>

						<tr>
							<td width="15%">Takeway service rating</td>
						</tr>

						<tr>
							<td>
								<input name="food_quality" type="hidden" readonly="" class="rating" data-filled="fa fa-star fa-3x" data-empty="fa fa-star-o fa-3x" value="<?php echo $review_details[0]['takeway_service_rating']; ?>" />
							</td>
							
						</tr>

				</table>
				</div>
			</div>
			<div class="col-md-6">
				<div class="re-box">
					<?php echo anchor('user/re_order/'.$order_id,'<p class="btn btn-warning btn-block btn-lg">Re-order this meal</p>',array("onclick"=>"return confirm('Are you want to submit your new order ?')"));?>
					<!-- <a href="" class="btn btn-warning btn-block btn-lg"></a> -->
				</div>
				<div class="box2 reorder">
					<table width="100%">
						<thead>
							<tr class="bor">
								<td width="50%">Order summary</td>
								<td width="50%"><?php echo '#'.$order_id ?></td>
							</tr>
						</thead>
						<tbody>
							<?php 
							// echo '<pre>';
							// 	print_r($order_list);
							// 	echo '</pre>';
							foreach ($order_details as $key => $value) { ?>
								<tr>
									<?php if($value['item_quantity'] > 1){ ?>
										<td><?php echo $value['item_quantity'].' x '.$value['item_name'];?></td>

									<?php }else{ ?>
										<td><?php echo $value['item_name'];?></td>
									<?php }?>
									<td><?php echo $value['item_total_price'];?></td>
								</tr>
							<?php } ?>
							<tr class="bor">
								<td><strong>Sub total</strong></td>
								<td><strong><?php echo $order_list[0]['item_price'];?></strong></td>
							</tr>
							<tr>
								<td>Offer Discount</td>
								<td> - <?php 
										if($order_list[0]['pin_discount'] > 0){
											echo $order_list[0]['pin_discount'];
										}elseif($order_list[0]['pin_discount'] > 0){
											echo $order_list[0]['pin_discount'];
										}else{
											echo '0.00';
										}
									?>
									</td>
							</tr>
							<tr>
								<td>Delivery fee </td>
								<td><?php echo $order_list[0]['delivery_charge'];?></td>
							</tr>
							<tr class="bor">
								<td><strong>Total</strong></td>
								<td><strong>&pound;<?php echo $order_list[0]['total_price'];?></strong></td>
							</tr>
							<tr class="bor">
								<td><strong>Total paid by Cash</strong>  </td>
								<td><strong>&pound;<?php echo $order_list[0]['total_price'];?></strong></td>
							</tr>
							<tr>
								<td colspan="2"><strong>Requested delivery time</strong> </td>
								
							</tr>
							<tr>
								<td colspan="2">
									<?php 
										$delivery_date=$order_list[0]['delivery_date'];
										$delivery_time=$order_list[0]['delivery_time'];

										$d=explode('/', $delivery_date);
										$new_date=$d[2].'-'.$d[1].'-'.$d[0];

										echo date('l d M Y',strtotime($new_date)). ' ' . $delivery_time;

									?>
								</td>
								
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>








<!-- 	<div class="container">
		<div class="box1 overview">
			<strong>Order overview</strong>

				<table class="table">
					<thead>
						<tr>
							<td width="30%">Item name</td>
							<td width="20%">order date time</td>
							<td width="20%">delivery_date time</td>
							<td width="15%">item_price</td>
							<td width="10%">item_quantity</td>
							<td width="15%">item_total_price</td>
						</tr>
					</thead>
					<tbody>
					<?php 
					$no_order=0;
						foreach($order_details as $key=> $value){
						$no_order +=1;
					?>
						<tr>
							<td ><?php echo $value['item_name']; ?></td>
							<td ><?php echo $value['order_date'].' '.$value['order_time']; ?></td>
							<td ><?php echo $value['delivery_date'].' '.$value['delivery_time']; ?></td>
							<td><?php echo $value['item_price']; ?></td>
							<td><?php echo $value['item_quantity']; ?></td>
							<td><?php echo $value['item_total_price']; ?></td>
						</tr>

					<?php } ?>
						
						<tr>
							<td colspan="5">Number of Item: <?php echo $no_order; ?></td>
						</tr>
					</tbody>
				</table>
		</div>
	</div> -->