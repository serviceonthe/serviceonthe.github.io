<style type="text/css">
/*placeholder{color:#096;}
*/
</style>
<?php extract($edit_fetch);?>
<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->

   <?php echo form_open('admin/food/cuisine_type_category_update');?>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">Edit Cuisine Type Caregory</legend>
    <table cellpadding="0">
        <tr><td ><input type="text"  class="form-control" placeholder="Enter Category Name" name="cuisine_type_category_name"value="<?php echo $cuisine_type_category_name;?>" size="60"/></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        
        <tr><td ><textarea cols="57"class="form-control" rows="3" name="cuisine_type_category_short_description" placeholder="Enter Category Short Description" value="<?php echo $cuisine_type_category_short_description;?>" size="60"><?php echo $cuisine_type_category_short_description;?></textarea></td><td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
        
    </table> 
    <table cellpadding="">
        <tr><input type="hidden"  name="cuisine_type_id" value="<?php echo $cuisine_type_id; ?>"></tr>
        <tr><td align="center"><input type="submit" name="submit_button" class="btn btn-lg btn-danger" value="Edit Cuisine Type Caregory>>" /></td></tr>

    </table> 
     <?php echo form_close();?>
    <!--all code here -->
    <!--here is end changable content -->
	</div>
</div>

<?php echo validation_errors();?>