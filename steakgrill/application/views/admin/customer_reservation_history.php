
<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
        <div id="page-wrapper">
            <div id="message"></div>
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Customer Reservations Details</h1> 
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
                                            <th>Restaurant Id</th>   
                                            <th>Restaurant Name</th>
                                            <th>Restaurant Address</th>
                                            <th>Reservation type</th>
                                            <th>Number of Guest</th>
                                            <th>Dining Type</th>
                                            <th>Submission Date</th>
                                            <th>Requested Date</th>
                                            <th>View Reservation</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                   <?php foreach($reservation_history as $key){?>
                                        <tr>
                                            <td><?php echo $key['reservation_id'];?></td>  
                                            <td><a href="<?php echo site_url('admin/dashboard/get_restaurent/'.$key['res_id']);?>"><?php echo $key['res_name'];?></a></td>
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
                                            <?php

                                              if ($key['dining_type']==1) {
                                                     echo "Family";
                                                                            } 
                                              elseif ($key['dining_type']==2) {
                                                     echo "Corporate";
                                                                            }
                                              elseif ($key['dining_type']==3) { 
                                                      echo "Occasional";
                                                                            }
                                              elseif ($key['dining_type']==4) { 
                                                      echo "Friends";
                                                                            }
                                              elseif ($key['dining_type']==5) { 
                                                      echo "Romantic";
                                                                            } 								
                                              else {  
                                                    echo "Other";   
                                                                            } 					
                                               ?>
                                            </td> 
                                            <td><?php echo $key['reserve_submission_date'];?></td> 
                                            <td><?php echo $key['reserve_requested_date'];?></td>  
                                            <td> 
                                            <a href="<?php echo base_url()?>user/order_view/<?php echo $key['res_name'];?>">View</a>   
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