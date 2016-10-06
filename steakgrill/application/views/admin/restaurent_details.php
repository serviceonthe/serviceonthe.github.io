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
                    <h1 class="page-header">Restaurant Details</h1>
                </div>
            </div>    
              
            <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
<!--                            DataTables Advanced Tables-->
                </div>
                
                
                
                
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                     <?php foreach($res_info as $key) { ?>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <tr style="border:0px;">  
                                <td><b>Restaurant Name</b></td>
                                <td><?php echo $key['res_name']; ?></td>  
                            </tr>
                            <tr>
                                <td><b>Address</b></td>
                                <td><?php echo $key['res_address'];?></td>
                            </tr>
                             <tr>
                                <td><b>Postcode</b></td>
                                <td><?php echo $key['res_post_code'];?></td>
                            </tr>
                            <tr>
                                <td><b>Telephone 1</b></td>
                                <td><?php echo $key['res_telephone1'];?></td>
                            </tr>
                            <tr>
                                <td><b>Telephone 2</b></td>
                                <td><?php echo $key['res_telephone2'];?></td>
                            </tr>
                             <tr>
                                <td><b>Manager Name</b></td>
                                <td><?php echo $key['res_manager_name'];?></td>
                            </tr>
                            <tr>
                                <td><b>Restaurant Email</b></td>
                                <td><?php echo $key['res_email'];?></td> 
                            </tr>
                            <tr>
                                <td><b>Short Description</b></td>
                                <td><?php echo $key['res_short_desc'];?></td>
                            </tr>
                             <tr>
                                <td><b>Entry Date</b></td>
                                <td><?php echo $key['entry_date'];?></td>
                            </tr>
                          
                        </table>                                             
                    </div>
                    <!-- /.table-responsive --> 
                  
                     <?php } ?>
                    
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

