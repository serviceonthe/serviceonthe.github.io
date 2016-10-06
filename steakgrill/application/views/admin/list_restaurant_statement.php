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
                                             <b>Order id</b> <input type="text" name="ord_id1" value="" class="text_box"/>
                                         </td>
                                         <td colspan="2" align="right" style="padding-right:10px">
                                             <b>Customer Name</b> <input type="text" name="cus_name1" value="" class="text_box"/>
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
                                            <th>Order Id</th>
                                            <th>Customer</th>
                                            <th>Total Price</th>
                                            <th>Commission</th>
                                            <th>Order Date</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                   <?php if(count($restaurant_statement) > 0  ) { 
                                       
                                       $total=0; 
                                        $r_total=0;
                                        
                                    foreach($restaurant_statement as $key){  
                                        
                                    ?>
                                        <tr>
                                            <td><?php echo $key['order_id'];?></td>    
                                            <td><a href="<?php echo site_url('admin/dashboard/get_customer/'.$key['customer_id']);?>"><?php echo $customer_name= $key['first_name']." ".$key['last_name']?></a></td>    
                                            <td><?php echo $key['total_price'];?></td>
                                            
                                            
                                            <td><?php $total_price=$key['total_price'];
                                            
                                                $statement=($total_price * 10)/100;
                                                if($statement > 10){
                                                    echo $statement=10; 
                                                }  else {
                                                    echo $statement; 
                                                } 
                                                
                                                 $total += $statement;  
                                            
                                            ?></td>      
                                            <td><?php echo $key['submission_date'];?></td>  

                                           <?php } ?>
                                        </tr>
                                        <tr>
                                            
                                           <td><b>Total Commission:</b></td>       
                                           <td colspan="3"></td> 
                                           <td width="10%" scope="col" style="text-align:left"> $<b><?php echo number_format($total,2,'.',','); ?></b>  </td>  


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

