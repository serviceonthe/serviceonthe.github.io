

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
                             <?php foreach($reservation_info as $key) { ?>
                    
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tr style="border:0px;">  
                                        <td><b>Reservation Id</b></td>
                                        <td><?php echo $key['reservation_id']; ?></td>  
                                    </tr>
                                    <tr>
                                        <td><b>Customer Name</b></td>
                                        <td><?php echo $key['title'].' '.$key['name'];?></td>     
                                    </tr>
                                     <tr>
                                        <td><b>Email</b></td>
                                        <td><?php echo $key['email'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Mobile</b></td>
                                        <td><?php echo $key['mobile'];?></td>
                                    </tr>
                                     <tr>
                                        <td><b>Reservation Date</b></td>
                                        <td><?php echo $key['reservation_date'];?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Reservation Time</b></td>
                                        <td><?php echo $key['reservation_time'];?></td> 
                                    </tr>
                                    <tr>
                                        <td><b>Number of Guest</b></td>
                                        <td><?php echo $key['num_of_guest'];?></td>
                                    </tr>
                                     <tr>
                                        <td><b>Special Note</b></td>
                                        <td><?php echo $key['special_note'];?></td>
                                    </tr>
                                  
                                </table>                                             
                            </div>
                            <!-- /.table-responsive --> 
                  
                                <?php } ?>
                    
                        </div>
                    </div>    
            </div>    
                <!-- /.panel -->
        </div>

            <!-- /.col-lg-12 -->
    </div>
</div>

    <!--all code here -->
    <!--here is end changable content -->

