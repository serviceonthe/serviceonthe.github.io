<?php
$this->load->view('admin/data_operator_dashboard/header_link');
$this->load->view('admin/data_operator_dashboard/header');
$this->load->view('admin/data_operator_dashboard/menu');

?>
<style type="text/css">
    /*placeholder{color:#096;}
    */
</style>
<?php extract($edit_fetch);?>
<div class="template-page-wrapper">
    <div class="templatemo-content">
        <!--here is start changable content -->
        <!--all code here -->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Signature Item</h1>
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
                            <?php echo form_open('admin/data_operator_food/signature_item_update'); ?>
                            <input type="hidden" name="restaurant_id" value=""/>

                            <table cellpadding="20" class="table-hover">
                                <tr><td width="150">Item Name</td><td style="height:20px"><input class="form-control" type="text" name="item_name" placeholder="Enter Item Name" value="<?php echo $item_name; ?>"  size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>

                                <tr><td>Item Short Description</td><td style="height:20px"><textarea class="form-control" cols="57" rows="3" name="item_short_description" placeholder="Enter Short Description" value="<?php echo $item_short_description; ?>" size="60"><?php echo $item_short_description; ?></textarea></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Alergy Notice</td><td style="height:20px"><input class="form-control" type="text" name="alergy_notice"  placeholder="Enter Alergy Notice" value="<?php echo $alergy_notice; ?>" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Item Price</td><td style="height:20px"><input class="form-control" type="text" name="item_price"  placeholder="Enter Item Price" value="<?php echo $item_price; ?>" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Item Catagory</td>
                                    <td style="height:20px">
                                        <select class="form-control" name="catagory_id" id="cat">
                                            <option>Select a Catagory</option>
                                            <?php
                                                $all_category=$this->db->select('catagory_id,catagory_name')->get('indi_catagories')->result();
                                                foreach($all_category as $key){?>
                                                    <option value="<?php echo $key->catagory_id; ?>"> <?php echo $key->catagory_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>


                                <tr>
                                    <td colspan="2" align="center">
                                        <div id="one_file"></div>
                                    </td>
                                </tr>
                                <tr><td></td><td>(Please use image size between height = 500px, width = 300px & size = 500KB)</td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr>
                                    <td>Upload Main Image</td>
                                    <td style="height:20px" id="upload_input">
                                        <input type="file" name="item_photo" id="item_photo_uload" size="60" />
                                    </td>
                                </tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>

                                <input type="hidden" name="file_upload" id="upload_file"/>

                                <tr><input type="hidden"  name="signature_item_id" value="<?php echo $signature_item_id; ?>"></tr>

                                <tr><td style="height:20px" align="center" colspan="2"><input class="btn btn-lg btn-success" type="submit" value="Edit Signature Item"/></td></tr>
                            </table>
                            <?php echo form_close();?>
                            <?php echo validation_errors();?>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>

<?php
$this->load->view('admin/data_operator_dashboard/footer');
?>