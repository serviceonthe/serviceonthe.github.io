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
                    <h1 class="page-header">All Reservation Statements</h1> 
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
                                             <b>Restaurant Name 1</b> <input type="text" name="r_name" value="" class="text_box"/>
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
                                            <th>SL No</th>
                                            <th>Restaurant Name</th>     

                                        
                                            <th>View Reservation</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                   <?php if(count($order_statement) > 0  ) {  
                                        
                                        
                                        $id=1;
                                        
                                    foreach($order_statement as $key){?>
                                        <tr>
                                            <td><?php echo $id; $id++; ?></td>        
                                             <td><a href="<?php echo site_url('admin/dashboard/restaurant_reservation_statement/'.$key['restaurant_id']);?>"><?php echo $key['res_name'];?></a></td>    
                                        
                                            
                                            <td>
                                            <a href="<?php echo base_url()?>user/order_view/<?php echo $key['restaurant_id'];?>/<?php echo $key['restaurant_id'];?>">View</a>   
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

<?php
	$this->load->view('admin/footer');
?>

