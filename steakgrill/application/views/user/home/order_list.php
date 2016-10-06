<?php 

	$l_order_pin=$this->session->userdata('l_order_pin');
?>


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

							<!-- <td>
								<a href="#"> Good </a>
							</td> -->
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