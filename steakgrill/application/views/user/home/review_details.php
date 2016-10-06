	<style type="text/css">
		.ratings .fa{
			color: #ce0b10;
			font-size: 15px;
		}
	</style>

	<div class="container">
		<div class="box1 overview ratings">
			<strong>Order overview</strong>

				<table class="table">
					<thead>
						<tr>
							<td width="10%">Order Id</td>
							<td width="15%">Food quality rating</td>
							<td width="15%">Delivery time rating</td>
							<td width="15%">Takeway service rating</td>
							<td width="35%">Review massage</td>
							<td width="20%">Creation Date Time</td>
						</tr>
					</thead>
					<tbody>
					<?php 
					//print_r($review_details);
					if($review_details){
						$no_order=0;
							foreach($review_details as $key=> $value){
							$no_order +=1;
						?>
							<tr>
								<td><?php echo $value['order_id']; ?></td>
								<td>
									<input name="food_quality" type="hidden" readonly="" class="rating" data-filled="fa fa-star fa-3x" data-empty="fa fa-star-o fa-3x" value="<?php echo $value['food_quality_rating']; ?>" />
								</td>
								<td>
									<input name="food_quality" type="hidden" readonly="" class="rating" data-filled="fa fa-star fa-3x" data-empty="fa fa-star-o fa-3x" value="<?php echo $value['delivery_time_rating']; ?>" />
								</td>
								<td>
									<input name="food_quality" type="hidden" readonly="" class="rating" data-filled="fa fa-star fa-3x" data-empty="fa fa-star-o fa-3x" value="<?php echo $value['takeway_service_rating']; ?>" />
								</td>
								<!-- <td><?php echo $value['delivery_time_rating']; ?></td>
								<td><?php echo $value['takeway_service_rating']; ?></td> -->
								<td><?php echo $value['review_massage']; ?></td>
								<td>
									<?php echo date('D M-Y h:i:a',strtotime($value['creationDateTime'])); ?>
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