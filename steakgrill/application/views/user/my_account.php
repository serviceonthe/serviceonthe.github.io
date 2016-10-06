  <!--Banner Start-->
  <section id="banner" class="height">
    <div class="contact-banner"><img src="<?php  echo base_url(); ?>assets/images/inner-banner-1.jpg" alt="img"></div>
  </section>
  <!--Banner End-->       

                                         
      <div class="container">  

        <div class="row">
            <div class="span3 new-bg widget-area">
			<div class="header">
                <h2>Welcome: <?php echo $customer['first_name'];?></h2>
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
				<h2>Account Details</h2>
			</div>
			
                                <div class="alert alert-success" id="mydiv">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <span><?php if($this->session->flashdata('message')) {
                                echo '<div class="message"> ';
                                echo ''.$this->session->flashdata('message').'';
                                //$this->session->keep_flashdata('message');
                                echo'</div>';
                                }?></span> 
                                </div>    
                                <script>
                                setTimeout(function() {
                                $('#mydiv').fadeOut('fast');
                                }, 2000); // <-- time in milliseconds
                                </script>
			
			<div class="row">
			<div class="span4">
                <h4>Your Details</h4>   
				<hr>
				<table class="your-details">
					<tr>
						<td><b>First Name:</b></td><td> <?php echo $customer['first_name'];?></td>
					</tr>
					<tr>
						<td><b>Last Name: </b></td><td><?php echo $customer['last_name'];?></td>
                    </tr>
					<tr>			
						<td><b>Gender: </b></td><td><?php if($customer['last_name']==1)
						{
						  echo "Male";
						} else
						{
						  echo "Female";
						}
						?> 
						</td>
					</tr>
					<tr>
						<td><b>Email: </b></td><td><?php echo $customer['email'];?></td>
					</tr>
					<tr>
						<td><b>Phone number: </b></td><td><?php echo $customer['phone'];?></td>
                    </tr>
					<tr>
						<td><b>Mobile number: </b></td><td><?php echo $customer['mobile'];?></td>
                    </tr>
				</table>
			</div>
			
			<div class="span4">
                <h4>Delivery Address</h4>  
					<hr>
            
                    <div class="shipping_address">
                     
				<table class="your-details">
					<tr>
						<td><b>Address Line 1: </b></td><td><?php echo $customer['address_line1'];?></td>     
					</tr>
					<tr>
						<td><b>Address Line 2: </b></td><td><?php echo $customer['address_line2'];?></p></td>
					</tr>
					<tr>
					    <td><b>Postcode: </b></td><td><?php echo $customer['post_code'];?>
					</tr>
					<tr>
						<td><b>City: </b></td><td><?php echo $customer['city'];?></td>
					</tr>
					<tr>
					    <td><b>Country : </b></td><td><?php echo $customer['country'];?></td>
                    </tr>
				</table>
               
                    <div class="clear"></div>
               
                  </div>
                  
            </div>
			</div>
                  </div>    
                  </div>
            </div>
  <!--Content Area End--> 