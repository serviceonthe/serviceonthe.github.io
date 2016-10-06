<?php
	$this->load->view('admin/data_operator_dashboard/header_link');
	$this->load->view('admin/data_operator_dashboard/header');
	$this->load->view('admin/data_operator_dashboard/menu');

?>


<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
        <div id="page-wrapper">
            <div id="message"></div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Menu Price</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div id="txtHint">
                                    <!--text hint start -->
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 10px;">
                                        <thead>
                                        <tr>
                                            <th>Check</th>
                                            <th>Item Name</th>
                                            <th>Item Catagory</th>
                                            <th>Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php echo form_open('');?>
                                        <?php foreach($edit_fetch as $key){ ?>
                                            <tr>
                                            <td width="50px"><input type="checkbox"><input type="hidden" class="form-control" size="12" name="menu_restaurent_relation_menu_id[]" value="<?php echo $key['item_id'];?>"/></td>
                                            <!--<td width="20"><input type="checkbox" name="check" value="<?php //echo $key['item_id'];?>"/></td>    -->
                                            <td width="200px"><?php echo $key['item_name'];?></td>
                                            <td width="300px"><?php echo $key['catagory_name'];?></td>
                                            <td width="100px"><input type="text"  size="30" name="menu_restaurant_relation_price[]" placeholder="Item Price" value="<?php echo $key['menu_restaurant_relation_price'];?>"/></td>
                                            </tr>
                                        <?php } ?>
                                        <td><input type="hidden" name="res_id" value="<?php echo $this->session->userdata('last_insert_id');?>" /></td>
                                        </tbody>
                                    </table>
                                    </fieldset>
                                    <table cellpadding="">
                                        <tr>
                                            <td><input type="submit" name="restaurent_menu_setting"  class="btn btn-lg btn-danger" value="Update Menu"/></td>
                                            <td width="650px">&nbsp;</td>
                                        </tr>
                                        <br/>
                                        <?php echo form_close();?>
                                    </table>
                                </div>
                                <!--text hint end -->
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


<?php
	$this->load->view('admin/data_operator_dashboard/footer');
?>