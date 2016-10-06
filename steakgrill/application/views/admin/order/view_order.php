<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
	<!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
				
          	<div class="form-panel">
				<h3 class="panel-title"><i class="fa fa-plus-circle"></i> Order Details</h3>
          	</div>
			
			<div class="form-panel">
			
    <?php
        if($this->session->flashdata('success') || $this->session->flashdata('danger')){
    ?>    
        <div class="alert alert-<?php echo ($this->session->flashdata('success'))?'success':'danger';?> alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <?php echo ($this->session->flashdata('success'))?$this->session->flashdata('success'):$this->session->flashdata('danger');?>
        </div>   
    <?php
    }
    ?>

            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                        <h4><b>Order Information:</b></h4>
                            <table class="table table-striped table-bordered table-hover" id="myTable1">

                                    <tbody> 
                                        <tr>
                                            <th>Order Id</th>
                                            <td><?php echo $order_details['order_id'];?></td> 
                                        </tr>
                                        <tr>
                                            <th>Order Type</th>
                                            <td><?php echo $order_details['order_type'];?></td> 
                                        </tr> 
                                         <tr>
                                            <th>Order Date</th>
                                            <td><?php echo $order_details['order_date'];?></td> 
                                        </tr> 
                                         <tr>
                                            <th>Delivery Date</th>
                                            <td><?php echo $order_details['delivery_date'];?></td> 
                                        </tr> 
                                         <tr>
                                            <th>Payment Status</th>
                                            <td><?php echo $order_details['payment_status'];?></td> 
                                        </tr>  
                                    </tbody>       
                            </table></div>
                        <div class="col-md-6">
                                      <h4><b>User Information:</b></h4>
                            <table class="table table-striped table-bordered table-hover" id="myTable1">
                                     <tbody> 
                                        <tr>
                                            <th>First Name</th>
                                            <td><?php echo $order_details['first_name'];?></td> 
                                        </tr>
                                         <tr>
                                            <th>Last Name</th>
                                            <td><?php echo $order_details['last_name'];?></td> 
                                        </tr> 
                                         <tr>
                                            <th>Address1</th>
                                            <td><?php echo $order_details['address_line1'];?></td> 
                                        </tr> 
                                         <tr>
                                            <th>Address</th>
                                            <td><?php echo $order_details['address_line2'];?></td> 
                                        </tr>
                                        <tr>
                                            <th>Post Code</th>
                                            <td><?php echo $order_details['post_code'];?></td> 
                                        </tr> 
                                         <tr>
                                            <th>City</th>
                                            <td><?php echo $order_details['city'];?></td> 
                                        </tr> 
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $order_details['email'];?></td> 
                                        </tr>  
                                        <tr>
                                            <th>Mobile</th>
                                            <td><?php echo $order_details['mobile'];?></td> 
                                        </tr>   
                                    </tbody>       
                            </table>
                        </div>
                    </div>
                <div>

                <h4><b>Payment Information:</b></h4>
                    <table class="table table-striped table-bordered table-hover" id="myTable1">
                            <thead>                                
                                <tr>
                                    <th>Payment Method</th>
                                    <th>Item Total</th>
                                    <th>Delivery Charge</th>
                                    <th>Subtotal</th>
                                    <th>Discount</th>
                                    <th>Total Payable</th>
                                    <th>Total Due</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <tr>
                                    <td><?php echo field_in_array('payment_method_id', $order_details['payment_method'], $payment_method, 'payment_method_name');?></td>
                                    <td><?php echo $order_details['item_price']; ?></td>  
                                    <td><?php echo $order_details['delivery_charge'];?></td> 
                                    <td><?php echo ($order_details['item_price'] +  $order_details['delivery_charge']) ;?></td> 
                                    <td><?php echo ($order_details['pin_discount'] +  $order_details['date_discount_value']) ;?></td> 
                                    <td><?php echo $order_details['total_price'];?></td>    
                                    <td><?php echo ($order_details['total_price'] - $order_details['paid_amount']);?></td>  
                                </tr>  
                            </tbody>       
                    </table>

                    
                </div>
                    
                    <div class="table-responsive">
                        <h4><b>Item Information:</b></h4>
                        <table class="table table-striped table-bordered table-hover" id="myTable1">
                            <thead>                                
                                <tr>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Item Price</th>
                                    <th>Item Total Price</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php if($order_history){?>
                                <?php foreach ($order_history as $key)
                                {?>
                                        <tr>
                                            <td><?php echo $key['item_name'];?></td>    
                                            <td><?php echo $key['item_quantity'];?></td>  
                                            <td><?php echo $key['item_price'];?></td> 
                                            <td><?php echo $key['item_total_price'];?></td> 
                                        </tr>  
                                <?php }
                                }else{ echo '<p align="center" ><b>Here is no Menu List</b></p>';} ?>
                                        
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
</section>
</section>

