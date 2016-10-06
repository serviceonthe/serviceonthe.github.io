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
					<h2>Change Password</h2>
				</div>  

            <div class="validation_error">
	          <?php echo validation_errors(); ?> 
	        </div>



				
				
                <div class="span6">
              <?php $data=array('class'=>'checkout'); echo form_open('user/change_password',$data); ?>       
                <p id="billing_company_field" class="form-row form-row-wide">
                <label class="" for="billing_company">New Password</label>
                <input type="Password" required placeholder="New Password" id="new_password" name="new_password"  class="input-text">
                </p>
                
                <p id="billing_company_field" class="form-row form-row-wide">
                <label class="" for="billing_company">Confirm Password</label>
                <input type="password" required placeholder="Confirm Password" id="conf_password" name="conf_password"  class="input-text">
                </p>
                <p id="billing_company_field" class="form-row form-row-wide">
                    <input type="submit" class="btns btn-submit-3" value="SUBMIT" name="submit">
                </p>
                </form>
                </div>
				<div class="span2 hidden-phone">  
					<img src="<?php  echo base_url(); ?>assets/images/locker.png" class="img img-rounded" />
				</div>
 
            </div>    
        </div>
    </div>
  <!--Content Area End--> 
  
  
  
  
  
  
  
  
  
  
  