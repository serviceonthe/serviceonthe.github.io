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
                    
                     
                    
                    <h1 class="page-header">Statements of Restaurant</h1>  
                     
                   
                    
                </div>
            </div>     
              
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->                                       
                        
                       <form action="" method="POST">    
                        <table cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-left: 10px; margin-bottom: 5px;">
                                <tbody>
                                    <tr>
                                         <td colspan="2" align="right" style="padding-right:10px"> 
                                             <b>Month</b>   
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
                                         <td colspan="2" align="right" style="padding-right:10px">  
                                             <b>Year</b>   
                                             <select name="year">
                                                <option value="">-Select Year-</option>
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option> 
                                              </select>
                                         </td>
                                         <td colspan="2" align="right" style="padding-right:10px">
                                             <input type="submit" value="Search" name="search" class="buttonBlue">
                                         </td>
                                    </tr> 
                                </tbody>
                        </table>
                        </form> 
                     
                        
                        <div class="panel-body">
                            <div class="table-responsive" style="overflow: scroll; height: 1000px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 10px;">
                                    <thead>                                
                                        <tr>
                                            <th>Statement Id</th>
                                            <th>Restaurant Name</th>   
                                            <th>Total Price</th> 
                                            <th>Order Commission</th>   
                                            <th>Total Person</th>
                                            <th>Reservation Commission</th>
                                            <th>Total</th>
                                            <th>View</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                   <?php if(count($statement_sum) > 0  ) { 
                                       
                                       $total=0; 
                                        $r_total=0;
                                        
                                    foreach($statement_sum as $key){      
                                        
                                    ?>
                                        <tr>
                                            <td><?php echo $key['statement_id'];?></td>     
                                            <td><a href="<?php echo site_url('admin/dashboard/restaurant_order_statement/'.$key['restaurant_id']);?>"><?php echo $key['res_name'];?></a></td>    
                                            <td><?php echo $key['TotalPrice'];?></td>   
                                              
                                            
                                            <td><?php echo $commission_form_order=$key['OrderCommission'];
                                            
                                               /* if($commission > 10){
                                                    echo $commission=10;  
                                                }  else {
                                                    echo $commission; 
                                                } 
                                                
                                                 $total += $commission;   */
                                            
                                            ?></td> 
        
                                            <td><?php echo $key['People'];?></td>
                                            <td><?php echo $commission_form_reservation=$key['ReservationCommission'];?></td>       
                                            <td><?php echo $total= $commission_form_order + $commission_form_reservation ;?></td> 
                                            
                                           <td><a href="<?php echo site_url('admin/dashboard/restaurant_order_statement/'.$key['restaurant_id']);?>">Order Statement</a> <br>
                                               <a href="<?php echo site_url('admin/dashboard/restaurant_reservation_statement/'.$key['restaurant_id']);?>">Reservation Statement</a>
                                           </td>    

                                                                                      
                                           <?php } ?>
                                        </tr>
                                        <tr> 

                                    <?php }  else { ?>  
                                            
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

<?php
	$this->load->view('admin/footer');
?>

