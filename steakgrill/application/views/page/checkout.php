
        <!-- BODY AREA -->

        <div class="container pm-containerPadding-top-60 pm-containerPadding-bottom-20">
            <div class="row">

                <div class="col-lg-12">

                    <h3>Returning customer? <a href="#" id="pm-returning-customer-form-trigger">Click here to login</a></h3>

                    <div class="pm-expandable-login-container" id="pm-returning-customer-form">

                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>

                        <form action="http://projects.pulsarmedia.ca/vienna/post">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="pm-login-username" class="pm-textfield" placeholder="Username or Email" />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="password" name="pm-login-password" class="pm-textfield" placeholder="Password" />
                                </div>
                                <div class="col-lg-12 pm-clear-element">
                                    <div class="pm-form-checkbox-input">
                                        <input name="pm-remember-box" type="checkbox" value="" class="pm-remember-checkbox" />
                                        <p>Remember me</p>
                                    </div>
                                    <input name="" type="button" value="Login" class="pm-rounded-submit-btn pm-primary pm-no-margin">
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>

        <div class="container pm-containerPadding-bottom-40">
            <div class="row">

                <div class="col-lg-12">

                    <h3>Have a promotional code? <a href="#" id="pm-promotional-code-form-trigger">Click here to enter your code</a></h3>

                    <div class="pm-expandable-login-container" id="pm-promotional-code-form">

                        <form action="http://projects.pulsarmedia.ca/vienna/post">

                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" name="pm-login-username" class="pm-textfield" placeholder="Username or Email" />
                                </div>
                                <div class="col-lg-12">
                                    <input name="" type="button" value="apply coupon" class="pm-rounded-submit-btn pm-primary pm-no-margin-bottom">
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>

        <form action="http://projects.pulsarmedia.ca/vienna/post">

            <div class="container pm-containerPadding-bottom-40">
                <div class="row">

                    <div class="col-lg-6">

                        <h3 class="pm-primary">Billing Details</h3>

                        <label for="pm-country-list">Country *</label>
                        <select name="pm-country-list">
                            <option>Canada</option>
                            <option selected>United States (US)</option>
                        </select>

                        <label for="pm-first-name-field">First Name *</label>
                        <input name="pm-first-name-field" class="pm-textfield" type="text">

                        <label for="pm-last-name-field">Last Name *</label>
                        <input name="pm-last-name-field" class="pm-textfield" type="text">

                        <label for="pm-company-name-field">Company Name</label>
                        <input name="pm-company-name-field" class="pm-textfield" type="text">

                        <label for="pm-address-field">Address *</label>
                        <input name="pm-address-field" class="pm-textfield" type="text">

                        <label for="pm-town-field">Town / City *</label>
                        <input name="pm-town-field" class="pm-textfield" type="text">

                        <label for="pm-state-list">State *</label>
                        <select name="pm-state-list">
                            <option>San Francisco</option>
                            <option selected>New York</option>
                        </select>

                        <label for="pm-zip-field">Zip *</label>
                        <input name="pm-zip-field" class="pm-textfield" type="text">

                        <label for="pm-email-address-field">Email Address *</label>
                        <input name="pm-email-address-field" class="pm-textfield" type="text">

                        <label for="pm-phone-field">Phone *</label>
                        <input name="pm-phone-field" class="pm-textfield" type="text">

                        <div class="pm-form-checkbox-input">
                            <input name="pm-remember-box" type="checkbox" class="pm-remember-checkbox" id="pm-create-account-checkbox" value="" />
                            <p>Create an account?</p>
                        </div>    


                        <div class="pm-checkout-password-field" id="pm-checkout-password-field">
                            <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>

                            <label for="pm-password-field">Password *</label>
                            <input name="pm-password-field" class="pm-textfield" type="password">
                        </div>

                    </div>

                </div>
            </div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-6">

                        <h3 class="pm-primary">Order Summary</h3>

                        <div class="pm-order-summary-container">

                            <ul class="pm-order-summary">
                                <li>
                                    <p class="title">Woo Single × 1</p>
                                    <p class="price">$9</p>
                                </li>
                                <li>
                                    <p class="label">Cart Sub-Total</p>
                                    <p class="price">$9</p>
                                </li>
                                <li>
                                    <p class="label">Order Total</p>
                                    <p class="price">$9</p>
                                </li>
                            </ul>

                        </div>

                    </div>
                </div>
            </div>

            <div class="container pm-containerPadding-bottom-60">
                <div class="row">
                    <div class="col-lg-6">

                        <h3 class="pm-primary">Payment Method</h3>

                        <div class="pm-payment-option-container">

                            <ul class="pm-payment-options">
                                <li>
                                    <input name="pm-selected-payment[]" type="radio" value="">
                                    <label for="direct-transfer">Direct Transfer</label>
                                </li>
                                <li>
                                    <input name="pm-selected-payment[]" type="radio" value="">
                                    <label for="direct-transfer">Cheque Draft</label>
                                </li>
                                <li>
                                    <input name="pm-selected-payment[]" type="radio" value="">
                                    <label for="direct-transfer">PayPal</label>
                                </li>
                            </ul>

                            <div class="pm-clear-element">
                                <div class="pm-divider clearfix"></div>
                                <input name="" type="button" value="process order" class="pm-rounded-submit-btn pm-primary" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </form>

        <!-- BODY AREA end -->