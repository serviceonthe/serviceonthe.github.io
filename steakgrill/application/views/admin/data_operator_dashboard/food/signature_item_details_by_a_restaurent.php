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
           <div id="page-wrapper">
                <div id="message"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Signature Item Details</h1>
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
                                            <th>Item Name</th>
                                            <th>res_cuisine_type</th>
                                            <th>Item Short Description</th>
                                            <th>alergy_notice</th>
                                            <th>Item Price</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($all_signature_item){  ?>
                                            <?php foreach($all_signature_item as $key){?>
                                                    <tr>
                                                        <td><?php echo $key['item_name'];?></a></td>
                                                        <td><?php echo $key['res_cuisine_type'];?></td>
                                                        <td><?php echo $key['item_short_description'];?></td>
                                                        <td><?php echo $key['alergy_notice'];?></td>
                                                        <td><?php echo $key['item_price'];?></td>
                                                        <td><?php echo anchor('admin/data_operator_restaurent/add_signature_item_by_a_restaurent/'.$key['res_id'],'Add Signature');?> &nbsp; <?php echo anchor('admin/data_operator_food/signature_item_edit_by_a_restaurent/'.$key['signature_item_id'],'Edit');?> &nbsp; <?php echo anchor('admin/data_operator_food/signature_item_delete_by_a_restaurent/'.$key['signature_item_id'],'Delete',array("onclick"=>"return confirm('Are you sure?')"));?></td>
                                                    </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                       <?php }else{ echo '<b>There is no "Signature Item"</b>';} ?> 
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
$this->load->view('admin/data_operator_dashboard/footer');
?>