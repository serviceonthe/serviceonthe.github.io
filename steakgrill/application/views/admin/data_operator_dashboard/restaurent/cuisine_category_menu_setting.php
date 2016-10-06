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
        <button type="button" class="btn btn-success">Add Caregory For Cuisine Type</button>
        <a href="<?php echo base_url();?>/index.php/admin/data_operator_restaurent/cuisine_item_menu_setting"><button type="button" class="btn btn-success">Add Cuisine Item</button></a>
        <?php echo form_open('admin/data_operator_restaurent/category_filter'); ?>
        <select style="width: 200px; height: 25px; margin-left: 715px;" name="cuisine_item_category">
            <option value="">Catagory List</option>
            <?php
            $cuisine_all_category=$this->db->select('cuisine_type_id,cuisine_type_category_name')->get('cuisine_type_category')->result();
            foreach($cuisine_all_category as $key){?>
                <option value="<?php echo $key->cuisine_type_category_name; ?>"> <?php echo $key->cuisine_type_category_name;?></option>
            <?php } ?>
        </select>
        <?php echo form_close(); ?>
    <div id="login_error" class="error"></div>
   <?php echo form_open('admin/data_operator_restaurent/add_cuisine_category');?>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">Add Caregory For Cuisine Type</legend>
    <table cellpadding="0">
        <tr><td ><input type="text"  class="form-control" placeholder="Enter Category Name" name="cuisine_type_category_name"value="<?php echo set_value('category_name');?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        
        <tr><td ><textarea cols="57"class="form-control" rows="3" name="cuisine_type_category_short_description" placeholder="Enter Category Short Description" value="" size="60"><?php echo set_value('category_short_description');?></textarea></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>  
        
    </table> 
    <table cellpadding="">
        <tr><td align="center"><input type="submit" name="submit_button" class="btn btn-lg btn-danger" value="Add Caregory For Cuisine Type>>" /></td></tr>

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