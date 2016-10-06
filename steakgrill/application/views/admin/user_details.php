<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
        <div id="page-wrapper">
            <div id="message"></div>
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Customer Details</h1>
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
                    
                     <?php foreach($user_info as $key) { ?>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <tr style="border:0px;">  
                                <td><b>Name</b></td>
                                <td><?php echo $customer_name= $key['first_name']." ".$key['last_name']; ?></td>  
                            </tr>
                            <tr>
                                <td><b>Address 1</b></td>
                                <td><?php echo $key['address_line1'];?></td>
                            </tr>
                            <tr>
                                <td><b>Address 2</b></td>
                                <td><?php echo $key['address_line1'];?></td>
                            </tr>
                             <tr>
                                <td><b>Postcode</b></td>
                                <td><?php echo $key['post_code'];?></td>
                            </tr>
                            <tr>
                                <td><b>Telephone</b></td>
                                <td><?php echo $key['phone'];?></td>
                            </tr> 
                             <tr>
                                <td><b>Mobile</b></td>
                                <td><?php echo $key['mobile'];?></td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td><?php echo $key['email'];?></td>
                            </tr>
                            <tr>
                                <td><b>City</b></td>
                                <td><?php echo $key['city'];?></td> 
                            </tr>
                          
                        </table>                                             
                    </div>
                    <!-- /.table-responsive --> 
                  
                     <?php } ?>
                
                <a href="<?php echo site_url('admin/dashboard/order_history/'.$key['customer_id']);?>">Order history of this User.</a><br/>
<!--                 <a href="<?php echo site_url('admin/dashboard/reservation_history/'.$key['customer_id']);?>">Reservation history of this User.</a>                
 -->                   </div>
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
