<?php
	$this->load->view('admin/header_link');
	$this->load->view('admin/header');
	$this->load->view('admin/menu');

?>
<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
    		<a href="<?php echo base_url();?>/index.php/admin/restaurent/signature_item"><button type="button" class="btn btn-success">Add Signature Item</button></a>


            <div id="page-wrapper">
            <div id="message"></div>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menus Selection for "<?php echo $this->session->userdata('res_name');?>"</h1>
                </div>
            </div>    
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
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
                                    <?php echo form_open('admin/restaurent/restaurent_menu_setting_complate');?>
                                    <?php foreach($results as $key){ ?>
                                   		 <td><input type="checkbox"><input type="hidden" class="form-control" size="12" name="menu_restaurent_relation_menu_id[]" value="<?php echo $key['item_id'];?>"/></td>
                                         <!--<td width="20"><input type="checkbox" name="check" value="<?php //echo $key['item_id'];?>"/></td>    -->
                                        <td><?php echo $key['item_name'];?></td>
                                        <td><?php echo $key['catagory_name'];?></td>
                                        <td><input type="text" class="form-control" size="12" name="menu_restaurant_relation_price[]" placeholder="Item Price" value=""/></td>
                                          </tr> 
                                  <?php } ?>
                                    <td><input type="hidden" name="res_id" value="<?php echo $this->session->userdata('last_insert_id');?>" /></td>
                                </tbody>       
                            </table>
                            </fieldset>
      <table cellpadding="">
        <tr><td align="center"><input type="submit" name="add_restaurent_feature_info"  class="btn btn-lg btn-danger" value="Menus Selection Complate>>"/></td></tr>
<br/>
<?php echo form_close();?> 
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

      
            <!--all code here -->
            <!--here is end changable content -->
            </div>
        </div>

<?php
	$this->load->view('admin/footer');
?>