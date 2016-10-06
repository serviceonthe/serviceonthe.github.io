
<div class="template-page-wrapper">
	<div class="templatemo-content">
<div id="page-wrapper">
    <?php
        if(validation_errors())
        {
            ?>    
                <div class="alert alert-danger alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php
        }
    ?>
 <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Menu Item</h1>
        </div>
    </div>    
 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
            <!--DataTables Advanced Tables-->
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                       <?php echo form_open_multipart('admin/food/add_menu_item');?>                           
                                                                            
                            <table cellpadding="20" class="add_menu_form">
                                <tr><td width="100">Item Name <span style="color:red;">*</span></td><td style="height:20px"><input class="form-control" required type="text" placeholder="Enter Item Name" value="<?php echo set_value('item_name'); ?>" name="item_name" size="40"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>Short Description </td><td style="height:20px"><textarea class="form-control"  cols="57" rows="3" name="item_short_description" placeholder="Enter Short Description" size="60"><?php echo set_value('item_short_description'); ?></textarea></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                               
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Item Catagory <span style="color:red;">*</span></td>
                                    <td style="height:20px">                
                                    <select required class="form-control" name="item_catagory_id" id="cat">
                                        <option value="" >Select a Catagory</option>
                                            <?php
                                                $all_category=$this->db->select('catagory_id,catagory_name')->get('indi_catagories')->result();
                                                foreach($all_category as $key){?>
                                                    <option value="<?php echo $key->catagory_id; ?>"> <?php echo $key->catagory_name;?></option>
                                            <?php } ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td width="150">Item Price <span style="color:red;">*</span></td><td style="height:20px"><input class="form-control" required type="text" placeholder="Enter Item Price" value="<?php echo set_value('price'); ?>" name="price" size="60"/></td></tr>       
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>  
                                <tr><td>Item Long Description</td><td style="height:20px"><textarea class="form-control" cols="57" rows="7" name="item_long_description" placeholder="Enter Long Description" size="60"><?php echo set_value('item_long_description'); ?></textarea></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Item Ingredient</td>
                                    <td style="height:20px">
                                            <textarea class="form-control" cols="57" rows="4" name="item_ingredient" placeholder="Enter Ingredient" size="60"><?php echo set_value('item_ingredient'); ?></textarea>            
                                    </td>
                                </tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Youtube Video URL</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Video URL" value="<?php echo set_value('item_video_url'); ?>" name="item_video_url" size="60"/></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>Page Title</td><td style="height:20px"><textarea class="form-control" cols="57" rows="3" name="item_page_tile" placeholder="Enter Page Title" size="60"><?php echo set_value('item_page_tile'); ?></textarea></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>Item Meta Description</td><td style="height:20px"><textarea class="form-control" cols="57" rows="3" name="item_meta_description" placeholder="Enter Meta Description" size="60"><?php echo set_value('item_meta_description'); ?></textarea></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>Item Meta Keyword</td><td style="height:20px"><textarea class="form-control" cols="57" rows="3" name="item_meta_keyword" placeholder="Enter Meta Keyword" size="60"><?php echo set_value('item_meta_keyword'); ?></textarea></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>Item Cooking Method</td><td style="height:20px"><textarea class="form-control" cols="57" rows="3" name="item_cooking_method" placeholder="Enter Cooking Method" size="60"><?php echo set_value('item_cooking_method'); ?></textarea></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                               
                                <tr><td>Preparation Time(Minite)</td><td style="height:20px"><input class="form-control" type="number" placeholder="Enter Preparation Time" value="<?php echo set_value('preparation_time'); ?>" name="preparation_time" size="60"/></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>Cooking Time(Minite)</td><td style="height:20px"><input class="form-control" type="number" placeholder="Enter Cooking Time" value="<?php echo set_value('cooking_time'); ?>" name="cooking_time" size="60"/></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>Serves</td><td style="height:20px"><input class="form-control" type="text" placeholder="Serves" value="<?php echo set_value('serves'); ?>" name="serves" size="60"/></td></tr>        
                                
                                
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Allergy</td>
                                    <td style="height:20px">

                                        <?php 
                                            if($allergy):
                                                $i=1;
                                                foreach ($allergy as $key => $value):
                                                    ?>
                                                        <label for="<?php echo $i; ?>">
                                                            <input id="<?php echo $i; ?>" type="checkbox" name="allergy[]" value="<?php echo $value['id']; ?>" />
                                                            <?php echo $value['name']; ?>
                                                        </label>
                                                    <?php
                                                    $i++;
                                                endforeach;
                                            else:
                                                echo "Not Found";
                                            endif;
                                        ?>
                                    </td>
                                </tr>      
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td style="height:20px" align="center" colspan="2"><input class="btn btn-lg btn-success" type="submit" value="Add Item"/></td></tr>          
                            </table>
                        
                    </div>
                <!-- /.table-responsive -->
                </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->

    </div> <!-- End row -->
</div> <!-- End Container -->
</div>
</div>
</div>
