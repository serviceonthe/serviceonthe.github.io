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

                                <?php if($this->session->flashdata('message')) { ?>
                                <div class="alert alert-success" id="mydiv">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <span><?php if($this->session->flashdata('message')) {
                                echo '<div class="message"> ';
                                echo ''.$this->session->flashdata('message').'';
                                //$this->session->keep_flashdata('message');
                                echo'</div>';
                                }?></span> 
                                </div>    
                                <script>
                                setTimeout(function() {
                                $('#mydiv').fadeOut('fast');
                                }, 2000); // <-- time in milliseconds
                                </script>

                                <?php } ?>
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
                                            <th>Payment Status</th>
                                            <th>Order Status</th>
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
                                            <?php echo form_open('admin/order/payment_status_change/' . $key['order_id']);?>
                                                    <?php $is_paid = $key['is_paid']; ?>
                                                        <select class="my_select form-control" name="is_paid">
                                                            <option value="0" style="color:#F57979;" <?php if ($is_paid == 0) { ?> selected="selected" <?php } ?> >Unpaid</option>
                                                            <option value="1" style="color:#5BC0DE;" <?php if ($is_paid == 1) { ?> selected="selected" <?php } ?> >Cash On Collection</option>
                                                            <option value="2" style="color:#ec971f;" <?php if ($is_paid == 2) { ?> selected="selected" <?php } ?> >Cash On Delivery</option>
                                                            <option value="3" style="color:#ec971f;" <?php if ($is_paid == 3) { ?> selected="selected" <?php } ?> >Paid</option>
                                                            <option value="4" style="color:#F57979;" <?php if ($is_paid == 4) { ?> selected="selected" <?php } ?> >Refund</option>
                                                        </select>
                                                    <input name="customer_email" type="hidden" value="<?php echo $key['email'];?>"/>
                                                    <input class="btn btn-warning my_btn" type="submit" value="Change"/>
                                            <?php echo form_close();?>
                                            </td>   
                                            <td>
                                            <?php echo form_open('admin/order/order_status_change/' . $key['order_id']);?>
                                                    <?php
                                                    $order_status = $key['order_status']; 
                                                        ?>
                                                        <select class="my_select form-control" name="order_status">
                                                            <option value="0" style="color:#5BC0DE;" <?php if ($order_status == 0) { ?> selected="selected" <?php } ?> >Pending</option>
                                                            <option value="1" style="color:#ec971f;" <?php if ($order_status == 1) { ?> selected="selected" <?php } ?> >Confirmed</option>
                                                            <option value="2" style="color:#ec971f;" <?php if ($order_status == 2) { ?> selected="selected" <?php } ?> >Reschedule</option>
                                                            <option value="3" style="color:#F57979;" <?php if ($order_status == 3) { ?> selected="selected" <?php } ?> >Cancelled</option>
                                                        </select>
                                                    <input name="customer_email" type="hidden" value="<?php echo $key['email'];?>"/>
                                                    <input class="btn btn-warning my_btn" type="submit" value="Change"/>
                                            <?php echo form_close();?>
                                            </td>   
                                            <td>
                                            <a href="<?php echo base_url()?>admin/dashboard/viewOrder/<?php echo $key['order_id'];?>"><button type="button" class="btn btn-success">View</button></a>   
                                            <a href="<?php echo base_url()?>admin/dashboard/orderModify/<?php echo $key['order_id'];?>"><button type="button" class="btn btn-warning">Modify</button></a>  
                                            <?php echo anchor('admin/dashboard/order_delete/'.$key['order_id'],'<button type="button" class="btn btn-danger">Delete</button>',array("onclick"=>"return confirm('Are you sure?')"));?> 
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