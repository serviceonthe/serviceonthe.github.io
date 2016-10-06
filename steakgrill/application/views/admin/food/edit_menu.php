
<?php extract($edit_fetch)?>
<div class="template-page-wrapper">
    <div class="templatemo-content">
    <!--here is start changable content -->
    <!--all code here -->
        <div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Menu</h1>
        </div>
    </div>    
 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
<!--                            DataTables Advanced Tables-->
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <?php echo form_open('admin/food/menu_item_update'); ?>
                            <table cellpadding="20" class="table-hover">
                                <input type="hidden" value="<?php echo $item_id; ?>" name="item_id" size="60"/>
                                <tr><td width="150">Item Name</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Item Name" value="<?php echo $item_name; ?>" name="item_name" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>Item Short Description</td><td style="height:20px"><textarea class="form-control" cols="57" rows="3" name="item_short_description" placeholder="Enter Short Description" size="60"><?php echo $item_short_description; ?></textarea></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                               
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Item Catagory</td>
                                    <td style="height:20px">                
                                        <select class="form-control" name="item_catagory_id" id="cat">
                                        <option>Select a Catagory</option>
                                            <?php
                                                $all_category=$this->db->select('catagory_id,catagory_name')->get('indi_catagories')->result();

                                                // var_dump($all_category);
                                                 // form_dropdown('shirts', $options, 'large')
                                                foreach($all_category as $key){
                                                    if($key->catagory_id==$item_catagory_id):?>
                                                        <option value="<?php echo $key->catagory_id; ?>" selected> <?php echo $key->catagory_name;?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo $key->catagory_id; ?>"> <?php echo $key->catagory_name;?></option>
                                                    <?php endif; ?>
                                            <?php } ?>
                                    </select>
                                        </select>  
                                    </td>
                                </tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td width="150">Item Price</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Item Price" value="<?php echo $price; ?>" name="price" size="60"/></td></tr>       
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Item Long Description</td><td style="height:20px"><textarea class="form-control" cols="57" rows="7" name="item_long_description" placeholder="Enter Long Description" size="60"><?php echo $item_long_description; ?></textarea></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Item Ingredient</td><td style="height:20px"><textarea class="form-control" cols="57" rows="4" name="item_indegrediant" placeholder="Enter Ingredient" size="60"><?php echo $item_indegrediant; ?></textarea></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>

                                <tr><td>Youtube Video URL</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Video URL" value="<?php echo $item_video_url; ?>" name="item_video_url" size="60"/></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>Page Title</td><td style="height:20px"><textarea class="form-control" cols="57" rows="3" name="item_page_title" placeholder="Enter Page Title" size="60"><?php echo $item_page_title; ?></textarea></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>Item Meta Description</td><td style="height:20px"><textarea class="form-control" cols="57" rows="3" name="item_meta_description" placeholder="Enter Meta Description" size="60"><?php echo $item_meta_description; ?></textarea></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>Item Meta Keyword</td><td style="height:20px"><textarea class="form-control" cols="57" rows="3" name="item_meta_keyword" placeholder="Enter Meta Keyword" size="60"><?php echo $item_meta_keyword; ?></textarea></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>Item Cooking Method</td><td style="height:20px"><textarea class="form-control" cols="57" rows="3" name="item_cooking_method" placeholder="Enter Cooking Method" size="60"><?php echo $item_cooking_method; ?></textarea></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                               
                                <tr><td>Preparation Time(Minite)</td><td style="height:20px"><input class="form-control" type="number" placeholder="Enter Preparation Time" value="<?php echo $preparation_time; ?>" name="preparation_time" size="60"/></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>Cooking Time(Minite)</td><td style="height:20px"><input class="form-control" type="number" placeholder="Enter Cooking Time" value="<?php echo $cooking_time; ?>" name="cooking_time" size="60"/></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>

                                <tr><td>Item Status (1=Enabled, 0=Disabled)</td><td style="height:20px"><input class="form-control" type="number" placeholder="Enter Item Status" value="<?php echo $item_status; ?>" name="item_status" size="60"/></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                
                                <tr><td>Item Rating</td><td style="height:20px"><input class="form-control" type="number" placeholder="Enter Item Rating" value="<?php echo $item_rating; ?>" name="item_rating" size="60"/></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Serves</td><td style="height:20px"><input class="form-control" type="text" placeholder="Serves" value="<?php echo $serves; ?>" name="serves" size="60"/></td></tr>  <br>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Allergy</td>
                                    <td style="height:20px">
                                        <?php 
                                        //print_r($allergyItem);


                                          $allergyId=explode(',', $allergy);  

                                          //print_r($allergyItem); 


                                            if($allergyItem):
                                                $i=1;
                                                foreach ($allergyItem as $key => $value):
                                                    ?>
                                                        <label for="<?php echo $i; ?>">
                                                            <input id="<?php echo $i; ?>" <?php if (in_array($value['id'], $allergyId)){ ?> checked <?php } ?> type="checkbox" name="allergy[]" value="<?php echo $value['id']; ?>" />
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
                                
                                <tr><td style="height:20px" align="center" colspan="2"><input class="btn btn-lg btn-success" type="submit" value="Edit Menu"/></td></tr>
                            </table>
                            <?php echo form_close(); ?>
                        <?php echo validation_errors(); ?>
                    </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
</div>  
    <!--all code here -->
    <!--here is end changable content -->
    </div>
</div>
