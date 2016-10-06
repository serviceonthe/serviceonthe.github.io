   <div id="footer">
    	<div class="footer-top">
        	<div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5 footer-widget-1">
                        
                            <div class="col-xs-6 col-sm-6 col-md-6">
                        	 <h2 class="footer-list-title">Company</h2>
                            	<ul>
                                    <?php
                                     foreach($company_menu as $all_company_menu)
                                     {
                                    ?>
                                    <li><a href="<?php echo base_url()."pages/menu_content/".$all_company_menu->page_name; ?>"><?php echo $all_company_menu->menu_name; ?></a></li>
                                     <?php
                                     }
                                     ?>
                                </ul>
                            </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                        		<h2 class="footer-list-title">Cities</h2>
                            	<ul>
                                    <?php
                                     foreach($city_menu as $all_city_menu)
                                     {
                                    ?>
                                	<li><a href="<?php echo base_url()."pages/menu_content/".$all_city_menu->page_name; ?>"><?php echo $all_city_menu->menu_name; ?></a></li>
                                     <?php
                                     }
                                     ?>
                                </ul>
                            </div>
                       
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 footer-widget-2">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                        		<h2 class="footer-list-title">FAQ</h2>
                            	<ul>
                                    <?php
                                     foreach($faq_menu as $all_faq_menu)
                                     {
                                    ?>
                                	<li><a href="<?php echo base_url()."pages/menu_content/".$all_faq_menu->page_name; ?>"><?php echo $all_faq_menu->menu_name; ?></a></li>
                                     <?php
                                     }
                                     ?>
                                </ul>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                        		<h2 class="footer-list-title">Apps</h2>
                            	<ul>
                                    <?php
                                     foreach($apps_menu as $all_apps_menu)
                                     {
                                    ?>
                                	<li><a href="<?php echo base_url()."pages/menu_content/".$all_apps_menu->page_name; ?>"><?php echo $all_apps_menu->menu_name; ?></a></li>
                                     <?php
                                     }
                                     ?>
                                </ul>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 footer-social">
                        		<h2 class="footer-list-title">share with</h2>
                            	<ul>
                                	<li><a class="facebook" href="#">Follow Us on Facebook</a></li>
                                	<li><a class="twittear" href="#">Follow Us on Twittear</a></li>
                                        <li><a class="youtube" href="#">Follow Us on Youtube</a></li>
                                        <li><a class="twittear" href="#">Follow Us on Google Plus</a></li>
                                        <li><a class="twittear" href="#">Recommend to Friends</a></li>
                                	<li><a class="youtube" href="#">Newsletter Subscription</a></li>
                                	<li><a class="rss-feed" href="#">RSS Feed</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Container-->
        </div>
        <!--Footer Top-->
        
        <div class="footer-bottom">
        	<p>Copyright Â© 2011 Indi Chef. All rights reserved</p>
        </div>
        <!--Footer Bottom-->
    </div>
    <!--Footer-->
    
    <!--Bootstrap core JavaScript
    ==================================================--> 
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script> 
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
    <script src="<?php echo base_url();?>assets/js/app.js"></script>
</body>
</html>