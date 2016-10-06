                                                       
<div class="template-page-wrapper">
	<div class="templatemo-content">
            <legend class="scheduler-border">Order Status</legend>
            <a href="<?php echo site_url('admin/tele_operator_dashboard/order_status_filter?status=1');?>"><button type="button" class="btn btn-success">Pending Confirmed >></button></a>
            <a href="<?php echo site_url('admin/tele_operator_dashboard/order_status_filter?status=2');?>"><button type="button" class="btn btn-success">Confirmed Order >></button></a>
            <a href="<?php echo site_url('admin/tele_operator_dashboard/order_status_filter?status=3');?>"><button type="button" class="btn btn-success">Cancell With Refund >></button></a>
            <a href="<?php echo site_url('admin/tele_operator_dashboard/order_status_filter?status=4');?>"><button type="button" class="btn btn-success">Cancelled Without Refund >></button></a>
            &nbsp;
            <legend class="scheduler-border">Call Status</legend>
            <a href="<?php echo site_url('admin/tele_operator_dashboard/call_status_filter?status=1');?>"><button type="button" class="btn btn-success">Pending >></button></a>
            <a href="<?php echo site_url('admin/tele_operator_dashboard/call_status_filter?status=2');?>"><button type="button" class="btn btn-success">Call In Progress >></button></a>
            <a href="<?php echo site_url('admin/tele_operator_dashboard/call_status_filter?status=3');?>"><button type="button" class="btn btn-success">Call Completed With Answer >></button></a>
            <a href="<?php echo site_url('admin/tele_operator_dashboard/call_status_filter?status=4');?>"><button type="button" class="btn btn-success">Call Completed With No Answer >></button></a>
    <!--here is start changable content -->
	<!--all code here -->
        <div id="page-wrapper">
            <div id="message"></div>
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Order List</h1>
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
                                            <th>Restaurant Name</th>   
                                            <th>Restaurant Contuct</th>  
                                            <th>Customer Name</th>
                                            <th>Order Type</th>
                                            <th>Total Price</th>
                                            <th>Order Status</th>
                                            <th>Call Status</th>
                                            <th>Call Notes</th>
                                            <th>View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                   <?php if(count($order) > 0  ) { ?>
                                        
                                   <?php foreach($order as $key){?>
                                        <tr>
                                            <td><?php echo $key['order_id'];?></td>
                                             <td><?php echo $key['res_name'];?></a></td>    
                                             <td><?php echo $key['res_telephone1'].'</br>'. $key['res_telephone1'];?></td> 
                                             <td><?php echo $customer_name= $key['first_name']." ".$key['last_name']?></a></td>    
                                            <td><?php echo $key['order_type'];?></td>
                                            <td><?php echo $key['total_price'].'<b> £</b>';?></td>
                                            <td>
                                                <?php echo form_open('admin/tele_operator_dashboard/order_status_update/'.$key['order_id']);?>
                                                <select name="order_status" id="select" class="form-control">
                                                    <?php 
                                                        if($key['is_paid']==0){
                                                            echo '<option value="">Please select order status</option>';
                                                            echo '<option value="1">Pending Confirmed</option>';
                                                            echo '<option value="2">Confirmed Order</option>';
                                                            echo '<option value="3">Cancell With Refund</option>';
                                                            echo '<option value="4">Cancelled Without Refund</option>';
                                                        }
                                                        if($key['is_paid']==1){
                                                            echo '<option value="1">Pending Confirmed</option>';
                                                            echo '<option value="2">Confirmed Order</option>';
                                                            echo '<option value="3">Cancell With Refund</option>';
                                                            echo '<option value="4">Cancelled Without Refund</option>';
                                                        }
                                                        if($key['is_paid']==2){
                                                            echo '<option value="2">Confirmed Order</option>';
                                                            echo '<option value="1">Pending Confirmed</option>';
                                                            echo '<option value="3">Cancell With Refund</option>';
                                                            echo '<option value="4">Cancelled Without Refund</option>';
                                                        }
                                                        if($key['is_paid']==3){
                                                            echo '<option value="3">Cancell With Refund</option>';
                                                            echo '<option value="2">Confirmed Order</option>';
                                                            echo '<option value="1">Pending Confirmed</option>';
                                                            echo '<option value="4">Cancelled Without Refund</option>';
                                                        }
                                                        if($key['is_paid']==4){
                                                            echo '<option value="4">Cancelled Without Refund</option>';
                                                            echo '<option value="3">Cancell With Refund</option>';
                                                            echo '<option value="2">Confirmed Order</option>';
                                                            echo '<option value="1">Pending Confirmed</option>';
                                                        }
                                                    ?>
                                                    
                                                </select> 
                                                <input type="submit" name="order_status_update" value="Update Order Status"/>
                                                <?php echo form_close();?>
                                            </td>
                                            <td>
                                                <?php echo form_open('admin/tele_operator_dashboard/call_status_update/'.$key['order_id']);?>
                                                <select name="call_status" id="select" class="form-control">
                                                    <?php 
                                                        if($key['call_status']==0){
                                                            echo '<option value="0">Please select call status</option>';
                                                            echo '<option value="1">Pending</option>';
                                                            echo '<option value="2">Call in progress</option>';
                                                            echo '<option value="3">Call completed with Answer</option>';
                                                            echo '<option value="4">Call completed with No answer</option>';
                                                        }
                                                        if($key['call_status']==1){
                                                            echo '<option value="1">Pending</option>';
                                                            echo '<option value="2">Call in progress</option>';
                                                            echo '<option value="3">Call completed with Answer</option>';
                                                            echo '<option value="4">Call completed with No answer</option>';
                                                        }
                                                        if($key['call_status']==2){
                                                            echo '<option value="2">Call in progress</option>';
                                                            echo '<option value="1">Pending</option>';
                                                            echo '<option value="3">Call completed with Answer</option>';
                                                            echo '<option value="4">Call completed with No answer</option>';
                                                        }
                                                        if($key['call_status']==3){
                                                            echo '<option value="3">Call completed with Answer</option>';
                                                            echo '<option value="1">Pending</option>';
                                                            echo '<option value="2">Call in progress</option>';
                                                            echo '<option value="4">Call completed with No answer</option>';
                                                        }
                                                        if($key['call_status']==4){
                                                            echo '<option value="4">Call completed with No answer</option>';
                                                            echo '<option value="1">Pending</option>';
                                                            echo '<option value="2">Call in progress</option>';
                                                            echo '<option value="3">Call completed with Answer</option>';
                                                        }
                                                    ?>
                                                </select>
                                                <input type="submit" name="call_status_update" value="Update Call Status"/>
                                                <?php echo form_close();?>
                                            </td> 
                                            <td>
                                                <?php echo form_open('admin/tele_operator_dashboard/call_notes_update/'.$key['order_id']);?>
                                                <textarea name="call_notes"  value="" size=""><?php echo $key['call_notes']?></textarea>
                                                <input type="submit" name="call_notes_update" value="Update Call Notes"/>
                                                <?php echo form_close();?>
                                            </td> 
                                            <td>
                                                <a href="<?php echo site_url('admin/tele_operator_dashboard/order_details/'.$key['res_id'].'/'.$key['order_id'].'/'.$key['customer_id'])?>">View</a>   
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

