<?php 
	// print_r($customer_info); 
	extract($customer_info);
?>
<style type="text/css">
	
	tbody td {
  		padding: 5px !important;
	}
</style>
<script type="text/javascript">
	$(document).ready(function () {
		$('#post_code').blur(function(){ 
		      var postCode=$("#post_code").val();
		      //alert(postCode);

	            $.ajax({
	            url: "<?php echo base_url(); ?>" + "order/getDistance",
	            type: "POST",
	            data: {postCode: postCode},
	            async: false,
	            dataType: "json",

	            success: function (data) {
	                console.log(data);
	                var minimum_order_amount=data.minimum_order_amount; 
	                var free_delivery_radius=data.free_delivery_radius; 
	                var max_delivery_radius=data.max_delivery_radius; 
	                var max_delivery_charge=data.max_delivery_charge; 
	                var miles=data.miles; 
	                var deliveryCharge=0; 
	                //alert(miles);

					if(miles > max_delivery_radius){
	                    //alert(deliveryCharge); 
	                    $('#save_changes').hide();
	                    $('#errorMessage').show();
	                    $('#error_message').html('Sorry, This postcode is outer from our maximum delivery area');
	                    $('#post_code').val('');
	                }else{
	                	$('#errorMessage').hide();
	                	$('#save_changes').show();
	                }
	            },
	            error: function(xhr, status, error) {
	                $('#errorMessage').show();
	                $('#error_message').html('Invalid Postcode'); 
	            }
	    });
	  });
	});
</script>

	<br>
	<section>
		<div class="container">
			<div class="box2">
				<div class="row">
					<div class="col-md-12">
						<h3>Accout info</h3>
						<h3>Why sign up?</h3>
						<p>Get local offers by email every week, re-order saved meals in a few clicks, store your delivery address and build a list of your favourite local takeaways.</p><hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>Your details:</h4>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-5 control-label">Email</label>
						    <div class="col-sm-7">
						    <p style="color:#78297B;"><?php echo $email; ?></p>
						      <!-- <input type="email" name="email" value="<?php echo $email; ?>" readonly class="form-control" id="inputEmail3" placeholder="Email"> -->
						    </div>
						  </div>
						  <br/>
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-5 control-label">Name</label>
						    <div class="col-sm-7">
						    <?php echo $first_name.' '. $last_name; ?>
						      <!-- <input type="text" name="name" value="<?php echo $first_name.' '. $last_name; ?>" readonly class="form-control" id="inputPassword3" placeholder="Name"> -->
						    </div>
						  </div>
						  <br/>
						  <div class="form-group">
						    <div class=" col-sm-12">
						      
						        <?php echo form_open_multipart('user/change_password'); ?>

						        <div class="form-group">
								    <label for="inputPassword3" class="col-sm-5 control-label">Password</label>
								    <div class="col-sm-10">
								      <input type="password" name="password" value="" class="form-control" placeholder="Enter new password">
								    </div>
								</div>
								<br/>
								<br/>
								<div class="form-group">
								    <label for="inputPassword3" class="col-sm-5 control-label">Confirm password</label>
								    <div class="col-sm-10">
								      <input type="password" name="c_password" value="" class="form-control" placeholder="Enter confirm password">
								    </div>
								</div>
								<br/>
								<br/>
								<div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label"></label>
								    <div class="col-sm-10">
								      <input type="submit" id="save_changes" class="btn btn-warning btn-lg active" value="Changes Password" />
								    </div>
								</div>
<!-- 

						          <label for="inputPassword3" class="col-sm-5 control-label">Password</label>
						          <input type="password" name="password" value="" class="form-control" placeholder="Enter new password"><br>
						          <label for="inputPassword3" class="col-sm-5 control-label">Confirm_password</label>
						          <input type="password" name="c_password" value="" class="form-control" placeholder="Enter confirm password"><br> -->
						          <!-- <input type="submit" id="save_changes" class="btn btn-warning btn-lg active" value="Changes Password" /> -->
						          <?php echo form_close(); ?>
						     
						      
						    </div>
						  </div>
					</div>
					<?php echo form_open_multipart('user/address_update'); ?>

					
					<div class="col-md-6 Delivery">
						<h4>Address:</h4>
						     <input type="text" id="address_line1" class="input" name="address_line1"  value="<?php echo $address_line1; ?>" size="35" /><br><br>
						     <input type="text" id="address_line2" class="input" name="address_line2"  value="<?php echo $address_line2; ?>" size="35" /><br><br>
						     <input type="text" id="city" class="input" name="city"  value="<?php echo $city.' '.$country; ?>" size="35" /><br><br>
						     Postcode: * 
						     <input type="text" id="post_code" class="input" name="post_code"  value="<?php echo $post_code; ?>" size="15" />
						     <!-- <input type="text" id="name" class="input" name="name"  value="" size="6" />
						     <input type="text" id="name" class="input" name="name"  value="" size="4" /><br> -->
						<div id="errorMessage">
	                    	<span style="color:red;" id="error_message"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h3>Additional information:</h3>
						<p>Please input the additional fields below which will help us improve our service.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
					<table>
					<tr>
						<td width="60%">
							Birthday:  
						</td>
						<td width="40%">
						<?php if($birthday){ ?>

						     <input type="text" class="input" name="birthday"  value="<?php echo $birthday; ?>"  readonly="true" /><br/>
						<?php	}else{ ?>
						     <input type="text" class="input" name="birthday"  value="<?php echo $birthday; ?>"  /><br/>

						<?php	} ?>

						</td>
					</tr>
					<tr>
						<td width="40%">
							Partner birthday:  
						</td>
						<td width="60%">
						<?php if($partner_birthday){ ?>

						     <input type="text" class="input" name="partner_birthday"  value="<?php echo $partner_birthday; ?>"   readonly="true"  /><br/>
						<?php	}else{ ?>
						     <input type="text" class="input" name="partner_birthday"  value="<?php echo $partner_birthday; ?>"  /><br/>

						<?php	} ?>

						</td>
					</tr>
					<tr>
						<td width="40%">
							Anniversary date:  
						</td>
						<td width="60%">
						<?php if($anniversary_date){ ?>

						     <input type="text" class="input" name="anniversary_date"  value="<?php echo $anniversary_date; ?>"  readonly="true"  /><br/>
						<?php	}else{ ?>
						     <input type="text" class="input" name="anniversary_date"  value="<?php echo $anniversary_date; ?>"  /><br/>

						<?php	} ?>

						</td>
					</tr>
					<tr>
						<td width="40%">
							Birthday:  
						</td>
						<td width="60%">
						<?php if($special_day){ ?>

						     <input type="text" class="input" name="special_day"  value="<?php echo $special_day; ?>"   readonly="true"  /><br/>
						<?php	}else{ ?>
						     <input type="text" class="input" name="special_day"  value="<?php echo $special_day; ?>"  /><br/>

						<?php	} ?>

						</td>
					</tr>
					</table>
					
					</div>
					<div class="col-md-4">
						<!-- <button type="button" class="btn btn-default btn-lg active">Delete</button> -->
						<input type="submit" id="save_changes" class="btn btn-warning btn-lg active" value="Save changes" />
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</section>


