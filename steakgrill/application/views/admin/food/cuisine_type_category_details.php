
    <style type="text/css">
        /*placeholder{color:#096;}
        */
    </style>

    <div class="template-page-wrapper">
        <div class="templatemo-content">
            <!--here is start changable content -->
            <!--all code here -->
            <a href="<?php echo base_url();?>/index.php/admin/food/fatch_cuisine_type_category"><button type="button" class="btn btn-success">Cuisine Type Category Details</button></a>
            <a href="<?php echo base_url();?>/index.php/admin/food/fatch_indi_category"><button type="button" class="btn btn-success">Indian Catagories Details</button></a>

            <div id="page-wrapper">
                <div id="message"></div>

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cuisine Type Category Details</h1>
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
                                            <th>Cuisine Type Category Name</th>
                                            <th>Cuisine Type Category Short Description</th>
                                            <th>Cuisine Type Category Image</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($all_cuisine_category as $key){?>
                                        <tr>
                                            <td><a href=""><?php echo $key['cuisine_type_category_name'];?></a></td>
                                            <td><?php echo $key['cuisine_type_category_short_description'];?></td>
                                            <td><?php echo $key['cuisine_type_category_image'];?></td>
                                            <td><?php echo anchor('admin/food/cuisine_type_category_edit?d_edit='.$key['cuisine_type_id'],'Edit');?> &nbsp; <a href="">Delete</a></td>
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
