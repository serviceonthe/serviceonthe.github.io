  <!--Banner Start-->
  <section id="banner" class="height">
    <div class="contact-banner"><img src="<?php  echo base_url(); ?>assets/images/inner-banner-1.jpg" alt="img"></div>
  </section>
  <!--Banner End-->

    <div class="container">  
        <div class="row">
		
            <div class="span3 new-bg widget-area">
			<div class="header">
                <h2>Welcome: <?php echo  $this->session->userdata('first_name');?></h2>
            </div> 
			<p><a class="btn" href="<?php echo base_url();?>my-account">My Account</a></p>
			<p><a class="btn" href="<?php echo base_url('user/my_order');?>">Order History</a></p>
			<p><a class="btn" href="<?php echo base_url('user/restaurant_reservation');?>">Reservation History</a></p>
			<p><a class="btn" href="<?php echo base_url();?>update-account">Update Account</a></p> 
			<p><a class="btn" href="<?php echo base_url();?>change-password">Change Password</a></p>
			<p><a class="btn" href="<?php echo base_url();?>log-out">Logout</a></p> 

			
			
			
			
			</div>   

		<div class="span9  new-bg widget-area"> 
			<div class="header">
				<h2>Order Details</h2> 
			</div> 	

		<div class="span9">
		
		<div class="grid" style=" max-width:785px;">
		    <table>     
                <tbody>
                    <tr>  
                            <th scope="col">Order Id </h2></th>   
						    <th scope="col">Restaurant Name</h2></th>
                            <th scope="col">Post-Code</h2></th>							
                            <th scope="col">Order Type</th>  
							<th scope="col">Total Price</th> 
							<th scope="col">Order Date</th> 
							<th scope="col">Delivery Date</th> 
							<th scope="col">View Order</th>  

					</tr>
                	 <?php if(count($order)>0){  
                            foreach($order as $ord){
							?>
                    <tr>
					        <td>
                              <?php echo $ord['order_id'];?>
                            </td>		
							<td> 
                                <?php echo $ord['res_name'];?>
                            </td>
							<td>      
                              <?php echo $ord['res_post_code'];?>
                            </td>
							<td>
                                <?php echo $ord['order_type'];?>
                            </td>
							<td>
                                <?php echo $ord['total_price'];?>
                            </td>
							<td>
                                <?php echo $ord['order_date'];?> 
                            </td>
                            <td>
                                <?php echo $ord['delivery_date'];?>
                            </td>
							<td>
							<a href="<?php echo base_url()?>user/order_view/<?php echo $ord['res_id'];?>/<?php echo $ord['order_id'];?>">View</a>  
							</td>

			        </tr>
                        <?php }}else{?>
                    <tr>
                            <td colspan="10" align="center">
                                <h1>No data found.</h1>
                            </td>
                    </tr>
                        <?php }?>
                </tbody>
            </table>
           <?php echo $this->pagination->create_links(); ?>
        </div>
		</div>
        </div>
      </div>
    </div>	
