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
            <a href="<?php echo base_url();?>/index.php/admin/data_operator_food/fatch_cuisine_item"><button type="button" class="btn btn-success">Cuisine Item</button></a>
            <a href="<?php echo base_url();?>/index.php/admin/data_operator_food/fatch_indi_item"><button type="button" class="btn btn-success">Indian Item</button></a>
            <a href="<?php echo base_url();?>/index.php/admin/data_operator_food/fatch_signature_item"><button type="button" class="btn btn-success">Signature Item</button></a>
            <div id="page-wrapper">
                <div id="message"></div>

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cuisine Item Details</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 10px;">
                                        <thead>
                                        <tr>
                                            <th>Cuisine Ttem Category</th>
                                            <th>Cuisine Item Name</th>
                                            <th>cuisine_item_short_discription</th>
                                            <th>cuisine_item_price</th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($all_cuisine_item as $key){?>
                                        <tr>
                                            <td><?php echo $key['cuisine_item_category'];?></a></td>
                                            <td><?php echo $key['cuisine_item_name'];?></td>
                                            <td><?php echo $key['cuisine_item_short_discription'];?></td>
                                            <td><?php echo $key['cuisine_item_price'];?></td>
                                           
                                            <?php } ?>
                                            <!-- <a href=<?php //echo site_url('user/edit_restaurant/'.$restaurant->res_id);?>>Edit</a> &nbsp; -->

                                        </tr>

                                        </tbody>
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