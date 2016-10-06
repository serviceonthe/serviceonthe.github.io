
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
            <h1 class="page-header">Add Sub Item</h1>
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
                       <?php echo form_open_multipart('admin/food/add_sub_menu_item');?>                           
                                                                            
                            <table cellpadding="20" class="table-hover">
                                <tr>
                                    <td>Parent Item <span style="color:red;">*</span></td>
                                    <td>
                                        <select class="form-control" name="parent_item_id">
                                        <?php foreach ($main_items as $key => $value){ ?>
                                            <option value="<?php echo $value['item_id']; ?>"><?php echo $value['item_name']; ?></option>
                                        <?php } ?>    
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td width="150">Item Name <span style="color:red;">*</span></td><td style="height:20px"><input class="form-control" required type="text" placeholder="Enter Item Name" value="<?php echo set_value('item_name'); ?>" name="item_name" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td width="150">Item Price <span style="color:red;">*</span></td><td style="height:20px"><input class="form-control" required type="text" placeholder="Enter Item Price" value="<?php echo set_value('price'); ?>" name="price" size="60"/></td></tr>       
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
                                <tr><td style="height:20px" align="left" colspan="2"><input class="btn btn-lg btn-success" type="submit" value="Add Item"/></td></tr>          
                            </table>
                        
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
</div>
</div>
</div>
