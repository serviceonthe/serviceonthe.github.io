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
        <a href="<?php echo base_url();?>/index.php/admin/data_operator_restaurent/restaurent_menu_setting"><button type="button" class="btn btn-success">Indian Menus Selection</button></a>
        <a href="<?php echo base_url();?>/index.php/admin/data_operator_restaurent/view_signature_item"><button type="button" class="btn btn-success">view Signature Item</button></a>
<?php extract($edit_fetch);?>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Signature Item  "<?php echo $this->session->userdata('res_name');?>"</h1>
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
                            <?php echo form_open('admin/data_operator_restaurent/signature_item_update'); ?>
                            <table cellpadding="20" class="table-hover">
                                <tr><td width="150">Item Name</td><td style="height:20px"><input class="form-control" type="text" name="item_name" placeholder="Enter Item Name" value="<?php echo $item_name; ?>"  size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Item Short Description</td><td style="height:20px"><textarea class="form-control" cols="57" rows="3" name="item_short_description" placeholder="Enter Short Description" size="60"><?php echo $item_short_description; ?></textarea></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Alergy Notice</td><td style="height:20px"><input class="form-control" type="text" name="alergy_notice"  placeholder="Enter Alergy Notice" value="<?php echo $alergy_notice; ?>" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Item Price</td><td style="height:20px"><input class="form-control" type="text" name="item_price"  placeholder="Enter Item Price" value="<?php echo $item_price; ?>" size="60"/></td></tr>
                                <tr>
                                    <td><input type="hidden" name="res_id" value="<?php echo $this->session->userdata('last_insert_id');?>" /></td>
                                    <td><input type="hidden" name="res_name" value="<?php echo $this->session->userdata('res_name');?>" /></td>
                                    <td><input type="hidden" name="res_cuisine_type" value="<?php echo $this->session->userdata('res_cuisine_type');?>" /></td>
                                </tr>
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