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
				<h2>Reservation Details</h2> 
			</div> 	

		<div class="span9">
		
		<div class="grid" style=" max-width:785px;"> 
           <table>     
                <tbody>
                    <tr>  
                            <th scope="col">Restaurant Name</h2></th> 
							<th scope="col">Restaurant Address</h2></th>
						    <th scope="col">Reservation type</h2></th>   
							<th scope="col">Number of Guest</th> 
                            <th scope="col">Dining Type</th>
                            <th scope="col">Submission Date</th> 
							<th scope="col">Requested Date</th>   
                            <th scope="col">View Reservation</th>       							
					</tr>
                	 <?php if(count($query)>0){  
					 
					 
							
                            foreach($query as $reserve){
							?>			
                    <tr>
					        <td>
                              <?php echo $reserve['res_name'];?>
                            </td>
							<td>
                                <?php echo $reserve['res_address'];?>
                            </td>
                            <td>
								<?php if($reserve['reservation_type']==1){
						        echo "Lunch";
								}else{
								echo "Dinner"; 
								}
								?>
                            </td> 
							<td>
                                <?php echo $reserve['people'];?>
                            </td>  
                            <td>
                                <?php
	
								if ($reserve['dining_type']==1) {
									echo "Family";
								} elseif ($reserve['dining_type']==2) {
									echo "Corporate";
								}
                                  elseif ($reserve['dining_type']==3) {
									echo "Occasional";
								}
                                  elseif ($reserve['dining_type']==4) {
									echo "Friends";
								}
                                  elseif ($reserve['dining_type']==5) {
									echo "Romantic";
								} 								
								  else {  
									echo "Other";  
								} 					
								?>
                            </td>
                            <td>
                                <?php echo $reserve['reserve_submission_date'];?> 
                            </td>
							<td>
                                <?php echo $reserve['reserve_requested_date'];?>   
                            </td>
							<td>
							<a href="<?php echo base_url()?>user/reserve_view/<?php echo $reserve['restaurant_id'];?>/<?php echo $reserve['reservation_id'];?>">View</a>  
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

