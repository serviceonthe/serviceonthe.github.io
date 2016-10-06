<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
        <div id="page-wrapper">
            <div id="message"></div>
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Customer Orders History</h1>   
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
                                            <th>Order Id</th>
                                            <th>Order Type</th>
                                            <th>Total Price</th>
                                            <th>Order Date</th>
                                            <th>Delivery Date</th>
                                            <th>View Order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php foreach($order_history as $key){?> 
                                        <tr>
                                            <td><?php echo $key['order_id'];?></td>
                                            <td><?php echo $key['order_type'];?></td>
                                            <td><?php echo $key['total_price'];?></td>
                                            <td><?php echo $key['order_date'];?></td> 
                                            <td><?php echo $key['delivery_date'];?></td>  
                                            <td>
                                            <a href="<?php echo base_url()?>admin/dashboard/viewOrder/<?php echo $key['order_id'];?>"><button type="button" class="btn btn-success">View</button></a>   
                                            </td>   
                                             
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