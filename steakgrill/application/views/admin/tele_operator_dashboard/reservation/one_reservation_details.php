                                                       
<div class="template-page-wrapper">
	<div class="templatemo-content">
            
    <!--here is start changable content -->
	<!--all code here -->
        <div id="page-wrapper">
            <div id="message"></div>
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">One Order Details</h1>
                </div>
            </div>    
              
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->                                       
                        
                       <form action="" method="POST">
                       
                        </form> 
                   <?php //print_r($order); exit;?>
                       
                        <div class="panel-body">
                            <div style="width: 45%; height: 30%; float: left;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                   <h2><u> Restaurant Details</u></h2>
                                    <tr style="border:1px;">
                                        <td><b>Name</b></td>
                                        <td><?php echo $order[0]['res_name'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Owner</b></td>
                                        <td><?php echo $order[0]['res_owner_name'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Postcode</b></td>
                                        <td><?php echo $order[0]['res_post_code'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Address</b></td>
                                        <td><?php echo $order[0]['res_address'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Telephone</b></td>
                                        <td><?php echo $order[0]['res_telephone1'];?></td>
                                    </tr>
                                    <tr>                                
                                        <td><b>Fax Number</b></td>
                                        <td><?php echo $order[0]['res_fax_number'];?></td>
                                    </tr>        
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td><?php echo $order[0]['res_email'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Web Address</b></td>
                                        <td><?php echo $order[0]['res_web_address'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Food Commission</b></td>
                                        <td><?php echo $order[0]['res_commission_food'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Person Commission</b></td>
                                        <td><?php echo $order[0]['res_commission_person'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Bank Name</b></td>
                                        <td><?php echo $order[0]['res_bank_name'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Bank Account Name</b></td>
                                        <td><?php echo $order[0]['res_account_name'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Bank Account Number</b></td>
                                        <td><?php echo $order[0]['res_account_number'];?></td>
                                    </tr>
                                </table>                                             
                    </div>
                            <div style="width: 45%; height: 30%; float: right;">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <h2><u>Customer Details</u></h>
                                            <tr style="border:1px;">
                                                <td><b>Name</b></td>
                                                <td><?php echo $order[0]['first_name'] . $order[0]['last_name'];?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Address 1</b></td>
                                                <td><?php echo $order[0]['address_line1'];?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Address 2</b></td>
                                                <td><?php echo $order[0]['address_line2'];?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Postcode</b></td>
                                                <td><?php echo $order[0]['post_code'];?></td>
                                            </tr>
                                            <tr>
                                                <td><b>City</b></td>
                                                <td><?php echo $order[0]['city'];?></td>
                                            </tr>       
                                            <tr>
                                                <td><b>Email</b></td>
                                                <td><?php echo $order[0]['email'];?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Phone Number</b></td>
                                                <td><?php echo $order[0]['phone'];?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Mobile Number</b></td>
                                                <td><?php echo $order[0]['mobile'];?></td>
                                            </tr>
                                        </table>                                             
                            </div>
                            
                            <div class="table-responsive" style="clear: both;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <h2><u>Reservation Details</u><h2>
                                    <tr style="border:1px;">
                                        <td><b>Reserve Submission Date $ Time</b></td>
                                        <td><?php echo $order[0]['reserve_submission_date'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Reserve Requested Date</b></td>
                                        <td><?php echo $order[0]['reserve_requested_date'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Reserve Requested Time</b></td>
                                        <td><?php echo $order[0]['r_time'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Reserve Type</b></td>
                                        <td>
                                            <?php 
                                                if($order[0]['reservation_type']==0){
                                                    echo "No Selected Type";
                                                }
                                                if($order[0]['reservation_type']==1){
                                                    echo "Family Dine out";
                                                }
                                                if($order[0]['reservation_type']==2){
                                                    echo "Corporate";
                                                }
                                                if($order[0]['reservation_type']==3){
                                                    echo "Occasional";
                                                }
                                                if($order[0]['reservation_type']==4){
                                                    echo "Friends";
                                                }
                                                if($order[0]['reservation_type']==5){
                                                    echo "Romantic";
                                                }
                                                if($order[0]['reservation_type']==6){
                                                    echo "Others";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>People</b></td>
                                        <td><?php echo $order[0]['people'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Requirements</b></td>
                                        <td><?php echo $order[0]['requirements'];?></td>
                                    </tr>
                                    
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

