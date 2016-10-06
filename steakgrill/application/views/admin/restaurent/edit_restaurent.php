<?php
	$this->load->view('admin/header_link');
	$this->load->view('admin/header');
	$this->load->view('admin/menu');

?>
<style type="text/css">
/*placeholder{color:#096;}
*/
</style>

<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
    <?php extract($edit_fetch);?>
    <div id="login_error" class="error"></div>
   <?php echo form_open('admin/restaurent/restaurent_update');?>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">Restaurant Basic Information</legend>
    <table cellpadding="0">
        <tr><td ><input type="text"  class="form-control" name="res_name"value="<?php echo $res_name; ?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        
        <tr><td ><textarea cols="57"class="form-control" rows="3" name="res_address" value="<?php echo $res_address; ?>" size="60"><?php echo $res_address; ?></textarea></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" name="res_post_code"value="<?php echo $res_post_code; ?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
       
        <tr><td ><input type="text" class="form-control"  name="res_telephone1"value="<?php echo $res_telephone1;?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" name="res_telephone2"value="<?php echo $res_telephone2;?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
               
        <tr><td ><input type="text" class="form-control" name="res_fax_number"value="<?php echo $res_fax_number;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text"  class="form-control" name="res_email"value="<?php echo $res_email;?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
                     
        <tr><td ><input type="text" class="form-control" name="res_web_address"value="<?php echo $res_web_address;?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" name="res_manager_name"value="<?php echo $res_manager_name;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" name="res_manager_contact_number"value="<?php echo $res_manager_contact_number;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
 
    </table>
    </fieldset>

        
    
    <fieldset class="scheduler-border">
    <legend class="scheduler-border">Restaurant Profile Information</legend>
      <table cellpadding="0">
       <tr>
       <h5>Select Cuisine Type</h5>
       	<td>
        	<select name="res_cuisine_type" id="select" class="form-control">
                <?php
                if($res_cuisine_type=='indian')
                {
                    echo '<option selected="selected" value="indian">Indian</option>';
                    echo '<option value="chinese">Chinese</option>';
                    echo '<option value="japanese">Japanese</option>';
                    echo '<option value="thai">Thai</option>';
                    echo '<option value="italian">Italian</option>';
                    echo '<option value="french">French</option>';
                    echo '<option value="english">English</option>';
                    echo '<option value="turkish">Turkish</option>';
                    echo '<option value="others">Others</option>';
                }elseif($res_cuisine_type=='chinese'){
                    echo '<option value="indian">Indian</option>';
                    echo '<option selected="selected" value="chinese">Chinese</option>';
                    echo '<option value="japanese">Japanese</option>';
                    echo '<option value="thai">Thai</option>';
                    echo '<option value="italian">Italian</option>';
                    echo '<option value="french">French</option>';
                    echo '<option value="english">English</option>';
                    echo '<option value="turkish">Turkish</option>';
                    echo '<option value="others">Others</option>';
                }
                elseif($res_cuisine_type=='japanese'){
                    echo '<option value="indian">Indian</option>';
                    echo '<option value="chinese">Chinese</option>';
                    echo '<option selected="selected" value="japanese">Japanese</option>';
                    echo '<option value="thai">Thai</option>';
                    echo '<option value="italian">Italian</option>';
                    echo '<option value="french">French</option>';
                    echo '<option value="english">English</option>';
                    echo '<option value="turkish">Turkish</option>';
                    echo '<option value="others">Others</option>';
                }
                elseif($res_cuisine_type=='thai'){
                    echo '<option value="indian">Indian</option>';
                    echo '<option value="chinese">Chinese</option>';
                    echo '<option value="japanese">Japanese</option>';
                    echo '<option selected="selected" value="thai">Thai</option>';
                    echo '<option value="italian">Italian</option>';
                    echo '<option value="french">French</option>';
                    echo '<option value="english">English</option>';
                    echo '<option value="turkish">Turkish</option>';
                    echo '<option value="others">Others</option>';
                }
                elseif($res_cuisine_type=='italian'){
                    echo '<option selected="selected" value="indian">Indian</option>';
                    echo '<option value="chinese">Chinese</option>';
                    echo '<option value="japanese">Japanese</option>';
                    echo '<option value="thai">Thai</option>';
                    echo '<option selected="selected" value="italian">Italian</option>';
                    echo '<option value="french">French</option>';
                    echo '<option value="english">English</option>';
                    echo '<option value="turkish">Turkish</option>';
                    echo '<option value="others">Others</option>';
                }
                elseif($res_cuisine_type=='french'){
                    echo '<option value="indian">Indian</option>';
                    echo '<option value="chinese">Chinese</option>';
                    echo '<option value="japanese">Japanese</option>';
                    echo '<option value="thai">Thai</option>';
                    echo '<option value="italian">Italian</option>';
                    echo '<option selected="selected" value="french">French</option>';
                    echo '<option value="english">English</option>';
                    echo '<option value="turkish">Turkish</option>';
                    echo '<option value="others">Others</option>';
                }
                elseif($res_cuisine_type=='english'){
                    echo '<option value="indian">Indian</option>';
                    echo '<option value="chinese">Chinese</option>';
                    echo '<option value="japanese">Japanese</option>';
                    echo '<option value="thai">Thai</option>';
                    echo '<option value="italian">Italian</option>';
                    echo '<option value="french">French</option>';
                    echo '<option selected="selected" value="english">English</option>';
                    echo '<option value="turkish">Turkish</option>';
                    echo '<option value="others">Others</option>';
                }
                elseif($res_cuisine_type=='turkish'){
                    echo '<option value="indian">Indian</option>';
                    echo '<option value="chinese">Chinese</option>';
                    echo '<option value="japanese">Japanese</option>';
                    echo '<option value="thai">Thai</option>';
                    echo '<option value="italian">Italian</option>';
                    echo '<option value="french">French</option>';
                    echo '<option value="english">English</option>';
                    echo '<option selected="selected" value="turkish">Turkish</option>';
                    echo '<option value="others">Others</option>';
                }
                elseif($res_cuisine_type=='others'){
                    echo '<option value="indian">Indian</option>';
                    echo '<option value="chinese">Chinese</option>';
                    echo '<option value="japanese">Japanese</option>';
                    echo '<option value="thai">Thai</option>';
                    echo '<option value="italian">Italian</option>';
                    echo '<option value="french">French</option>';
                    echo '<option value="english">English</option>';
                    echo '<option value="turkish">Turkish</option>';
                    echo '<option selected="selected" value="others">Others</option>';
                }else{
                    echo '<option selected="selected" value="indian">Indian</option>';
                    echo '<option value="chinese">Chinese</option>';
                    echo '<option value="japanese">Japanese</option>';
                    echo '<option value="thai">Thai</option>';
                    echo '<option value="italian">Italian</option>';
                    echo '<option value="french">French</option>';
                    echo '<option value="english">English</option>';
                    echo '<option value="turkish">Turkish</option>';
                    echo '<option value="others">Others</option>';
                }



                ?>
<!--
                <option value="indian">Indian</option>
                <option value="chinese">Chinese</option>
                <option value="japanese">Japanese</option>
                <option value="thai">Thai</option>
                <option value="italian">Italian</option>
                <option value="french">French</option>
                <option value="english">English</option>
                <option value="turkish">Turkish</option>
                <option value="others">Others</option>  -->
    		</select>
    	</td>
    <td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        
        
    </table>
    <table cellpadding="0">
    
        <tr><td >
    
      <h5>Select Food Type</h5>
      <label>
      <input type="checkbox" name="res_food_halal" id="halal" value="halal"  />
      Halal</label>
    <label>
      <input type="checkbox" name="res_food_indian" id="indian" value="indian" />
      Indian</label>
    <label>
      <input type="checkbox" name="res_food_bangladeshi" id="bangladeshi" value="bangladeshi" />
      Bangladeshi</label>
    <label>
      <input type="checkbox" name="res_food_pakistan" id="pakistan" value="pakistan" />
      Pakistan</label>
    <label>
      <input type="checkbox" name="res_food_vegetarian" id="vegetarian" value="vegetarian" />
      Vegetarian</label>
      <label>
      <input type="checkbox" name="res_food_thai" id="thai" value="thai" />
      Thai</label>
      <label>
      <input type="checkbox" name="res_food_chinese" id="chinese" value="chinese" />
      Chinese</label>
      <label>
      <input type="checkbox" name="res_food_italian" id="italian" value="italian" />
      Italian</label>
      
        </td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>     
       
                <tr><td >
    
      <h5>please select approprite restaurant services :</h5>
    <strong><label>
      <input type="checkbox" name="food_delivery" id="food_delivery" value="1" />
    </label> 
    Food Delivery 
    <label>
      <input type="checkbox" name="food_collection" id="food_collection" value="1" />
    </label> 
    Food Collection 
    <label>
      <input type="checkbox" name="food_dinning" id="food_dinning" value="1" />
    </label> 
    Dinning In</strong>
      
        </td><td style="color: #F00;">*</td></tr> 
            <tr><td ><input type="text" class="form-control" name="delivery_min_time" value="<?php echo $delivery_min_time;?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
            <tr><td ><input type="text" class="form-control" name="delivery_max_time" value="<?php echo $delivery_max_time;?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
            <tr><td ><input type="text" class="form-control" name="minimum_order" value="<?php echo $minimum_order;?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
            <tr><td ><input type="text" class="form-control" name="delivery_charge" value="<?php echo $delivery_charge;?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
    
    
    
    
    
    
    
    
        <tr><td>Enter Restarant short description</td></tr>
        <tr><td ><textarea  cols="57" class="form-control" rows="3" id="rjs1"   name="res_short_desc" value="<?php echo $res_short_desc;?>"><?php echo $res_short_desc;?></textarea></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        <tr><td>Enter Restarant Long description</td></tr>
        <tr><td ><textarea id="rjs" cols="57" class="form-control" rows="3"  name="res_long_desc" value="<?php echo $res_long_desc;?>"><?php echo $res_long_desc;?></textarea></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        <tr><td ><input type="text"  class="form-control" name="res_service_area" value="<?php echo $res_service_area;?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        <!--
       <tr><td><select name="res_delivery_radius" id="select" class="form-control">
       <option value="o">Select Radius From 1 To 15</option>
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>
       <option value="6">6</option>
       <option value="7">7</option>
       <option value="8">8</option>
       <option value="9">9</option>
       <option>10</option>
       <option>11</option>
       <option>12</option>
       <option>13</option>
       <option>14</option>
       <option>15</option>
     </select></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>        -->
        <tr><td ><input type="text"  class="form-control" name="res_delivery_radius"value="<?php echo $res_delivery_radius;?>" placeholder="Enter Delivery Radius  Example ( 1, 2, 3 )" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>

    </table>
</fieldset>
    	
        
        <fieldset class="scheduler-border">
        <legend class="scheduler-border">Restaurant Business Hour</legend>

            <table>
                <!--
			  <tr><td ><input type="text"  class="form-control" name="business_hour"value="<?php //echo $business_hour;?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        
             <tr><td ><input type="text"  class="form-control" name="order_recieving_mail"value="<?php //echo $order_recieving_mail;?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>

             <tr><td ><input type="text"  class="form-control" name="order_recieving_fax"value="<?php// echo $order_recieving_fax;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
-->
     <tr><td>Do you want to be Restaurant Listing Status?
       <select name="restaurant_listing_status" id="select8" class="form-control">
      <option value="enable">Enable</option>
      <option value="disable">Disable</option>
       </select>
     </label></td></tr>
     <tr><td>Do you want a copy to be send to owner or restaurant owner Email?
       <select name="owner_mail_status" id="select8" class="form-control">
      <option value="1">Yes</option>
      <option value="0">No</option>
       </select>
     </label></td></tr>
     <tr><td>Online Order Available For this Restaurant?
       <select name="online_order" id="select8" class="form-control">
      <option value="1">Yes</option>
      <option value="0">No</option>
       </select>
     </label></td></tr>     
     <tr><td > Telephone Order Available For this Restaurant?
    <select name="telephone_order" id="select9" class="form-control">
      <option value="1">Yes</option>
      <option value="0">No</option>
    </select>
  </td></tr>
                <!--
          <tr><td >  Delivery Starting Time
  <select name="delivery_start" id="delivery_start" class="form-control">
    <option value="5pm">5pm</option>
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="9pm">8pm</option>
    <option value="10pm">10pm</option>
    <option value="11pm">11pm</option>
    <option value="12pm">12pm</option>
  </select>
  </td></tr>
               <tr><td >  Delivery Ending Time?
<select name="delivery_end" id="delivery_end" class="form-control">
  <option value="5pm">5pm</option>
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="9pm">8pm</option>
    <option value="10pm">10pm</option>
    <option value="11pm">11pm</option>
    <option value="12pm">12pm</option>
  </select>
  </td></tr>
  <tr><td >  Collection Starting Time?
<select name="collection_start" id="collection_start"class="form-control">
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
    <option value="10pm">10pm</option>
    <option value="11pm">11pm</option>
    <option value="12pm">12pm</option>
  </select>
  </td></tr>
                         <tr><td >  Collection Ending Time
<select name="collection_end" id="collection_end" class="form-control">
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
    <option value="10pm">10pm</option>
    <option value="11pm">11pm</option>
    <option value="12pm">12pm</option>
  </select>
  </td></tr>    -->
                <tr><td ><input type="text"  class="form-control" name="delivery_start"value="<?php echo $delivery_start;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
                <tr><td ><input type="text"  class="form-control" name="delivery_end"value="<?php echo $delivery_end;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
                <tr><td ><input type="text"  class="form-control" name="collection_start"value="<?php echo $collection_start;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
                <tr><td ><input type="text"  class="form-control" name="collection_end"value="<?php echo $collection_end;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        </table>
    </fieldset>
        
        
        
    
        <fieldset class="scheduler-border">
    <legend class="scheduler-border">Restaurant Owner Information</legend>
<table cellpadding="0">
        
        <tr><td ><input type="text"  class="form-control" name="res_owner_name"value="<?php echo $res_owner_name;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" name="res_owner_email"value="<?php echo $res_owner_email;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" name="res_owner_mobile"value="<?php echo $res_owner_mobile;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
       
    </table>
</fieldset>
    
    
        <fieldset class="scheduler-border">
    <legend class="scheduler-border">Restaurant Bank Information</legend>
<table cellpadding="0">
        
        <tr><td ><input type="text"  class="form-control" name="res_bank_name" value="<?php echo $res_bank_name;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" name="res_account_name" value="<?php echo $res_account_name;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" name="res_account_number" value="<?php echo $res_account_number;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" name="res_sort_code" value="<?php echo $res_sort_code;?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        
    </table>
</fieldset>
    
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Restaurant Commission Information</legend>
<table cellpadding="0">
        
        <tr><td ><div class="form-group input-group"><input type="text"  class="form-control" name="res_commission_food" size="60"value="<?php echo $res_commission_food;?>"/><span class="input-group-addon">%</span></td><td style="color: #F00;">*<div align="center" class="error"></div></div></td></tr>
        
        <tr><td ><div class="form-group input-group"><input type="text"  class="form-control" name="res_commission_person" size="60"value="<?php echo $res_commission_person;?>"/><span class="input-group-addon"> &pound;</span></td><td style="color: #F00;">*<div align="center" class="error"></div></div></td></tr>
        
     
    </table>
</fieldset>

<fieldset class="scheduler-border">
    <legend class="scheduler-border">Restaurant Meta Data Information</legend>
<table cellpadding="0">  
        <tr><td ><input type="text"  class="form-control" name="res_page_title" size="60"value="<?php echo $res_page_title;?>"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
          
        <tr><td ><input type="text"  class="form-control" name="res_meta_keyword" size="60"value="<?php echo $res_meta_keyword;?>"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><textarea cols="57"class="form-control" rows="3" name="res_meta_desc"value="<?php echo $res_meta_desc;?>" size="60"><?php echo $res_meta_desc;?></textarea></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        
         <tr><td ><textarea cols="57"class="form-control" rows="3" name="res_google_analytics" value="<?php echo $res_google_analytics;?>" size="60"><?php echo $res_google_analytics;?></textarea></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>

         <tr><td>&nbsp;</td><td>&nbsp;</td></tr> 
         <tr><td><div id="restaurant_image_div"></div></td><td>&nbsp;</td></tr>             
    </table>
</fieldset>   
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Add Trip Advisor Information</legend>
<table cellpadding="0">
        
        <tr><td ><input type="text"  class="form-control" name="urltrip" size="60"value="<?php echo $urltrip;?>"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
    <tr><input type="hidden"  name="res_id" value="<?php echo $res_id; ?>"></tr>
</table>
</fieldset>  

      <table cellpadding="">
        <tr><td align="center"><input type="submit" name="submit_button" class="btn btn-lg btn-danger" value="Add Restaurant Information>>" /></td></tr>

    </table> 
     <?php echo form_close();?>
    <!--all code here -->
    <!--here is end changable content -->
	</div>
</div>

<?php
	$this->load->view('admin/footer');
?>

