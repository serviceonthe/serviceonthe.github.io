<script>
    $(document).ready(function(){
        $('#myTable').dataTable();
    });
</script>

<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
        <div id="page-wrapper">
            <div id="message"></div>
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Orders</h1>
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
                                <table class="table table-striped table-bordered table-hover" id="myTable" style="font-size: 10px;">
                                    <thead>                                
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Customer</th>
                                            <th>Order Type</th>
                                            <th>Total Price</th>
                                            <th>Order Date</th>
                                            <th>Delivery Date</th>
                                            <th>Is Paid</th>
                                            <th>View Order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                   <?php if(count($order) > 0  ) { ?>  
                                        
                                   <?php foreach($order as $key){?>
                                        <tr>
                                            <td><?php echo $key['order_id'];?></td>
                                             <td><a href="<?php echo site_url('admin/dashboard/get_customer/'.$key['customer_id']);?>"><?php echo $customer_name= $key['first_name']." ".$key['last_name']?></a></td>    
                                            <td><?php echo $key['order_type'];?></td>
                                            <td><?php echo $key['total_price'];?></td>
                                            <td><?php echo $key['order_date'];?></td>
                                            <td><?php echo $key['delivery_date'];?></td>
                                            <td>
                                            <?php 
                                            if($key['is_paid']==1){ ?> 
                                                <span style="color:green;">Yes</span>  <?php
                                                } else{ ?>
                                                <span style="color:red;">No</span>
                                            <?php  } ?>
                                            </td>   
                                            <td>
                                            <a href="<?php echo base_url()?>admin/dashboard/viewOrder/<?php echo $key['order_id'];?>"><button type="button" class="btn btn-success">View</button></a>   
                                            </td> 
                                            
                                          
                                           <?php } } else { ?>
                                            
                                                 <td colspan="10" align="center">
                                                    <h3> No Data Found</h3>   
                                                 </td>
                                            
                                            <?php } ?>  
                                        </tr>
                                </tbody>      
                            </table>
                                 
                                <?php echo $this->pagination->create_links(); ?>
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