  <!--Banner Start-->
  <section id="banner" class="height">
    <div class="contact-banner"><img src="<?php  echo base_url(); ?>assets/images/inner-banner-1.jpg" alt="img"></div>
  </section>
  <!--Banner End--> 
<section id="content" class="container"> 
  
    <div class="validation_error">
	  <?php echo validation_errors(); ?> 
	</div>

  
<section class="checkout-page">
      <div class="container">
	  
        <div class="row-fluid">
          <div class="span12">
            <div class="span12 res-title">
			<h4 style="padding:0px; line-height:10px; margin:0px;">
            User Login
			</h4>
            </div>
          </div>
        </div>
		
        <div class="row-fluid">
          <div class="span12 new-bg" id="block_content_first">
            <div class="search-page">
            
            <div class="span6">
              <?php $data=array('class'=>'checkout'); echo form_open('user/log_in',$data); ?> 
                <p id="billing_company_field" class="form-row form-row-wide">
                <label class="" for="billing_company">User Email</label>
                <input type="text" required placeholder="User Email" id="email" name="email"  class="input-text">
                </p>
                
                <p id="billing_company_field" class="form-row form-row-wide">
                <label class="" for="billing_company">Password</label>
                <input type="password" required placeholder="Password" id="password" name="password"  class="input-text">
                </p>

                <p id="billing_company_field" class="form-row form-row-wide">
                    <input type="submit" class="btns btn-submit-3" value="SUBMIT" name="submit">
                </p>
              </form>
            </div>
            <div class="span6 hidden-phone">
                <img src="<?php  echo base_url(); ?>assets/images/locker.png" class="img img-rounded" />
            </div>
                <p align="center"><small><a href="#">Forgot Password</a> | <a href="<?php echo base_url('sign-up'); ?>">Signup</a></small></p>
             
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
  <!--Content Area End--> 