
	<div id="header">
    	<div id="header-overlay">
            <div id="header-top">
                <div class="container clearfix">
                        <div class="col-xs-12 col-sm-4 col-md-4 logo" style="margin-top: 10px;">
                            <a href="#"><img src="<?php echo base_url();?>assets/img/logo.png" /></a>
                        </div>
                    <div class="col-xs-12 col-sm-8 col-md-6 pull-right clearfix">
                        <div class="col-xs-4 col-sm-4 col-md-4 language">
                            <img src="<?php echo base_url();?>assets/img/language-img.png"/>
                        </div>
                        <!--Language-->
                        <div class="col-xs-3 col-sm-3 col-md-3 social-media">
                            <ul>
                                <li><a class="twitter" href="#">&nbsp;</a></li>
                                <li><a class="gplus" href="#">&nbsp;</a></li>
                                <li><a class="facebook" href="https://www.facebook.com/pages/Indichefcouk/363041963793993?ref=hl">&nbsp;</a></li>
                                <li><a class="youtube" href="#">&nbsp;</a></li>
                            </ul>
                        </div>
                        <!--Social Media-->
                        <div class="col-xs-5 col-sm-5 col-md-5 top-nav">
                            <ul>
                              <?php  if($this->session->userdata('logged_in') == '')
                                {
                                    ?>
                                <li><a href="<?php echo base_url();?>log-in">Login</a></li>
                                <?php }else{
                                    ?>
                                    <li><a href="<?php echo base_url();?>log-out">Logout</a></li>
                                  <?php          
                                }
                                
                                ?>
                                <li><a href="<?php echo base_url();?>sign-up">Registar</a></li>
                                <li><a href="https://www.facebook.com/pages/Indichefcouk/363041963793993?ref=hl">Join</a></li>
                            </ul>
                        </div>
                        <!--Top Nav-->
                    </div>
                    <!--Pull Right-->
                                            <div class="col-xs-12 col-sm-8 col-md-7 pull-right main-nav">
                            <div class="navbar navbar-default navbar-main">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav">
                                        <li><a href="<?php echo base_url();?>">Home</a></li>
                                        <li><a href="#">latest cuisine</a></li>
                                        <li><a href="#">Cities</a></li>
<!--                                        <li><a href="#">Latest recipe</a></li>-->
                                        <li><a href="<?php echo base_url() ?>blog">blogs</a></li>
<!--                                        <li><a href="#">Picture Gallery</a></li>-->
                                        <li><a href="#">Video Gallery</a></li>
                                        <li><a href="<?php echo base_url();?>contactus">contact</a></li>
                                    </ul>
                                </div>
                                <!--nav-collapse-->
                            </div>
                            <!--navbar-->
                        </div>
                        <!--Main Nav-->
                </div>
                <!--Container-->
            </div>
<!--            Header Top
            <div id="header-bottom">
                <div class="container">
                    <div class="row">


                        Main Nav
                    </div>
                    Row
                    
                    <div id="search">
                    	<div class="search-form">
                        	<h3>Find your nearest cuisine</h3>
                                <p class="search-form-p">Post code > Restaurant > Service > Confirmation </p>
                                <div class="bc">
                                    
                                    <?php
                                $attributes = array('class' => '', 'id' => 'postcode', 'name' => 'postcode', 'id' => 'postcode','onsubmit'=>"return(validate());");
                              
                                //echo form_open('email/send', $attributes);
                                echo form_open_multipart('restaurant/res_search', $attributes); 
                                ?>
                                
                                  
                            	<input required = "required" name="postcode" type="text" id="postcode" value="" placeholder="e.g. 1234"/>
                                <?php if(!empty($checkmsg)){?> <script type="text/JavaScript"> alert( "You Enterd Wrong Postcode ! Please Enter Your Real Postcode"); </script><?php }else{ echo"";} ?>
                                <input type="submit" value="Find Now"/>
                               
                            </form>
                              </div> 
                        </div>
                        Search Form
                        <div class="search-map" style="margin:  auto;">
                            <img src="<?php echo base_url(); ?>assets/img/map.png" />
                        </div>
                        Search Map
                    </div>
                    Search
                </div>
                Container
            </div>
            Header bottom-->
        </div>
        <!--Header Overlay-->
    </div>
    <!--Header-->