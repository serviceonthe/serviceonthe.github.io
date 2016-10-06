<!DOCTYPE html>
<html>
<head>
	<title>Mail</title>
</head>
<body style="background: #eee;">
		<div class="container" style="width: 650px;background: #fff;margin: 0 auto;padding: 15px;">

		<h2 style="margin: 0px;padding-bottom: 5px;text-align: center;text-transform: uppercase;">Nawab's Kitchen Order Modification</h2>
			<div class="box" style="margin-bottom: 10px;border: 1px solid #eee;padding: 10px;">
				<table width="100%">
					<tr> 
						<td width="30%">Order Type:</td>
						<td width="20%"><?php echo ucfirst($order_details['order_type']);?></td>

						<td width="15%">Order Id:</td>
						<td width="35%"><?php echo $order_details['order_id'];?></td>
					</tr>
					<tr>
						<?php if($order_details['order_type']=='collection'){?>
                        <td>Collection Date</td>
                        <?php }else{ ?>
                        <td>Delivery Date</td>
                        <?php } ?>
                        <td><?php echo $order_details['delivery_date'];?></td> 
						
						<td>Login Email:</td>
						<td><?php echo $customer_details['email'];?></td>
					</tr>
					<?php if($order_details['first_delivery_time'] == ''){?>
                    		<tr>
		                     	<?php if($order_details['order_type']=='collection'){?>
		                        <td>Collection Time</td>
		                        <?php }else{ ?>
		                        <td>Delivery Time</td>
		                        <?php } ?>
		                        <td><?php echo $order_details['delivery_time'];?></td> 

		                        <td>Order Pin:</td>
								<td><?php echo $customer_details['order_pin'];?></td>
		                    </tr>
                    <?php } else{?>
		                    <tr>
		                     <?php if($order_details['order_type']=='collection'){?>
		                        <td>Collection Requested Time</td>
		                        <?php }else{ ?>
		                        <td>Delivery Requested Time</td>
		                        <?php } ?>
		                        <td><?php echo $order_details['first_delivery_time'];?></td> 

		                        <td>Order Pin:</td>
								<td><?php echo $customer_details['order_pin'];?></td>
		                    </tr> 
		                    <tr>
		                     <?php if($order_details['order_type']=='collection'){?>
		                        <td>Collection Accepted Time</td>
		                        <?php }else{ ?>
		                        <td>Delivery Accepted Time</td>
		                        <?php } ?>
		                        <td><?php echo $order_details['delivery_time'];?></td> 
		                    </tr>
					<?php } ?>

					
					
				</table>
			</div>
			<div class="box" style="margin-bottom: 10px;border: 1px solid #eee;padding: 10px;">
				
				<table width="100%">
					<tr>
						<td width="15%">Name:</td>
						<td width="35%"><?php echo ucfirst($order_details['first_name']) .' '. ucfirst($order_details['last_name']);?></td>
					</tr>
					<!-- <tr>
						<td>Order date:</td>
						<td><?php echo $order_details['order_date'];?></td>
					</tr> -->
                    <tr>
	                    <td>Address:</td>
						<td><?php echo $customer_details['address_line1'] .' '.$customer_details['address_line2'];?></td>
                    </tr>
                    <tr>
	                    <td>Phone:</td>
						<td><?php echo $customer_details['phone'];?></td>
                    </tr>
                   
					<tr>
						<td>Post Code</td>
						<td><?php echo $customer_details['post_code'];?></td> 
					</tr>
					<tr>
						<td>Mobile:</td>
						<td><?php echo $customer_details['mobile'];?></td> 
					</tr>
					<tr>
						<td>Payment Type:</td>
						<?php if($order_details['payment_method']==1) { ?>
						<td>Cash Payment</td> 
						<?php }else if($order_details['payment_method']==2) { ?>
						<td>Paypal</td> 
						<?php }else { ?>
						<td>Worldpay</td> 
						<?php } ?>
					</tr>
                    

				</table>

			</div>
			<div class="box" style="margin-bottom: 10px;border: 1px solid #eee;padding: 10px;">
				<fieldset style="border:1px solid #ccc;">
				<table width="100%">
                    <thead>                                
                        <tr>
                            <td width="45%">Item Name</td>
                            <td width="30%" align="center">Quantity</td>
                            <!-- <td width="15%" align="right">Item Price</td> -->
                            <td width="25%" align="right">Item Total</td>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php if($order_history){?>
	                        <?php foreach ($order_history as $key) {?>
	                                <tr>
	                                    <td ><?php echo $key['item_name'];?></td>    
	                                    <td align="center"><?php echo $key['item_quantity'];?></td>  
	                                    <!-- <td align="right"><?php echo '&pound; '.$key['item_price'];?></td>  -->
	                                    <td align="right"><?php echo '&pound; '.number_format((float) $key['item_total_price'], 2, '.', '');?></td> 
	                                </tr>  
	                        <?php } ?>
                        <?php }else{ echo '<p align="center" ><b>Here is no Menu List<b></p>';} ?>
                    </tbody>       
                </table>
                </fieldset>
                <fieldset style="border:1px solid #ccc;">
	                <table width="100%">
	                		<tr>
								<td></td>
								<td align="right">Item Total Price:</td>
								<td align="right"><?php echo '&pound; '.number_format((float) $order_details['item_price'], 2, '.', '');?></td> 
							</tr>
							<tr>
								<td></td>
								<td align="right">Delivery Charge:</td>
								<td align="right"><?php echo '&pound; '.number_format((float) $order_details['delivery_charge'], 2, '.', '');?></td>  
							</tr>
		                    <tr>
								<td></td>
								<td align="right">Discount:</td>
								<td align="right"><?php echo '&pound; '.number_format((float) $order_details['pin_discount'], 2, '.', '');?></td>  
							</tr>
							<tr>
								<td></td>
								<td align="right">Net payable:</td>
								<td align="right"><?php echo '&pound; '.number_format((float) $order_details['total_price'], 2, '.', '');?></td>
							</tr>
							<tr>
								<td></td>
								<td align="right">Paid Amount:</td>
								<td align="right"><?php echo '&pound; '.number_format((float) $order_details['paid_amount'], 2, '.', '');?></td>
							</tr>
	                                    
	                </table>
                </fieldset>
			</div>
			<div class="box" style="margin-bottom: 10px;border: 1px solid #eee;padding: 10px;">
			You Have a Allargy Problem: &nbsp; <?php if($customer_details['allergy_problem']==1){ ?> Yes <?php } else { ?> No <?php } ?><br>
			Allergy Request: <?php echo $customer_details['special_note']; ?>
			</div>
			<div class="box" style="margin-bottom: 10px;border: 1px solid #eee;padding: 10px;">
				<table width="100%" cellpadding="10">
					<tr>
						<td valign="top">
							<strong> Address</strong><br>
							Burford Road, E15 2SP, London, UK<br>
						</td>
						<td valign="top">
							<strong>Telephone:</strong><br>
							020 3002 0110, 0203 0020 271
						</td>
					</tr>
				</table>
			</div>
		</div>
</body>
</html>