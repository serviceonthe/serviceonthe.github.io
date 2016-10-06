<!DOCTYPE html>
<html>
<head>
	<title>Mail</title>
</head>
<body style="background: #eee;">
		<div class="container" style="max-width: 270px; background: #fff;margin: 0 auto;padding: 15px;">
			
			<br>
			<br>
			
			<h2 style="margin: 0px;padding-bottom: 5px;text-align: center;text-transform: uppercase;">Bedford Order Confirmation</h2>
			
			<br>
			<br>
			
			<div class="box" style="margin-bottom: 10px;border: 1px solid #eee;padding: 10px;">
				<table width="100%">
					<tr>
						<td width="50%">Order Type:</td>
						<td width="50%"><?php echo ucfirst($order_details['order_type']);?></td>
					</tr>
					<tr>
						<td>Order Id:</td>
						<td><?php echo $order_details['order_id'];?></td>
					</tr>
					<tr>
						<?php if($order_details['order_type']=='collection'){?>
                        <td><h3>Collection Date</h3></td>
                        <?php }else{ ?>
                        <td><h3>Delivery Date</h3></td>
                        <?php } ?>
                        <td><h3><?php echo $order_details['delivery_date'];?></h3></td> 
					</tr>
					<?php if($order_details['first_delivery_time'] == ''){?>
                    		<tr>
		                     	<?php if($order_details['order_type']=='collection'){?>
		                        <td><h3>Collection Time</h3></td>
		                        <?php }else{ ?>
		                        <td><h3>Delivery Time</h3></td>
		                        <?php } ?>
		                        <td><h3><?php echo $order_details['delivery_time'];?></h3></td> 

		                        <td></td>
								<td><?php //echo $customer_details['order_pin'];?></td>
		                    </tr>
                    <?php } else{?>
		                    <tr>
		                     <?php if($order_details['order_type']=='collection'){?>
		                        <td><h3>Collection Requested Time</h3></td>
		                        <?php }else{ ?>
		                        <td><h3>Delivery Requested Time</h3></td>
		                        <?php } ?>
		                        <td><h3><?php echo $order_details['first_delivery_time'];?></h3></td> 

		                        <td></td>
								<td><?php //echo $customer_details['order_pin'];?></td>
		                    </tr> 
		                    <tr>
		                     <?php if($order_details['order_type']=='collection'){?>
		                        <td><h3>Collection Accepted Time</h3></td>
		                        <?php }else{ ?>
		                        <td><h3>Delivery Accepted Time</h3></td>
		                        <?php } ?>
		                        <td><h3><?php echo $order_details['delivery_time'];?></h3></td> 
		                    </tr>
					<?php } ?>

				</table>
			</div>
			<br>
			<br>
			<div class="box" style="margin-bottom: 10px;border: 1px solid #eee;padding: 10px;">
				
				<table width="100%">
					

<tr>

						<td width="50%"><strong><?php echo ucfirst($order_details['first_name']) .' '. ucfirst($order_details['last_name']);?></strong></td>
					</tr>
                    <tr>

						<td><strong><?php echo $customer_details['address_line1'].', '.$customer_details['address_line2'];?></strong></td>
                    </tr>
					<tr>
						<td><strong><?php echo strtoupper($customer_details['city']);?></strong></td> 
					</tr>
					<tr>
						<td><strong><?php echo $customer_details['post_code'];?></strong></td> 
					</tr>
					<tr>
					
					</tr>
					<tr>
						<td><strong><?php echo $customer_details['mobile'];?></strong></td> 
					</tr>
                    <tr>
						<td><strong><?php echo $customer_details['phone'];?></strong></td>
                    </tr>
					
					
					
					<tr>
						<?php if($order_details['payment_method']==1) { ?>
						<td><h3>CASH PAYMENT</h3></td> 
						<?php }else if($order_details['payment_method']==2) { ?>
						<td><h3>CARD PAYMENT</h3></td> 
						<?php }else if($order_details['payment_method']==6) { ?>
						<td><h3>Telephone Card Payment</h3></td> 
						<?php }else { ?>
						<td><h3>CARD PAYMENT</h3></td> 
						<?php } ?>
					</tr>
                    
				</table>

			</div>
			<br>
			<br>
			<div class="box" style="margin-bottom: 10px;border: 1px solid #eee;padding: 10px;">
				<fieldset style="border:1px solid #ccc;">
				<table width="100%">
                    <thead>                                
                        <tr>
                            <td width="60%">Item Name</td>
                            <td width="40%" align="left">Price</td>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php if($order_history){?>
	                        <?php foreach ($order_history as $key) {?>
	                        		<tr>
	                                    <td >
	                                    	<b>
	                                    	<?php 
	                                    		//if ($key['item_quantity'] > 1) {
	                                    			echo $key['item_quantity'].' X '.$key['item_name'];
	                                    		//}else{
	                                    			//echo $key['item_name'];
	                                    		//}
	                                    	?>
	                                    	</b>
	                                    </td>    
	                                    <!-- <td align="center"><?php echo $key['item_quantity'];?></td>   -->
	                                    <td align="left"><?php echo '&pound; '.number_format((float) $key['item_total_price'], 2, '.', '');?></td>
	                                </tr> 
	                                <!-- <tr>
	                                    <td ><?php echo $key['item_name'];?></td>    
	                                    <td align="center"><?php echo $key['item_quantity'];?></td>  
	                                    <td align="right"><?php echo '&pound; '.number_format((float) $key['item_total_price'], 2, '.', '');?></td>
	                                    <td width="15%" align="right"></td> 
	                                </tr>  --> 
	                        <?php } ?>
                        <?php }else{ echo '<p align="center" ><b>Here is no Menu List<b></p>';} ?>
                    </tbody>       
                </table>
                </fieldset>
				<br>
				<br>
                <fieldset style="border:1px solid #ccc;">
	                <table width="100%">
	                		<tr>
								<td align="left" width="60%"></td>
								<td align="left" width="40%"></td> 
							</tr>
	                		<tr>
								<td align="left">Item Total Price:</td>
								<td align="left"><?php echo '&pound; '.number_format((float) $order_details['item_price'], 2, '.', '');?></td> 
								<td></td>
							</tr>
							<tr>
								<td align="left">Delivery Charge:</td>
								<td align="left"><?php echo '&pound; '.number_format((float) $order_details['delivery_charge'], 2, '.', '');?></td>  
								<td></td>
							</tr>
		                    <tr>
								<td align="left">Discount:</td>
								<td align="left"><?php echo '&pound; '.number_format((float) $order_details['pin_discount'], 2, '.', '');?></td>  
								<td></td>
							</tr>
							<?php if($order_details['date_discount_value'] > 0 ){ ?>
							<tr>
								<td align="right" colspan="2">Date Discount:</td>
								<td align="right"><?php echo '&pound; '.number_format((float) $order_details['date_discount_value'], 2, '.', '');?></td>
								<td></td>  
							</tr>
							<?php } ?>
							<tr>
								<td align="left">Net payable:</td>
								<td align="left"><?php echo '&pound; '.number_format((float) $order_details['total_price'], 2, '.', '');?></td>
								<td></td>
							</tr>
							<tr>
								<td align="left">Paid Amount:</td>
								<td align="left"><?php echo '&pound; '.number_format((float) $order_details['paid_amount'], 2, '.', '');?></td>
							</tr>
							<tr>
								<br>
								<br>
							</tr>
	                                    
	                </table>
                </fieldset>
			</div>
			<br>
			<br>
			<div class="box" style="margin-bottom: 10px;border: 1px solid #eee;padding: 10px;">
			Customer Comments: <?php echo $customer_details['special_note']; ?>
			</div>
			<br>
			<br>
			<div class="box" style="margin-bottom: 10px;border: 1px solid #eee;padding: 10px;">
				<table width="100%" cellpadding="10">
					<tr>
						<br>
						<br>
					</tr>
					<tr>
						<td valign="top">
							<strong> Address</strong><br>
							Radhuni The Embankment Bedford<br>
							38 The Embankment Bedford<br>
							Bedfordshire, MK40 3PF<br>
						</td>
						<td valign="top">
							<strong>Telephone:</strong><br>
							Reservation: 01234 272227<br>
							Contact: 01234 272227
						</td>
					</tr>
				</table>
			</div>
		</div>
</body>
</html>
