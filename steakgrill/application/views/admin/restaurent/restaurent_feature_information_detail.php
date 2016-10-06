<?php
	$this->load->view('admin/header_link');
	$this->load->view('admin/header');
	$this->load->view('admin/menu');

?>
<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
        <div id="page-wrapper">
            <div id="message"></div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Restaurants Feature Information Detail</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive" style="overflow: scroll; height: 1000px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 10px;">
                                    <thead>
                                    <tr>
                                        <th>res_name</th>
                                        <th>res_cuisine_type</th>
                                        <th>car_parking</th>
                                        <th>air</th>
                                        <th>access</th>
                                        <th>live_music</th>
                                        <th>bar</th>
                                        <th>event</th>
                                        <th>romantic_dinner</th>
                                        <th>smoking</th>
                                        <th>party_booking</th>
                                        <th>service</th>
                                        <th>atmosphere</th>
                                        <th>buffet</th>
                                        <th>day_buffet</th>
                                        <th>olive_oil</th>
                                        <th>notice</th>
                                        <th>breakfast</th>
                                        <th>lunch</th>
                                        <th>dinner</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($all_feature_info as $key){?>
                                    <tr>
                                        <td><?php echo $key['res_name'];?></td>
                                        <td><?php echo $key['res_cuisine_type'];?></td>
                                        <td><?php echo $key['car_parking'];?></td>
                                        <td><?php echo $key['air'];?></td>
                                        <td><?php echo $key['access'];?></td>
                                        <td><?php echo $key['live_music'];?></td>
                                        <td><?php echo $key['bar'];?></td>
                                        <td><?php echo $key['event'];?></td>
                                        <td><?php echo $key['romantic_dinner'];?></td>
                                        <td><?php echo $key['smoking'];?></td>
                                        <td><?php echo $key['party_booking'];?></td>
                                        <td><?php echo $key['service'];?></td>
                                        <td><?php echo $key['atmosphere'];?></td>
                                        <td><?php echo $key['buffet'];?></td>
                                        <td><?php echo $key['day_buffet'];?></td>
                                        <td><?php echo $key['olive_oil'];?></td>
                                        <td><?php echo $key['notice'];?></td>
                                        <td><?php echo $key['breakfast'];?></td>
                                        <td><?php echo $key['lunch'];?></td>
                                        <td><?php echo $key['dinner'];?></td>
                                        <td><a href="">Edit</a> &nbsp; <a href="">Delete</a></td>
                                        <?php } ?>
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
	$this->load->view('admin/footer');
?>