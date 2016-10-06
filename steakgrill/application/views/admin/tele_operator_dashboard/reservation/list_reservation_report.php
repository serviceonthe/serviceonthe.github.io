
<div class="template-page-wrapper">
	<div class="templatemo-content">
           
    <!--here is start changable content -->
	<!--all code here -->
        <div id="page-wrapper">
            <div id="message"></div>
            
            <div class="row">
                <div class="col-lg-12">
                    <legend class="scheduler-border">Reservation Report Count</legend>
                    <button type="button" class="btn btn-success">Total Data >> <?php echo count($reservation); ?></button>
                    <button type="button" class="btn btn-success">Pending >> 0</button>
                    <button type="button" class="btn btn-success">Call In Progress >> 0</button>
                    <button type="button" class="btn btn-success">Call Completed With Answer >> 0</button>
                    <button type="button" class="btn btn-success">Call Completed With No Answer >> 0</button>
            
                  <h1 class="page-header">Reservations Report By Date To Date Search</h1>
                   <?php echo form_open('admin/tele_operator_dashboard/list_reservation_report');?>
                   <!-- <form action="" method="POST">    -->
                        <table cellspacing="0" cellpadding="0" border="0" width="30%" style="margin-left: 10px; margin-bottom: 5px;">
                                <tbody>
                                    <tr>
                                        <td><b>FROM</b></td>
                                        <td> 
                                            
                                             <select name="day">
                                                <option value="">-Select Day-</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option> 
                                                <option value="11">11</option> 
                                                <option value="12">12</option> 
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option> 
                                                <option value="23">23</option> 
                                                <option value="24">24</option> 
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option> 
                                                
                                              </select>
                                         </td>
                                        <td> 
                                              
                                             <select name="month">
                                                <option value="">-Select Month-</option>
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                 <option value="10">October</option> 
                                                <option value="11">November</option> 
                                                <option value="12">December</option> 
                                              </select>
                                         </td>
                                         <td >  
                                             
                                             <select name="year">
                                                <option value="">-Select Year-</option>
                                                <option value="14">2014</option>
                                                <option value="15">2015</option>
                                                <option value="16">2016</option> 
                                                <option value="17">2017</option>
                                                <option value="18">2018</option> 
                                                <option value="19">2019</option>
                                                <option value="20">2020</option> 
                                              </select>
                                             
                                         </td>
                                         <td>&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td><b>TO</b></td>
                                         <td> 
                                             
                                             <select name="day2">
                                                <option value="">-Select Day-</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option> 
                                                <option value="11">11</option> 
                                                <option value="12">12</option> 
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option> 
                                                <option value="23">23</option> 
                                                <option value="24">24</option> 
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option> 
                                                
                                              </select>
                                         </td>
                                        <td> 
                                              
                                             <select name="month2">
                                                <option value="">-Select Month-</option>
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                 <option value="10">October</option> 
                                                <option value="11">November</option> 
                                                <option value="12">December</option> 
                                              </select>
                                         </td>
                                         <td >  
                                             
                                             <select name="year2">
                                                <option value="">-Select Year-</option>
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option> 
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option> 
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option> 
                                              </select>
                                             
                                         </td>
                                         <td>&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td><input type="submit" name="date" value="Filter"/> </td>
                                    </tr> 
                                </tbody>
                        </table>
                      <?php echo form_close();?>
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
                                            <th>Reservation Id</th>   
                                            <th>Restaurant Name</th>
                                            <th>Customer Name</th>
                                            <th>Restaurant Address</th>
                                            <th>Reservation type</th>
                                            <th>Number of Guest</th>
                                            <th>Reservation Status</th>
                                            <th>Call Status</th>
                                            <th>Call Notes</th>
                                            <th>View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php if(count($reservation) > 0  ) { ?>    
                                        
                                   <?php foreach($reservation as $key){?>  
                                        <tr>
                                            <td><?php echo $key['reservation_id'];?></td>  
                                            <td><?php echo $key['res_name'];?></td>
                                            <td><?php echo $customer_name= $key['first_name']." ".$key['last_name']?></td>    
                                            <td><?php echo $key['res_address'];?></td>
                                            <td>
						<?php if($key['reservation_type']==1){
						         echo "Lunch";
						      }else{
							 echo "Dinner"; 
						}?>
                                            </td>    
                                            <td><?php echo $key['people'];?></td>
                                            <td>
                                                <?php echo form_open('admin/tele_operator_dashboard/reservation_order_status_update/'.$key['reservation_id']);?>
                                                <select name="reservation_status" id="select" class="form-control">
                                                    <?php 
                                                        if($key['reservation_status']==0){
                                                            echo '<option value="">Please select reservation status</option>';
                                                            
                                                        }
                                                        if($key['reservation_status']==1){
                                                            echo '<option value="1">Pending Confirmed</option>';
                                                           
                                                        }
                                                        if($key['reservation_status']==2){
                                                            echo '<option value="2">Confirmed Reservation</option>';
                                                           
                                                        }
                                                        if($key['reservation_status']==3){
                                                            echo '<option value="3">Cancell With Refund</option>';
                                                            
                                                        }
                                                        if($key['reservation_status']==4){
                                                            echo '<option value="4">Cancelled Without Refund</option>';
                                                          
                                                        }
                                                        
                                                        
                                                    ?>
                                                    
                                                </select> 
                                               
                                                <?php echo form_close();?>
                                            </td>
                                            <td>
                                                <?php echo form_open('admin/tele_operator_dashboard/reservation_call_status_update/'.$key['reservation_id']);?>
                                                <select name="call_status" id="select" class="form-control">
                                                    <?php 
                                                        if($key['call_status']==0){
                                                            echo '<option value="0">Please select call status</option>';
                                                         
                                                        }
                                                        if($key['call_status']==1){
                                                            echo '<option value="1">Pending</option>';
                                                      }
                                                        if($key['call_status']==2){
                                                            echo '<option value="2">Call in progress</option>';
                                                    }
                                                        if($key['call_status']==3){
                                                            echo '<option value="3">Call completed with Answer</option>';
                                                    }
                                                        if($key['call_status']==4){
                                                            echo '<option value="4">Call completed with No answer</option>';
                                                     }
                                                     
                                                    ?>
                                                </select>
                                               
                                                <?php echo form_close();?>
                                            </td> 
                                            <td>
                                                <?php echo form_open('admin/tele_operator_dashboard/reservation_call_notes_update/'.$key['reservation_id']);?>
                                                <textarea name="call_notes" readonly="readonly"  value="" size=""><?php echo $key['call_notes']?></textarea>
                                               
                                                <?php echo form_close();?>
                                            </td> 
                                            
                                             <td>
                                                <a href="<?php echo site_url('admin/tele_operator_dashboard/reservation_details/'.$key['res_id'].'/'.$key['reservation_id'].'/'.$key['customer_id'])?>">View</a>   
                                            </td>
                                            
                                            <?php } ?>
                                            <?php } else { ?>
                                            
                                                 <td colspan="10" align="center">
                                                    <h3>No Data Found</h3>   
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
