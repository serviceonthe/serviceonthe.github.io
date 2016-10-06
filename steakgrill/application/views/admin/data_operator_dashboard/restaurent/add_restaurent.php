<?php
	$this->load->view('admin/data_operator_dashboard/header_link');
	$this->load->view('admin/data_operator_dashboard/header');
	$this->load->view('admin/data_operator_dashboard/menu');

?>
<style type="text/css">
/*placeholder{color:#096;}
*/
</style>

<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
  		 	<a href="add_restaurent"><button type="button" class="btn btn-success">Restaurant Information </button></a>
            <a href=""><button type="button" class="btn btn-success">Feature Information </button></a>
            <a href=""><button type="button" class="btn btn-success">Restaurant Menu Setting >></button></a>

    
    <div id="login_error" class="error"></div>
   <?php echo form_open('admin/data_operator_restaurent/add_restaurent');?>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">Restaurant Basic Information </legend>
    <table cellpadding="0">
        <tr><td ><input type="text"  class="form-control" placeholder="Enter Restaurant Name" name="res_name"value="<?php echo set_value('res_name');?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        
        <tr><td ><textarea cols="57"class="form-control" rows="3" name="res_address" placeholder="Enter Address" value="" size="60"><?php echo set_value('res_address');?></textarea></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>  
        
        <tr><td ><input type="text" class="form-control" placeholder="Enter Post Code" name="res_post_code"value="<?php echo set_value('res_post_code');?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
       
        <tr><td ><input type="test" class="form-control" placeholder="Enter Telephone 1" name="res_telephone1"value="<?php echo set_value('res_telephone1');?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="test" class="form-control" placeholder="Enter Telephone 2" name="res_telephone2"value="<?php echo set_value('res_telephone2');?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
               
        <tr><td ><input type="text" class="form-control" placeholder="Enter Fax Number" name="res_fax_number"value="<?php echo set_value('res_fax_number');?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text"  class="form-control" placeholder="Enter Email" name="res_email"value="<?php echo set_value('res_email');?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
                     
        <tr><td ><input type="text" class="form-control" placeholder="Enter Web Address" name="res_web_address"value="<?php echo set_value('res_web_address');?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" placeholder="Enter Manager Name" name="res_manager_name"value="<?php echo set_value('res_manager_name');?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" placeholder="Enter Contact Number" name="res_manager_contact_number"value="<?php echo set_value('res_manager_contact_number');?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
 
    </table>
    </fieldset>

        
    
    <fieldset class="scheduler-border">
    <legend class="scheduler-border">Restaurant Profile Information</legend>
      <table cellpadding="0">
       <tr>
       <h5>Select Cuisine Type</h5>
       	<td>
        	<select name="res_cuisine_type" id="select" class="form-control">
            	<option value="">Select Cuisine Type</option>
                <option value="indian">Indian</option>
                <option value="chinese">Chinese</option>
                <option value="japanese">Japanese</option>
                <option value="thai">Thai</option>
                <option value="italian">Italian</option>
                <option value="french">French</option>
                <option value="english">English</option>
                <option value="turkish">Turkish</option>
                <option value="others">Others</option>
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
           <tr><td ><input type="text" class="form-control" placeholder="Enter Minimum Time for Delivery time" name="delivery_min_time"value="<?php echo set_value('delivery_min_time');?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
           <tr><td ><input type="text" class="form-control" placeholder="Enter Minimum Time for food Collection" name="delivery_max_time"value="<?php echo set_value('delivery_max_time');?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
            <tr><td ><input type="text" class="form-control" placeholder="Enter Minimum Order Value" name="minimum_order"value="<?php echo set_value('minimum_order');?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
       <tr><td ><input type="text"  class="form-control" placeholder="Enter Delivery Charge" name="delivery_charge"value="<?php echo set_value('delivery_charge');?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>

        <tr><td>Enter Restarant short description</td></tr>
        <tr><td ><textarea  cols="57"class="form-control" rows="3" id="rjs1"   name="res_short_desc" placeholder="Enter Short Description" size="60"value=""><?php echo set_value('res_short_desc');?></textarea></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        <tr><td>Enter Restarant Long description</td></tr>
        <tr><td ><textarea id="rjs" cols="57"class="form-control" rows="3"  name="res_long_desc" placeholder="Enter Long Description" size="60"value=""><?php echo set_value('res_long_desc');?></textarea></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text"  class="form-control" placeholder="Enter Area Name YOu Provice food delivery Service" name="res_service_area"value="<?php echo set_value('res_service_area');?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>

        <tr><td ><input type="text"  class="form-control" name="res_delivery_radius" value="" placeholder="Enter Delivery Radius  Example ( 1, 2, 3 )" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        
    </table>
</fieldset>
    	
        
        <fieldset class="scheduler-border">
        <legend class="scheduler-border">Restaurant Business Information</legend>
        <table>

     <tr><td ><input type="text"  class="form-control" placeholder="Enter Restaurant order Recieving Email" name="order_recieving_mail"value="<?php echo set_value('order_recieving_mail');?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
     
     <tr><td ><input type="text"  class="form-control" placeholder="Enter Restaurant order Recieving Fax" name="order_recieving_fax"value="<?php echo set_value('order_recieving_fax');?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
     
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

            <tr><td ><input type="text"  class="form-control" name="delivery_start" value="" placeholder="Delivery Starting Time" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
            <tr><td ><input type="text"  class="form-control" name="delivery_end" value="" placeholder="Delivery Ending Time" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
            <tr><td ><input type="text"  class="form-control" name="collection_start" value="" placeholder="Collection Starting Time" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
            <tr><td ><input type="text"  class="form-control" name="collection_end" value="" placeholder="Collection Ending Time" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>

        </table>
    </fieldset>
        
        
        
    
        <fieldset class="scheduler-border">
    <legend class="scheduler-border">Restaurant Owner Information</legend>
<table cellpadding="0">
        
        <tr><td ><input type="text"  class="form-control" placeholder="Enter Owner Name" name="res_owner_name"value="<?php echo set_value('res_owner_name');?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" placeholder="Enter Email Address" name="res_owner_email"value="<?php echo set_value('res_owner_email');?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" placeholder="Enter Mobile Number" name="res_owner_mobile"value="<?php echo set_value('res_owner_mobile');?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
       
    </table>
</fieldset>
    
    
        <fieldset class="scheduler-border">
    <legend class="scheduler-border">Restaurant Bank Information</legend>
<table cellpadding="0">
        
        <tr><td ><input type="text"  class="form-control" placeholder="Enter Bank Name" name="res_bank_name" value="<?php echo set_value('res_bank_name');?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" placeholder="Enter Account Name" name="res_account_name" value="<?php echo set_value('res_account_name');?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" placeholder="Enter Account Number" name="res_account_number" value="<?php echo set_value('res_account_number');?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><input type="text" class="form-control" placeholder="Enter Sort Code" name="res_sort_code" value="<?php echo set_value('res_sort_code');?>" size="60"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        
    </table>
</fieldset>
    
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Restaurant Commission Information</legend>
<table cellpadding="0">
        
        <tr><td ><div class="form-group input-group"><input type="text"  class="form-control" placeholder="Enter Commission On Food Order Agreed " name="res_commission_food" size="60"value="<?php echo set_value('res_commission_food');?>"/><span class="input-group-addon">%</span></td><td style="color: #F00;">*<div align="center" class="error"></div></div></td></tr>
        
        <tr><td ><div class="form-group input-group"><input type="text"  class="form-control" placeholder="Enter Commission  Per Person Agreed &pound;1 or &pound;2" name="res_commission_person" size="60"value="<?php echo set_value('res_commission_person');?>"/><span class="input-group-addon"> &pound;</span></td><td style="color: #F00;">*<div align="center" class="error"></div></div></td></tr>
        
     
    </table>
</fieldset>

<fieldset class="scheduler-border">
    <legend class="scheduler-border">Restaurant Meta Data Information</legend>
<table cellpadding="0">  
        <tr><td ><input type="text"  class="form-control" placeholder="Enter Restaurant Page Title" name="res_page_title" size="60"value="<?php echo set_value('res_page_title');?>"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
          
        <tr><td ><input type="text"  class="form-control" placeholder="Enter Restaurnat Meta Keyword Like(a,b,c) " name="res_meta_keyword" size="60"value="<?php echo set_value('res_meta_keyword');?>"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        <tr><td ><textarea cols="57"class="form-control" rows="3" name="res_meta_desc" placeholder="Enter Restaurant Meta Description"value="" size="60"><?php echo set_value('res_meta_desc');?></textarea></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        
        
         <tr><td ><textarea cols="57"class="form-control" rows="3" name="res_google_analytics" placeholder="Enter Google Analytics code"value="" size="60"><?php echo set_value('res_google_analytics');?></textarea></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>

         <tr><td>&nbsp;</td><td>&nbsp;</td></tr> 
         <tr><td><div id="restaurant_image_div"></div></td><td>&nbsp;</td></tr>             
    </table>
</fieldset>   
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Add Trip Advisor Information</legend>
<table cellpadding="0">
        
        <tr><td ><input type="text"  class="form-control" placeholder="Enter Restaurnat Tripadvisor Url" name="urltrip" size="60"value="<?php echo set_value('urltrip');?>"/></td><td style="color: #F00;"><div align="center" class="error"></div></td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
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
	$this->load->view('admin/data_operator_dashboard/footer');
?>


<?php echo validation_errors();?>