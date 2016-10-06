<?php
	$this->load->view('admin/header_link');
	

?>

<!--Banner Start-->
  <section id="banner" class="height">
    
  </section>
  <!--Banner End--> 
 
<!--Content Area Start-->
      <div class="container">
        <div class="row-fluid">
          <div class="span12">
            <div class="details_heading" >
			<?php
					foreach ($res_info As $allinfo)
						{  ?>
						
						<?php echo $allinfo->res_name; 
						
                             $postcode=$allinfo->res_post_code;
                             $rest_postcode = substr($postcode, 0, 3);

						?>

			</div>
		      
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#"><?php echo $rest_postcode; ?></a></li>
				  <li><a href="#"><?php echo $allinfo->res_name; ?></a></li>
				</ol
				
			<?php } ?> 
            
          </div>
        </div>
      </div>
      <!--Blog Post End--> 
      
      <!--Product Detail Page Start-->
<section class="product-detail-page">
 <div class="row">
 
 <div class="span3 new-bg" style="padding:15px;">
	<div class="">
		<table style=" width:100%;">
		<tr>
			<td colspan="2">

			</td>
		</tr>
		<tr>
		<td>
		<?php if(!empty($res_pic)) { ?>
			<img src="<?php echo base_url();?>assets/uploads/<?php if(!empty($res_pic)){ foreach ($res_pic As $pic) {echo $pic->url; }}?>" alt="Image" style="height:50px; width:50px; float:left;" />
		<?php }else{ ?>                    	
			<img src="<?php echo base_url();?>/assets/img/res-thumb-1.jpg" alt="Image" style="height:50px; width:50px; float:left;" />
		<?php } ?>
		</td>
		<td>
		
		<ul class="product-review-star" style="margin:0px; float:left; padding:3px;">
			<li style="float:left;">Rating: 5/5 &nbsp; </li> 
			<li class="active"><a href="#"></a></li>
			<li class="active"><a href="#"></a></li>
			<li class="active"><a href="#"></a></li>
			<li class="active"><a href="#"></a></li>
			<li class="active"><a href="#"></a></li>
		</ul>
		<h5>Restaurant Now : <span>Open</span></h5>
		</td>
		</tr>
		</table>
			<span class="res-time">Estimated delivery time:  
					<?php
						foreach ($res_info As $allinfo)
						{
							echo $allinfo->delivery_min_time;
					?>
			</span>
			<span class="res-time">Telephone:  
					<?php
							echo $allinfo->res_telephone1;
					?>
			</span><br>
		    <span class="res-time">Service Area: 
					<?php
							echo $allinfo->res_service_area;
						}
					?>
			</span>   			
		<hr />   
		<h4>Online Order Menu</h4>   

			<div class="catlist"> 
			
                <?php foreach($c_name as $allc_name){ ?>	

                <a class='btn' style='width:100%; margin-bottom:3px'; href="<?php echo base_url()?>restaurant/show_items/<?php echo $allc_name->catagory_id;?>/<?php echo  $allc_name->res_id;?>"><?php echo $allc_name->catagory_name;?></a>
				</form> 
                <?php } ?>
            </div>
			
		<hr /> 
		
		<h4>Table Booking Available</h4>
		
		<ul class="nav nav-tabs" id="myTab">   
		<a href="#res-reservation" class="btns btn-continue">BOOKING NOW</a>
		</ul> 
		<div></div>
		<hr />
		
		<h4 >Restaurant Address:</h4> 
		
		<?php
			foreach ($res_info As $allinfo)
				{
					echo $allinfo->res_address;
					echo ",".$allinfo->res_post_code;
				}
		?>
		
		
		<br />
			<script>
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=270574356402519";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			</script>
			<br>
			

			<div class="address" style="margin-left:70px;"> 
			<img src="http://api.qrserver.com/v1/create-qr-code/?data=<?php echo current_url(); ?>&size=100x100" alt="Image" />
			</div>  	 
			<?php      
				foreach ($res_info As $allinfo)
				{
					echo "<div id='rname' style='display:none'>".$allinfo->res_id."</div>";
				}
			?>  
		<hr />
		
		<!--Post Code: <?php echo $postcode= $res_info[0]->res_post_code; ?>
		
		<hr /-->
		
           

		   <iframe style="align:center" width="100%" height="275" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo "$postcode";?>&amp;aq=&amp;t=h&amp;g=<?php echo "$postcode";?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo "$postcode";?>&amp;z=18&amp;output=embed"></iframe>
		    
	</div>   
 </div>
 
    <div class="span9">
        <div class="row-fluid">
            <div class="span12">
		<!-- menu list start -->
                <!-- menu list show -->
			<div class="tab-pane" id="res-menu" style="display:none;">
					<div class="row-fluid">
				           <form class="book-table-form" style="padding-left:0px;">
						<div class="span8 rlh-left date-box"> 
						   <select class="starter">    
                                                        <option>Starters</option>
                                                        <option>Starters 2</option>
                                                        <option>Starters 3</option>
                                                        <option>Starters 4</option>
                                                        <option>Starters 5</option>
						   </select>
							<select class="starter">
								<option>Popularity</option>
								<option>Popularity 2</option>
								<option>Popularity 3</option>
								<option>Popularity 4</option>
								<option>Popularity 5</option>
							</select>
						</div>

						
						
						
						
						<div class="span4 pull-right">
							<span>Result 10 of 15</span>                                               
							<select class="show-list">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
							</select>
						</div>
						</form>
						<!--Res List Header-->
					   </div>
					<div class="row-fluid">
					
						<div class="span9">
							<div class="full-menu-list">
								<ul>
									<?php                                     
									if($menus)
									{
									foreach($menus as $menu)  
									{
									?>
									<li>
									<div class="span2">
										<div class="menu-list-frame"><a href="#"><img style="height:100px;" src="<?php echo base_url();?>fassets/images/item_photo/<?php echo $menu->item_photo;?>" alt="" /> </a></div>
									  </div>
									<div class="span7">
										<div class="menu-list-text">
										  <div class="review-row">          
											<a href="#"><h3 id="iname_<?php echo $menu->item_id;?>"><?php echo $menu->item_name;?></h3></a>                        	  </div>
											
											<span style="font-weight: bold;font-size: 15px; color:#A80000;">
											Price &pound;
												<span id="price_<?php echo $menu->item_id;?>">
												<?php echo $menu->menu_restaurant_relation_price;?>
												</span>
											</span>
										</div>
										<p style=" margin:0px;"><?php echo $menu->item_short_description;?></p>
									</div> 
								
									<div class="span3">
		 
										<div class="res-list-thumb res-list-right" style="float:right;">
											<?php                                                        
											$images =  explode(',',$menu->alrgy_images);
											$names = explode(',',$menu->alrgy_nams);                                                                                                    
											if(!empty($alrgy_nam)){
											foreach($names as $key=>$alrgy_nam)
											{
											echo $alrgy_nam.'&nbsp;<img src="'.base_url().'fassets/images/alergy_image/'.$images[$key].'" height="20" width="20"/>&nbsp;&nbsp;';
											}
											}else{echo"No Alergy";}
											?>
										</div>
								
									  <ul class="product-review-star">
										<li>Rating: 5/5 &nbsp; </li> 
										<li class="active"><a href="#"></a></li>
										<li class="active"><a href="#"></a></li>
										<li class="active"><a href="#"></a></li>
										<li class="active"><a href="#"></a></li>
										<li class="active"><a href="#"></a></li>
									  </ul>
										<div class="review-row">
										<form action="<?php echo base_url(); ?>index.php/restaurant/menu_details" method="post" >
										<input type="hidden" name="menu_id" value="<?php echo $menu->item_id;?>" />
										<input type="hidden" name="res_id" value="<?php echo $res_info[0]->res_id;  ?>" />
										<input type="hidden" name="redirect" value="<?php echo current_url();  ?>" />
										<input type="hidden" name="price" value="<?php echo $menu->menu_restaurant_relation_price;?>" />
										<input type="submit" value="Details" class="btns btn-submit-3" style="float:right;" /><br>
										<?php echo form_close(); ?>
										<a id="adc_<?php echo $menu->item_id;?>" class="cart" style="float:right; text-decoration:none;" href=""><i class="icon-shopping-cart"></i>Add to Cart</a>
									   
										</div>
								   </div>
								   
									</li>

								<!-- Res Block-->
									<?php
									}
									}else
									{
									echo 'There is no menu';
									}     
									?>
								</ul>
                                             <!--Res List-->		   
                                              </div>
						</div>
						<!--Checkout float-->
						<div class="span3 pull-right">
						<aside id="sidebar">
							<div class="inside">
							<div class="res-list-header">
								<h3> <?php foreach ($res_info As $allinfo) { echo $allinfo->res_name; } ?></h3>
							</div>
								<!-- Res List Header -->
								<?php
								   foreach ($res_info As $allinfo) { $restaurant_id= $allinfo->res_id; }
								   echo form_open('cart/cart_process');                                        
								?>                                                                  
									<table border="1" class="cartBox">
										<thead>
											<tr>
												<th>Item</th>
												<th>Qty.</th>
												<th>Price</th>
											</tr>
										</thead>
										<tbody>                                           
											<tr id="cart_val">
												<td colspan="3" style="padding-top:10px;">
												   <span class="empty">Your cart is hungry</span>
												</td>
											</tr>
											<tr>
												<td colspan="2">Subtotal:</td>
												<td><span id="sub_total">0.00</span></td>
											</tr>
											<tr>
												<td colspan="2">Tax:</td>
												<td>0.00</td>
											</tr>
											<tr>
												<td colspan="2">Delivery Charge:</td>
												<td>Free</td>
												<input type="hidden" value="" name="delivery_charge"/>
											</tr>
											<tr class="checkout-total">
												<td colspan="2">Total:</td>
												<td><span id="total">0.00 </span></td>
											</tr>
											<tr class="checkout-con">
												<td colspan="2">
													<input type="checkbox">Delivery <img src="<?php echo base_url();?>/assets/img/icon-delivery.png" alt="Image" />
												</td>
												<td>
													<input type="checkbox">PICKUP <img src="<?php echo base_url();?>/assets/img/icon-pickup.png" alt="Image" />
												</td>
											</tr>
										</tbody>
									</table>
									<!--<p>The minimum order for delivery is: 30.00 No minimum on Pickup orders</p>-->
									<input type="hidden" name="res_id" value="<?php echo $restaurant_id; ?>"/>
									<br />
									<button type="submit" id="check_out_button" class="btns btn-submit-3">Check Out</button>   
						</div>
					</aside>
					</div>	
					</div>
				</div>
				<!-- menu list end -->
                                <!-- restaurant details info show -->
                <div id="res-details-show">
				<!--Blog Page Section Start-->
				<section class="blog-page-section" >
				  <!--Blog Post End--> 
				  <!--Gallery Start-->
				  <section class="gallery new-bg">
						<ul class="bxslider">
						<?php if (!empty($gallery_info)){
						foreach($gallery_info as $allphoto){
						?>
							
							<li><img style="height:400px;" src="<?php echo base_url();?>assets/uploads/<?php echo $allphoto->url; ?>" /></li>
							
						<?php } }else {   echo 'Restaurant Gallery is empty';}?>
						
						</ul>
				  </section>
				  <!--Gallery End--> 
				</section>
				<!--Blog Page Section End--> 
			
			
          
                <!-- Nav tabs -->
        <div class="product-bottom-area">

	    <br/>
            <div class="row-fluid">
              <div class="span12">
                <div class="product-tab">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#res-about-us" data-toggle="tab"><img style="height:35px; width:50px;" src="<?php echo base_url();?>assets/images/home_icon.png" alt="" /></a></li>
                    <li><a href="#res-reservation" data-toggle="tab">Reservation</a></li>
                    <li><a href="#res-offers" data-toggle="tab">Offers</a></li>
                    <li><a href="#res-gallery" data-toggle="tab">Gallery</a></li>
                    <li><a href="#res-location" data-toggle="tab">Location</a></li>
                    <li><a href="#res-reviews" data-toggle="tab">Reviews</a></li>

                </ul>
				
				
				
				<style>
				.tab-content{
				}
				</style>
                <!-- Tab panes -->
                <div class="tab-content new-bg">
                    <div class="tab-pane" id="res-menu">
						<div class="row-fluid"> 
                        
							<form class="book-table-form" style="padding-left:0px;">
							<div class="span8 rlh-left date-box">
								<select class="starter">
									<option>Starters</option>
									<option>Starters 2</option>
									<option>Starters 3</option>
									<option>Starters 4</option>
									<option>Starters 5</option>
								</select>
								
								<select class="starter">
									<option>Popularity</option>
									<option>Popularity 2</option>
									<option>Popularity 3</option>
									<option>Popularity 4</option>
									<option>Popularity 5</option>
								</select>
							</div>
						
							<div class="span4 pull-right">
								<span>Result 10 of 15</span>                                               
								<select class="show-list">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
								</select>
							</div>
							</form>
							<!--Res List Header-->
						</div>
                        
                        <div class="row-fluid">
                        
                            <div class="span9">
                                <div class="full-menu-list">
                                    <ul>
                                        <?php                                     
                                        if($menus)
                                        {
                                        foreach($menus as $menu)
                                        {
                                        ?>
                                        <li>
                                        <div class="span2">
                                            <div class="menu-list-frame"><a href="#"><img style="height:100px;" src="<?php echo base_url();?>fassets/images/item_photo/<?php echo $menu->item_photo;?>" alt="" /> </a></div>
                                          </div>
                                        <div class="span7">
                                            <div class="menu-list-text">
                                              <div class="review-row">          
                                                <a href="#"><h3 id="iname_<?php echo $menu->item_id;?>"><?php echo $menu->item_name;?></h3></a>                        	  </div>
                                                
                                                <span style="font-weight: bold;font-size: 15px; color:#A80000;">
                                                Price &pound;
                                                    <span id="price_<?php echo $menu->item_id;?>">
                                                    <?php echo $menu->menu_restaurant_relation_price;?>
                                                    </span>
                                                </span>
                                            </div>
                                            <p style=" margin:0px;"><?php echo $menu->item_short_description;?></p>
                                        </div> 
                                    
                                        <div class="span3">
             
                                            <div class="res-list-thumb res-list-right" style="float:right;">
                                                <?php                                                        
                                                $images =  explode(',',$menu->alrgy_images);
                                                $names = explode(',',$menu->alrgy_nams);                                                                                                    
                                                if(!empty($alrgy_nam)){
                                                foreach($names as $key=>$alrgy_nam)
                                                {
                                                echo $alrgy_nam.'&nbsp;<img src="'.base_url().'fassets/images/alergy_image/'.$images[$key].'" height="20" width="20"/>&nbsp;&nbsp;';
                                                }
                                                }else{echo"No Alergy";}
                                                ?>
                                            </div>
                                    
                                          <ul class="product-review-star">
                                          	<li>Rating: 5/5 &nbsp; </li> 
                                            <li class="active"><a href="#"></a></li>
                                            <li class="active"><a href="#"></a></li>
                                            <li class="active"><a href="#"></a></li>
                                            <li class="active"><a href="#"></a></li>
                                            <li class="active"><a href="#"></a></li>
                                          </ul>
                                    
                                            <div class="review-row">
            
                                            <form action="<?php echo base_url(); ?>index.php/restaurant/menu_details" method="post" >
                                            <input type="hidden" name="menu_id" value="<?php echo $menu->item_id;?>" />
                                            <input type="hidden" name="res_id" value="<?php echo $res_info[0]->res_id;  ?>" />
                                            <input type="hidden" name="redirect" value="<?php echo current_url();  ?>" />
                                            <input type="hidden" name="price" value="<?php echo $menu->menu_restaurant_relation_price;?>" />
                                            <input type="submit" value="Details" class="btns btn-submit-3" style="float:right;" /><br>
                                            <?php echo form_close(); ?>
                                            <a id="adc_<?php echo $menu->item_id;?>" class="btns btn-submit-3" style="float:right; text-decoration:none;" href=""><i class="icon-shopping-cart"></i> &nbsp; Add to Cart</a>
                                           
                                            </div>
                                       </div>
                                       
                                        </li>
        
                                    <!-- Res Block-->
                                        <?php
                                        }
                                        }else
                                        {
                                        echo 'There is no menu';
                                        }     
                                        ?>
                                    </ul>
            <!--Res List-->		</div>
                            </div>
                            <!--Checkout float-->
                            <div class="span3 pull-right">
							<aside id="sidebar">
								<div class="inside">
                                <div class="res-list-header">
                                    <h3> <?php foreach ($res_info As $allinfo) { echo $allinfo->res_name; } ?></h3>
                                </div>
                                    <!-- Res List Header -->
                                    <?php
                                       foreach ($res_info As $allinfo) { $restaurant_id= $allinfo->res_id; }
                                       echo form_open('cart/cart_process');                                        
                                    ?>                                                                  
                                        <table border="1" class="cartBox">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Qty.</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                           
                                                <tr id="cart_val">
                                                    <td colspan="3" style="padding-top:10px;">
                                                       <span class="empty">Your cart is hungry</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Subtotal:</td>
                                                    <td><span id="sub_total">0.00</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Tax:</td>
                                                    <td>0.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Delivery Charge:</td>
                                                    <td>Free</td>
                                                    <input type="hidden" value="" name="delivery_charge"/>
                                                </tr>
                                                <tr class="checkout-total">
                                                    <td colspan="2">Total:</td>
                                                    <td><span id="total">0.00 </span></td>
                                                </tr>
                                                <tr class="checkout-con">
                                                    <td colspan="2">
                                                        <input type="checkbox">Delivery <img src="<?php echo base_url();?>/assets/img/icon-delivery.png" alt="Image" />
                                                    </td>
                                                    <td>
                                                        <input type="checkbox">PICKUP <img src="<?php echo base_url();?>/assets/img/icon-pickup.png" alt="Image" />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--<p>The minimum order for delivery is: 30.00 No minimum on Pickup orders</p>-->
                                        <input type="hidden" name="res_id" value="<?php echo $restaurant_id; ?>"/>
                                        <br />
                                        <button type="submit" id="check_out_button" class="btns btn-submit-3">Check Out</button>   
                            </div>
							
							        <?php
                                       echo form_close();                                        
                                    ?> 
							
							
						</aside>
						</div>	
                        </div>
                        
                    </div>
               
			   

			   
			   
			   
			   
			   
                 	<!--Res List Checkout-->
                	<!--Res List Details-->
			
            <div class="tab-pane active" id="res-about-us">
				<div class="row-fluid">
					<div class="span12 res-form tblfont">
					
					
						<?php if(!empty($show_feature_info)){ ?>
                        <table width="100%" border="0" cellpadding="10">
                        <tr>
                        <td width="33%" valign="top">
                        <table class="table table-striped">
                           <tr>
                               <?php if($show_feature_info[0]->car_parking='yes'){ ?>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td width="82%"><strong>Car Parking Available?</strong></td>
                           </tr>
                            <?php  } ?>
                            <?php if($show_feature_info[0]->air='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>Air Conditioned?</strong></td>
                           </tr>
                           <?php  } ?>
                           <?php if($show_feature_info[0]->access='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>Disable Access Available?</strong></td>
                           </tr>
                           <?php  } ?>
                           <?php if($show_feature_info[0]->live_music='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>Live Music ?</strong></td>
                           </tr>
                           <?php  } ?>
                           <?php if($show_feature_info[0]->bar='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>Bar Service?</strong></td>
                           </tr>
                           <?php  } ?>
                           <?php if($show_feature_info[0]->event='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>Corporate Event Facilities?</strong></td>
                           </tr>
                           <?php  } ?>
                           </table>
                           </td>
                           <td width="33%" valign="top">
                           <table class="table table-striped">
                           <?php if($show_feature_info[0]->romantic_dinner='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td width="82%"><strong>Romantic Dinner Suitable?</strong></td>
                           </tr>
                           <?php  } ?>
                           <?php if($show_feature_info[0]->smoking='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>Smoking facilities?</strong></td>
                           </tr>
                           <?php  } ?>
                           <?php if($show_feature_info[0]->party_booking='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>Private Party Booking Available?</strong></td>
                           </tr>
                           <?php  } ?>
                           <?php if($show_feature_info[0]->service='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>Catering Service Available?</strong></td>
                           </tr>
                           <?php  } ?>
                           <?php if($show_feature_info[0]->Atmosphere='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>Kids Freindly Atmosphere?</strong></td>
                           </tr>
                           <?php  } ?>
                           <?php if($show_feature_info[0]->buffet='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>Sunday Buffet Lunch?</strong></td>
                           </tr>
                           </table>
                           <?php  } ?>
                           </td>
                           <td width="33%" valign="top">
                           <table class="table table-striped">
                           <?php if($show_feature_info[0]->day_buffet='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td width="82%"><strong>All Day Buffet ?</strong></td>
                           </tr>
                           <?php  } ?>
                           <?php if($show_feature_info[0]->olive_oil='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>Can Cooke item using olive oil?</strong></td>
                           </tr>
                           <?php  } ?>
                           <?php if($show_feature_info[0]->notice='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>On Table Reservation notice required?</strong></td>
                           </tr>
                           <?php  } ?>
                           <?php if($show_feature_info[0]->breakfast='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>Dining /Takeaway for: (Breakfast ?)</strong></td>
                           </tr>
                           <?php  } ?>
                           <?php if($show_feature_info[0]->lunch='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>Dining /Takeaway for: (Lunch ?)</strong></td>
                           </tr>
                           <?php  } ?>
                           <?php if($show_feature_info[0]->dinner='yes'){ ?>
                           <tr>
							 <td width="3%"><input type="checkbox" name="" /></td>
                             <td><strong>Dining /Takeaway for: (Dinner ?)</strong></td>
                           </tr>
                           </table>
                           <?php  } ?>
                           </td>
                           </tr>
                       </table>
						<?php }else {echo "No feature information for this Restaurant";}  ?>
					</div>
					<!-- about us long description-->
					<div class="">
                        <h2>Welcome To <?php foreach ($res_info As $allinfo) { echo $allinfo->res_name; } ?></h2>
                        <p><?php { echo $allinfo->res_long_desc; } ?></p>
					</div>
					<!-- about us feature information-->
                </div>
            </div>
            
			
			<div class="tab-pane" id="res-reservation">
            <div class="row-fluid">
                <div class="span12">
                    <h4>Online table reservation</h4>
					
                    <?php 

					if($this->session->userdata('logged_in') == TRUE) 
                       { 
						echo form_open('restaurant/res_reservation'); 
						} 
					else
						{
						echo form_open('user/log_in');   
						}
					?>  
					
                    <div id="reserve_status"></div>
					
					      <?php	
						     foreach ($res_info As $allinfo)
				          {?>
						  <input type="hidden" name="restaurant_id" value="<?php echo $allinfo->res_id ;?>"/>   
				          <?php } ?>
					
                   
                        <ul class="form-list">
							<li class="span4">
                            <label for="f_name">First Name</label> 
                            <input type="text" class="input-2" name="reserve_f_name"  id="reserve_f_name" />
							</li> 
							<li class="span4">
                            <label for="l_name">Last Name</label>
                            <input class="input-2" type="text" name="reserve_l_name"  id="reserve_l_name"/>
							</li>
						</ul>
						<ul class="form-list">
							<li class="span8">
                            <label for="l_name">Email</label>
                            <input class="input-2" type="text" name="reserve_email"  id="reserve_email"/>
							</li>
						</ul>
						<ul class="form-list">
							<li class="span4">
                            <label for="mobile">Mobile</label>
                            <input class="input-2" type="text" name="reserve_mobile"  id="reserve_mobile" />
							</li>
							<li class="span4">
                            <label for="f_name">Phone</label>
                            <input class="input-2" type="text" name="reserve_phone"  id="reserve_phone" />
							</li> 
						</ul>
						<ul class="form-list">
							<li class="span12">
                            Is this your first time visit visiting dining at this restaurant? 
                            <input type="radio" name="reserve_visiting" value="yes" id="reserve_visiting_status" /> Yes 
                            <input type="radio" name="reserve_visiting" value="no" id="reserve_visiting_status" /> No 
							</li>
						</ul>   
						
						<ul class="form-list">
							<li class="span4">
                            Reservation Type:                             
							<input type="radio" name="reservation_type" value="1" id="reservation_type" checked="true" /> Lunch 
                            <input type="radio" name="reservation_type" value="2" id="reservation_type" /> Dinner 
							</li>
							</li>
						</ul>
						<ul class="form-list">
							<li class="span4">
                            <label for="reserve_time">Reservation Time</label>
                            <select name="reserve_time" id="r_time">  
                                <option value="6am">6am</option>
                                <option value="7am">7am</option>
                                <option value="8am">8am</option>
                                <option value="9am">9am</option>
                                <option value="10am">10am</option>
                                <option value="11am">11am</option>
                                <option value="12am">12am</option>
                                <option value="1pm">1pm</option>
                                <option value="2pm">2pm</option>
                                <option value="3pm">3pm</option>
                                <option value="4pm">4pm</option>
                                <option value="5pm">5pm</option>
                                <option value="6pm">6pm</option>
                                <option value="7pm">7pm</option>
                                <option value="8pm">8pm</option>
                                <option value="9pm">9pm</option>
                                <option value="11pm">10pm</option>
                                <option value="11pm">11pm</option>
                                <option value="12pm">12pm</option>
                            </select>
							</li>
                      
							<li class="span4">
                            <label for="people">Number People</label>
                            <select class="input-2" name="reserve_people" id="r_people">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
							</li>
                        </ul>
						
						<ul class="form-list">
						<li class="span4">
						 <label for="people">Type of Dining</label>     
                            <select class="input-2" name="dining_type" id="dining_type">
                                <option value=""></option>
                                <option value="1">Family Dine out</option>
                                <option value="2">Corporate</option>
                                <option value="3">Occasional</option>  
                                <option value="4">Friends</option>
                                <option value="5">Romantic</option> 								
                                <option value="6">Others</option> 
                            </select>
						  </li>
						  
						  <li class="span4">
                            <label for="f_name">Requested Date</label>
                            <input class="input-2" type="text" name="reserve_requested_date"  id="reserve_requested_date" />
							</li>
                        </ul>
					
						
						<ul class="form-list">
							<li class="span8">
                            <label for="requirments">Special Requirements</label>
                            <textarea class="textarea" rows="" cols="" name="requirements" id="requirements"></textarea>
							</li>
                        </ul>
						<ul class="form-list">
                        <li class="span4">
                            <label for="captcha">Are you human?  2 + 7 = </label>
                            <input class="input-2" type="text" name="reserve_captcha"  id="captcha" />
                        </li>
                        </ul>
						<ul class="form-list">
                        <li class="span4">
                            <label>
                            	<input type="checkbox" name="reserve_agree" id="r_agree" /> I agree with terms and condition set by Indi Chef
                            </label>
                        </li>
						</ul>
						<ul class="form-list">
                        <li class="span4">  
                            <input class="btns btn-submit-3" type="reset" name="" value="reset" /> 
						</li>
						<li class="span4">
                            <input id="online_table_reserve" class="btns btn-submit-3 pull-right" type="submit" name="submit" value="submit" />
                        </li>
						
					   </ul>
                   
				   <?php echo form_close(); ?>
				   
                </div>
          
            </div>
            <!--Row-->
        </div>  

        
                    <div class="tab-pane" id="res-offers">
                        <table width="100%" border="0" class="table table-bordered">
                                <tr>
                                    <td><h5>Delivery Offer</strong></h5>
                                    <td><h5>Collection Offer</h5></td>
                                    <td><h5>Dinning Offer</h5></td>
                                </tr>
                                <tr>
                                  <td><ul><?php foreach ($res_info As $allinfo) { if(!empty($allinfo->delivery_offer)){$delivery_offer = explode(",", $allinfo->delivery_offer); $arrlength=count($delivery_offer); for($x=0;$x<$arrlength;$x++) { echo "<li>".$delivery_offer[$x]."</li>"; echo "<br>"; } }} ?></ul></td>
                                  <td><ul><?php foreach ($res_info As $allinfo) { if(!empty($allinfo->collection_offer)){$collection_offer = explode(",", $allinfo->collection_offer); $arrlength=count($collection_offer); for($x=0;$x<$arrlength;$x++) { echo "<li>".$collection_offer[$x]."</li>"; echo "<br>"; } }} ?></ul></td>
                                  <td><ul><?php foreach ($res_info As $allinfo) { if(!empty($allinfo->dinning_offer)){$dinning_offer = explode(",", $allinfo->dinning_offer); $arrlength=count($dinning_offer); for($x=0;$x<$arrlength;$x++) { echo "<li>".$dinning_offer[$x]."</li>"; echo "<br>"; } }} ?></ul></td>
                                </tr>
                           </table>
                    </div>
					
<div class="tab-pane" id="res-gallery">
	<div class="row-fluid">
	<?php if (!empty($gallery_info)){
	foreach($gallery_info as $allphoto){
	?>
		<div class="gallery-img">
			<a href="<?php echo base_url();?>assets/uploads/<?php echo $allphoto->url; ?>" rel="prettyPhoto[]">
			<img src="<?php echo base_url();?>assets/uploads/<?php echo $allphoto->url; ?>" />
			</a>
		</div>
	<?php } }else {   echo 'Restaurant Gallery is empty';}?>
	</div>

</div>
		
	<script>
	  $(document).ready(function(){
		$('.carousel').carousel();
	  });
	</script>
                    <div class="tab-pane" id="res-location">
                        <!--<div id="map" width="100%" height="400"></div>-->
                        <div id="">
                  <?php echo $postcode= $res_info[0]->res_post_code; ?>
                    <iframe width="100%" height="450" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo "$postcode";?>&amp;aq=&amp;t=h&amp;g=<?php echo "$postcode";?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo "$postcode";?>&amp;z=18&amp;output=embed"></iframe>
                        </div>
                    </div>
                    <div class="tab-pane clearfix" id="res-reviews">
                        <div style="float: left; width: 70%;">
                                                    <?php
                                  foreach ($res_info As $allinfo)
                                    {
                                        if(!empty($allinfo->urltrip))
                                        {
                                    
                                  ?>
                                                    <!--
                            header restaurant review posting code
                        -->
<div id="TA_sswidecollectreview776" class="TA_sswidecollectreview">
<ul id="9fbrB5" class="TA_links INnEt3rR">
<li id="9V9MmEo" class="VA0PWAOhf0IE">Write a review of <a target="_blank" href="<?php
                                    
                                    foreach ($res_info As $allinfo)
                                    {
                                        echo $allinfo->urltrip;
                                    }
                                ?>"><?php
                                    
                                    foreach ($res_info As $allinfo)
                                    {
                                        echo $allinfo->res_name;
                                    }
                                ?></a></li>
</ul>
</div>
<script src="http://www.jscache.com/wejs?wtype=sswidecollectreview&amp;uniq=776&amp;locationId=<?php foreach ($res_info As $allinfo) { echo $allinfo->locationid; } ?>&amp;lang=en_US&amp;border=false"></script>
                        </div>
                        <?php
                                    }else{echo "no review";}}
                        ?>
                        <?php
                                  foreach ($res_info As $allinfo)
                                    {
                                        if(!empty($allinfo->urltrip))
                                        {
                                    
                                  ?>
                       <div style="float: right; width: 30%">
                                    <!--/tripadvisor review _wrap-->   
         <div id="TA_selfserveprop493" class="TA_selfserveprop">
<ul id="rZsYsvO" class="TA_links aXPP83Y4">
<li id="Dsjgg7IT" class="inkx7FYIYV7"><a target="_blank" href="<?php
                                    
                                    foreach ($res_info As $allinfo)
                                    {
                                        echo $allinfo->urltrip;
                                    }
                                ?>"><?php
                                    
                                    foreach ($res_info As $allinfo)
                                    {
                                        echo $allinfo->res_name;
                                    }
                                ?></a> in London</li>
</ul>
</div>
<script src="http://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=493&amp;locationId=<?php foreach ($res_info As $allinfo){echo $allinfo->locationid; } ?>&amp;lang=en_UK&amp;rating=false&amp;nreviews=10&amp;writereviewlink=true&amp;popIdx=false&amp;iswide=false&amp;border=false"></script>

                       </div>
                        <?php
                                    }else{echo "no review";}}
                        ?>
                    </div>

                </div>
            </div>  
            </div>
            </div>
            </div>
            </div>
			
			
        <!--Product Details-->
	   </div>  
    </div>
</section>
	</div> 
	</div> 
  <!--Content Area End--> 
  <style type="text/css">
	
	.catlist li{
	list-style:none;
	}
	.catlist a{
	padding:5px;
	text-decoration:none;
	}
	.catlist a:hover{
	padding:5px;
	background:#fff;
	}
  
    .pic img{
        float:left;
		margin-right:15px;
		border-radius:3px;
        }
	.pic h3{
		padding:5px;
		margin:0px;
		}
		.bor{
			margin-bottom:12px;
			padding:10px;
			border:0px solid #CCC;
			-moz-box-shadow:#C60 0 0 1px;
			-webkit-box-shadow:#C60 0 0 1px;
			box-shadow:#C60 0 0 1px;
			-moz-border-radius:2px;
			-webkit-border-radius:2px;
			border-radius:2px;
			}
			.tblfont table tr td{
				font-size:10px;
				}
			.listmenuitem{
				margin:0px;
				padding:0px;
				}
			.listmenuitem li{
				list-style:none;
				margin:0px;
				padding:0px;
				padding-left:15px;
				width:100%;
				border-bottom:1px solid #FC9;
				}
			.listmenuitem li:hover{
				background:#ae0101;
				}
			.new-bg{
			
			-mox-box-shadow:1px 1px 4px #ccc;
			-webkit-box-shadow:1px 1px 4px #ccc;
			box-shadow:1px 1px 4px #ccc;
			}
			
			.cartBox tbody td{
				text-align:left;
				padding:5px;
				}
			.gallery-img img{
			float:left;
			width:250px;
			margin:10px;
			height:250px;
			-mox-box-shadow:5px 5px 5px #A80000;
			-webkit-box-shadow:5px 5px 5px #A80000;
			box-shadow:5px 5px 5px #A80000;
			
-webkit-transition: all .5s ease-in-out;
-moz-transition: all .5s ease-in-out;
-ms-transition: all .5s ease-in-out;
-o-transition: all .5s ease-in-out;
transition: all .5s ease-in-out;
			}
			
			.gallery-img img:hover{
			-moz-transform: scale(1.2);
-webkit-transform: scale(1.2);
-o-transform: scale(1.2);
-ms-transform: scale(1.2);
transform: scale(1.2);
-webkit-transition: all .5s ease-in-out;
-moz-transition: all .5s ease-in-out;
-ms-transition: all .5s ease-in-out;
-o-transition: all .5s ease-in-out;
transition: all .5s ease-in-out;

			}
			
#sidebar { width:210px; left: 75%; top:50px; padding:15px; background:#eee; }
			
    </style>
	
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
    <script type="text/javascript">
        $(function() {
            var offset = $("#sidebar").offset();
            var topPadding = 15;
            $(window).scroll(function() {
                if ($(window).scrollTop() > offset.top) {
                    $("#sidebar").stop().animate({
                        marginTop: $(window).scrollTop() - offset.top + topPadding
                    });
                } else {
                    $("#sidebar").stop().animate({
                        marginTop: 0
                    });
                };
            });
        });
    </script>
	
<?php
	$this->load->view('admin/footer');
?>