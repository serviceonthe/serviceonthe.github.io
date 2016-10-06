

        <!-- BODY CONTENT starts here -->

        <div class="container pm-containerPadding-top-60 pm-containerPadding-bottom-60" id="catering-form">
            <div class="row">

                <div class="col-lg-12 pm-column-spacing">
                    <h2>Registration:</h2>

                    <form action="#" method="post" id="pm-catering-form">

                        <div class="row">

                            <div class="col-lg-4 col-md-4 col-sm-4">

                                <input name="pm-first-name-field" class="pm-textfield" type="text" placeholder="First name *" id="catering-form-first-name">	

                                <input name="pm-last-name-field" class="pm-textfield" type="text" placeholder="Last name *" id="catering-form-last-name">

                                <input name="pm-email-field" class="pm-textfield" type="text" placeholder="Address *" id="address"> 

                                <input name="pm-email-field" class="pm-textfield" type="text" placeholder="Postcode *" id="postcode">

                                <input name="pm-email-field" class="pm-textfield" type="text" placeholder="City *" id="city"> 

                            </div><!-- /.col-lg-4 -->

                            <div class="col-lg-4 col-md-4 col-sm-4">

                                <input name="pm-email-field" class="pm-textfield" type="text" placeholder="Email address *" id="catering-form-email-address">

                                <input name="pm-email-field" class="pm-textfield" type="text" placeholder="Password *" id="password">

                                <input name="pm-email-field" class="pm-textfield" type="text" placeholder="Confirm Password *" id="confirm_password">

                                <input name="pm-phone-field" class="pm-textfield" type="text" placeholder="Phone Number">

                                <input name="pm-phone-field" class="pm-textfield" type="text" placeholder="Mobile Number">	

                            </div><!-- /.col-lg-4 -->

                            <div class="col-lg-4 col-md-4 col-sm-6">

                                <!-- <select name="pm-event-inquiry-field" id="catering-form-event-type">
                                    <option value="default">Event Type *</option>
                                    <option value="Wedding">Wedding</option>
                                    <option value="Corporate">Corporate</option>
                                    <option value="School Function">School Function</option>
                                    <option value="Banquet">Banquet</option>
                                    <option value="Stag">Stag</option>
                                    <option value="Engagement">Engagement</option>
                                    <option value="Backyard party">Backyard party</option>
                                    <option value="Other">Other</option>
                                </select>
 -->
                                <input name="pm-date-of-event-field" class="pm-textfield catering-form-datepicker" type="text" placeholder="Birthday" id="datepicker">

                                <input name="pm-num-of-guests-field" class="pm-textfield" type="text" placeholder="Partner's Birthday" id="catering-form-guests-field">

                                <input name="pm-event-location-field" class="pm-textfield" type="text" placeholder="Anniversary" id="catering-form-location-field">	

                                <input name="pm-time-of-event-field" class="pm-textfield" type="text" placeholder="Special Day" id="catering-form-time-field">	

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12">
                                <textarea name="pm-additional-info-field" cols="" rows="" placeholder="Additional Information" class="pm-form-textarea"></textarea>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="pm_captcha_box">
                                    <p>Security Code:</p>
                                    <img src="<?php echo base_url(); ?>assets/js/ajax-cateringform/CaptchaSecurityImagesd218.jpg?width=100&amp;height=40&amp;characters=5" /><br />
                                    <div style="width:96px;">
                                        <div style="padding-top:2px; width:86px;">
                                            <input class="pm_s_security_code pm-form-textfield" name="security_code" type="text" id="security_code" maxlength="5" />
                                        </div>
                                    </div>
                                </div>
                                <div id="pm-catering-form-response"></div>

                                <input type="submit" class="pm-rounded-submit-btn pm-primary" value="Submit" id="pm-catering-form-btn" />

                                <input type="hidden" name="pm_event_email_address_contact" value="leo@pulsarmedia.ca" />

                            </div>
                        </div>

                    </form>

                </div>



            </div>
        </div>

        <!-- BODY CONTENT end -->