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
                    <h1 class="page-header">All Reservation</h1>
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
                                            <th>Reservation Id</th>   
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Number of Guest</th>
                                            <th>Reservation Date</th>
                                            <th>Reservation Time</th>
                                            <th>View Reservation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                   <?php if(count($reservation) > 0  ) { ?>  
                                        
                                   <?php foreach($reservation as $key){?>
                                          <tr>
                                            <td><?php echo $key['reservation_id'];?></td>  
                                            <td><?php echo $key['title'].' '.$key['name'];?></td>     
                                            <td><?php echo $key['email'];?></td>
                                            <td><?php echo $key['mobile'];?></td>
                                            <td><?php echo $key['num_of_guest'];?></td>
                                            <td><?php echo $key['reservation_date'];?></td> 
                                            <td><?php echo $key['reservation_time'];?></td>  
                                            <td> 
                                            <a class="btn btn-success" href="<?php echo base_url()?>admin/dashboard/get_reservation_info/<?php echo $key['reservation_id'];?>">View</a>   
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
