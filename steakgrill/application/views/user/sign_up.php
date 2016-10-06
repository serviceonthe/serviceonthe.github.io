<!--  
  Banner Start-->
  <section id="banner" class="height">
    <div class="contact-banner"><img src="<?php  echo base_url(); ?>assets/images/inner-banner-1.jpg" alt="img"></div>
  </section>
  <!-- Banner End -->
 
   <!--Content Area Start-->
  <section id="content" class="container"> 
      <div id="login_error" class="error"><?php echo $this->session->flashdata('message');?></div>
    <!--Blog Page Section Start-->
    <section class="blog-page-section">
      <div class="row-fluid">
		<div class="span12 new-bg" style="margin-bottom:15px; background:#e3e2e3; color:#900;">
			<h4 style="padding:0px; line-height:10px; margin:0px;">
            Customer Registration 
			</h4>
        </div>
      </div> <!--Blog Post End-->
    </section>
    
    
	<div class="validation_error">  
	  <?php echo validation_errors(); ?> 
	</div>   
	   
    
    <section class="checkout-page">
      <div class="row-fluid">
        <div class="span12 new-bg" id="block_content_first">
          <article class=" mbtm  first">
            <div class="woocommerce">
			
			
              <?php $data=array('class'=>'checkout'); echo form_open_multipart('user/signup',$data); ?>
                <div id="customer_details" class="col2-set">
                  <div class="col-1">
                    <h3>Customer Details</h3> 
                    
                    <p id="billing_company_field" class="form-row form-row-wide">
                      <label class="" for="billing_company">First Name <abbr title=" " class="required">*</abbr></label>
                      <input type="text"   placeholder="First Name" id="first_name" name="first_name" value="" class="input-text" required>
                    </p>
                    
					<p id="billing_company_field" class="form-row form-row-wide">
                      <label class="" for="billing_company">Last Name <abbr title=" " class="required">*</abbr></label>
                      <input type="text"   placeholder="Last Name" id="last_name" name="last_name" value="" class="input-text" required>
                    </p>
					
					<p id="billing_company_field" class="form-row form-row-wide">
                      <label class="" for="billing_company">Gender<abbr title=" " class="required">*</abbr></label>
						<select id="gender" name="gender" required> 
						  <option value=" ">-Select Gender-</option>
						  <option value="1">Male</option>
						  <option value="2">Female</option>
						</select>                    
					</p>
					
					<p id="billing_company_field" class="form-row form-row-wide">
                      <label class="" for="billing_company">Address Line 1 <abbr title=" " class="required">*</abbr></label>
                      <input type="text"   placeholder="Address 1" id="address_line1" name="address_line1" value="" class="input-text" required>
                    </p>
					
					<p id="billing_company_field" class="form-row form-row-wide">
                      <label class="" for="billing_company">Address Line 2 </label>
                      <input type="text"   placeholder="Address 2" id="address_line2" name="address_line2" value="" class="input-text">
                    </p>
					
					<p id="billing_company_field" class="form-row form-row-wide">
                      <label class="" for="billing_company">Postcode <abbr title=" " class="required">*</abbr></label>
                      <input type="text"   placeholder="postcode" id="post_code" name="post_code" value="" class="input-text" required>
                    </p> 
					
					<p id="billing_company_field" class="form-row form-row-wide">
                      <label class="" for="billing_company">City <abbr title=" " class="required">*</abbr></label>
                      <input type="text"   placeholder="City" id="city" name="city" value="" class="input-text" required>
                    </p>
					
					<p id="billing_company_field" class="form-row form-row-wide">
                        <label class="" for="shipping_country">Country <abbr title=" " class="required">*</abbr></label>
                        <select id="country" name="country" required>  
                          <option value="">Select a countryâ€¦</option>
                          <option value="AX">Ã…land Islands</option>
                          <option value="AF">Afghanistan</option>
                          <option value="AL">Albania</option>
                          <option value="DZ">Algeria</option>
                          <option value="AD">Andorra</option>
                          <option value="AO">Angola</option>
                          <option value="AI">Anguilla</option>
                          <option value="AQ">Antarctica</option>
                          <option value="AG">Antigua and Barbuda</option>
                          <option value="AR">Argentina</option>
                          <option value="AM">Armenia</option>
                          <option value="AW">Aruba</option>
                          <option value="AU">Australia</option>
                          <option value="AT">Austria</option>
                          <option value="AZ">Azerbaijan</option>
                          <option value="BS">Bahamas</option>
                          <option value="BH">Bahrain</option>
                          <option value="BD">Bangladesh</option>
                          <option value="BB">Barbados</option>
                          <option value="BY">Belarus</option>
                          <option value="PW">Belau</option>
                          <option value="BE">Belgium</option>
                          <option value="BZ">Belize</option>
                          <option value="BJ">Benin</option>
                          <option value="BM">Bermuda</option>
                          <option value="BT">Bhutan</option>
                          <option value="BO">Bolivia</option>
                          <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                          <option value="BA">Bosnia and Herzegovina</option>
                          <option value="BW">Botswana</option>
                          <option value="BV">Bouvet Island</option>
                          <option value="BR">Brazil</option>
                          <option value="IO">British Indian Ocean Territory</option>
                          <option value="VG">British Virgin Islands</option>
                          <option value="BN">Brunei</option>
                          <option value="BG">Bulgaria</option>
                          <option value="BF">Burkina Faso</option>
                          <option value="BI">Burundi</option>
                          <option value="KH">Cambodia</option>
                          <option value="CM">Cameroon</option>
                          <option value="CA">Canada</option>
                          <option value="CV">Cape Verde</option>
                          <option value="KY">Cayman Islands</option>
                          <option value="CF">Central African Republic</option>
                          <option value="TD">Chad</option>
                          <option value="CL">Chile</option>
                          <option value="CN">China</option>
                          <option value="CX">Christmas Island</option>
                          <option value="CC">Cocos (Keeling) Islands</option>
                          <option value="CO">Colombia</option>
                          <option value="KM">Comoros</option>
                          <option value="CG">Congo (Brazzaville)</option>
                          <option value="CD">Congo (Kinshasa)</option>
                          <option value="CK">Cook Islands</option>
                          <option value="CR">Costa Rica</option>
                          <option value="HR">Croatia</option>
                          <option value="CU">Cuba</option>
                          <option value="CW">CuraÃ‡ao</option>
                          <option value="CY">Cyprus</option>
                          <option value="CZ">Czech Republic</option>
                          <option value="DK">Denmark</option>
                          <option value="DJ">Djibouti</option>
                          <option value="DM">Dominica</option>
                          <option value="DO">Dominican Republic</option>
                          <option value="EC">Ecuador</option>
                          <option value="EG">Egypt</option>
                          <option value="SV">El Salvador</option>
                          <option value="GQ">Equatorial Guinea</option>
                          <option value="ER">Eritrea</option>
                          <option value="EE">Estonia</option>
                          <option value="ET">Ethiopia</option>
                          <option value="FK">Falkland Islands</option>
                          <option value="FO">Faroe Islands</option>
                          <option value="FJ">Fiji</option>
                          <option value="FI">Finland</option>
                          <option value="FR">France</option>
                          <option value="GF">French Guiana</option>
                          <option value="PF">French Polynesia</option>
                          <option value="TF">French Southern Territories</option>
                          <option value="GA">Gabon</option>
                          <option value="GM">Gambia</option>
                          <option value="GE">Georgia</option>
                          <option value="DE">Germany</option>
                          <option value="GH">Ghana</option>
                          <option value="GI">Gibraltar</option>
                          <option value="GR">Greece</option>
                          <option value="GL">Greenland</option>
                          <option value="GD">Grenada</option>
                          <option value="GP">Guadeloupe</option>
                          <option value="GT">Guatemala</option>
                          <option value="GG">Guernsey</option>
                          <option value="GN">Guinea</option>
                          <option value="GW">Guinea-Bissau</option>
                          <option value="GY">Guyana</option>
                          <option value="HT">Haiti</option>
                          <option value="HM">Heard Island and McDonald Islands</option>
                          <option value="HN">Honduras</option>
                          <option value="HK">Hong Kong</option>
                          <option value="HU">Hungary</option>
                          <option value="IS">Iceland</option>
                          <option value="IN">India</option>
                          <option value="ID">Indonesia</option>
                          <option value="IR">Iran</option>
                          <option value="IQ">Iraq</option>
                          <option value="IM">Isle of Man</option>
                          <option value="IL">Israel</option>
                          <option value="IT">Italy</option>
                          <option value="CI">Ivory Coast</option>
                          <option value="JM">Jamaica</option>
                          <option value="JP">Japan</option>
                          <option value="JE">Jersey</option>
                          <option value="JO">Jordan</option>
                          <option value="KZ">Kazakhstan</option>
                          <option value="KE">Kenya</option>
                          <option value="KI">Kiribati</option>
                          <option value="KW">Kuwait</option>
                          <option value="KG">Kyrgyzstan</option>
                          <option value="LA">Laos</option>
                          <option value="LV">Latvia</option>
                          <option value="LB">Lebanon</option>
                          <option value="LS">Lesotho</option>
                          <option value="LR">Liberia</option>
                          <option value="LY">Libya</option>
                          <option value="LI">Liechtenstein</option>
                          <option value="LT">Lithuania</option>
                          <option value="LU">Luxembourg</option>
                          <option value="MO">Macao S.A.R., China</option>
                          <option value="MK">Macedonia</option>
                          <option value="MG">Madagascar</option>
                          <option value="MW">Malawi</option>
                          <option value="MY">Malaysia</option>
                          <option value="MV">Maldives</option>
                          <option value="ML">Mali</option>
                          <option value="MT">Malta</option>
                          <option value="MH">Marshall Islands</option>
                          <option value="MQ">Martinique</option>
                          <option value="MR">Mauritania</option>
                          <option value="MU">Mauritius</option>
                          <option value="YT">Mayotte</option>
                          <option value="MX">Mexico</option>
                          <option value="FM">Micronesia</option>
                          <option value="MD">Moldova</option>
                          <option value="MC">Monaco</option>
                          <option value="MN">Mongolia</option>
                          <option value="ME">Montenegro</option>
                          <option value="MS">Montserrat</option>
                          <option value="MA">Morocco</option>
                          <option value="MZ">Mozambique</option>
                          <option value="MM">Myanmar</option>
                          <option value="NA">Namibia</option>
                          <option value="NR">Nauru</option>
                          <option value="NP">Nepal</option>
                          <option value="NL">Netherlands</option>
                          <option value="AN">Netherlands Antilles</option>
                          <option value="NC">New Caledonia</option>
                          <option value="NZ">New Zealand</option>
                          <option value="NI">Nicaragua</option>
                          <option value="NE">Niger</option>
                          <option value="NG">Nigeria</option>
                          <option value="NU">Niue</option>
                          <option value="NF">Norfolk Island</option>
                          <option value="KP">North Korea</option>
                          <option value="NO">Norway</option>
                          <option value="OM">Oman</option>
                          <option value="PK">Pakistan</option>
                          <option value="PS">Palestinian Territory</option>
                          <option value="PA">Panama</option>
                          <option value="PG">Papua New Guinea</option>
                          <option value="PY">Paraguay</option>
                          <option value="PE">Peru</option>
                          <option value="PH">Philippines</option>
                          <option value="PN">Pitcairn</option>
                          <option value="PL">Poland</option>
                          <option value="PT">Portugal</option>
                          <option value="QA">Qatar</option>
                          <option value="IE">Republic of Ireland</option>
                          <option value="RE">Reunion</option>
                          <option value="RO">Romania</option>
                          <option value="RU">Russia</option>
                          <option value="RW">Rwanda</option>
                          <option value="ST">SÃ£o TomÃ© and PrÃ­ncipe</option>
                          <option value="BL">Saint BarthÃ©lemy</option>
                          <option value="SH">Saint Helena</option>
                          <option value="KN">Saint Kitts and Nevis</option>
                          <option value="LC">Saint Lucia</option>
                          <option value="SX">Saint Martin (Dutch part)</option>
                          <option value="MF">Saint Martin (French part)</option>
                          <option value="PM">Saint Pierre and Miquelon</option>
                          <option value="VC">Saint Vincent and the Grenadines</option>
                          <option value="SM">San Marino</option>
                          <option value="SA">Saudi Arabia</option>
                          <option value="SN">Senegal</option>
                          <option value="RS">Serbia</option>
                          <option value="SC">Seychelles</option>
                          <option value="SL">Sierra Leone</option>
                          <option value="SG">Singapore</option>
                          <option value="SK">Slovakia</option>
                          <option value="SI">Slovenia</option>
                          <option value="SB">Solomon Islands</option>
                          <option value="SO">Somalia</option>
                          <option value="ZA">South Africa</option>
                          <option value="GS">South Georgia/Sandwich Islands</option>
                          <option value="KR">South Korea</option>
                          <option value="SS">South Sudan</option>
                          <option value="ES">Spain</option>
                          <option value="LK">Sri Lanka</option>
                          <option value="SD">Sudan</option>
                          <option value="SR">Suriname</option>
                          <option value="SJ">Svalbard and Jan Mayen</option>
                          <option value="SZ">Swaziland</option>
                          <option value="SE">Sweden</option>
                          <option value="CH">Switzerland</option>
                          <option value="SY">Syria</option>
                          <option value="TW">Taiwan</option>
                          <option value="TJ">Tajikistan</option>
                          <option value="TZ">Tanzania</option>
                          <option value="TH">Thailand</option>
                          <option value="TL">Timor-Leste</option>
                          <option value="TG">Togo</option>
                          <option value="TK">Tokelau</option>
                          <option value="TO">Tonga</option>
                          <option value="TT">Trinidad and Tobago</option>
                          <option value="TN">Tunisia</option>
                          <option value="TR">Turkey</option>
                          <option value="TM">Turkmenistan</option>
                          <option value="TC">Turks and Caicos Islands</option>
                          <option value="TV">Tuvalu</option>
                          <option value="UG">Uganda</option>
                          <option value="UA">Ukraine</option>
                          <option value="AE">United Arab Emirates</option>
                          <option selected="selected" value="GB">United Kingdom</option>
                          <option value="US">United States</option>
                          <option value="UY">Uruguay</option>
                          <option value="UZ">Uzbekistan</option>
                          <option value="VU">Vanuatu</option>
                          <option value="VA">Vatican</option>
                          <option value="VE">Venezuela</option>
                          <option value="VN">Vietnam</option>
                          <option value="WF">Wallis and Futuna</option>
                          <option value="EH">Western Sahara</option>
                          <option value="WS">Western Samoa</option>
                          <option value="YE">Yemen</option>
                          <option value="ZM">Zambia</option>
                          <option value="ZW">Zimbabwe</option>
                        </select>
                      </p>
	

					
					<p id="billing_company_field" class="form-row form-row-wide">
                      <label class="" for="billing_company">Email <abbr title=" " class="required">*</abbr></label>
                      <input type="text"   placeholder="Email" id="email" name="email" value="" class="input-text" required>
                    </p>
					
					<p id="billing_company_field" class="form-row form-row-wide">
                      <label class="" for="billing_company">Phone number </label>
                     <input type="text" placeholder="Phone number"  name="phone" id="phone" value="" class="input-text">
                    </p>
					
					 <p id="billing_company_field" class="form-row form-row-wide">
                      <label class="" for="billing_company">Mobile number <abbr title=" " class="required">*</abbr></label>
                     <input type="text" placeholder="Mobile number"  name="mobile" id="mobile" value="" class="input-text" required>
                    </p>
					
					  <p id="billing_company_field" class="form-row form-row-wide">
                      <label class="" for="billing_company">Password <abbr title="required" class="required">*</abbr></label>
                      <input type="password" placeholder="Password" id="Password" name="password" class="input-text" required>
                    </p>
                    
                    
                    <p id="billing_company_field" class="form-row form-row-wide">
                      <label class="" for="billing_company">Confirm password <abbr title="required" class="required">*</abbr></label>
                      <input type="password" placeholder="Confirm Password" name="confirm_pass" id="confirm_pass" class="input-text" required>
                    </p>
                     
                    <p id="billing_company_field" class="form-row form-row-wide">
                        <label class="" for="billing_company">Captcha <abbr title="required" class="required">*</abbr></label>
                        <input type="hidden" id="captcha_match" name="captcha_match" value="<?php echo $this->session->userdata('mycaptcha'); ?>"/> 
                        <input type="text" name="captcha" id="captcha_value"  placeholder="Enter captcha text" class="contact-input">
                        <span class="capcha_image"><?php echo $image;?></span> 
                    </p>
                      
                <p class="form-row form-row-wide">
                  <input type="checkbox"  name="accept" id="accept" value="1" class="input-checkbox">
                  <label class="checkbox" for="createaccount">I accept all terms and conditions, including the privacy & cookies policy</label>
                </p>
					
                        <p id="shipping_postcode_field" class="form-row form-row-last address-field validate- " data-o_class="form-row form-row-last address-field validate- ">
                      
                        <input type="submit" value="Sign Up" id="sign_up" name="submit" class="btns btn-submit-3">
                        
                      </p>
                      
					<?php echo form_close(); ?>    
	  
                      <div class="clear"></div>
                    </div>
                
				   <div class="col-1" style="padding-left:25px;">
						<div class="row-fluid">
							<div class="span12">
								<img src="http://myclubsite.net/wp-content/uploads/2014/06/getstarted.png">
							   
									<h3>Why sign up?</h3>
									<p>Get local offers by email every week, re-order saved meals in a few   clicks, store your delivery address and build a list of your favourite   local takeaways.</p>
								</div>
								<!--
								<div class="span2">
									<img src="http://www.undergroundwineletter.com/wp-content/uploads/2014/08/question-mark-red.png">
								</div>	
								-->
							</div>
						</div>
				   </div>
				
				</div>
                      
            </div>
          </article>
        </div>
      </div>
    </section>
    <!--Checkout End--> 
    
	
  </section>
  <!--Content Area End--> 