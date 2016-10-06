<script type="text/javascript">
    $(document).ready(function(){

            

        $(".enableOrDisable").click(function () {
            
            var enable_or_disableID = $(this).attr("id");  
            var enable_or_disableValue = $(this).attr("value"); 

           

            //alert(enable_or_disableValue);  

                $.ajax({
                url: "<?php echo base_url(); ?>admin/users/changeUserStatus",
                type: "POST",
                data: {id: enable_or_disableID, value: enable_or_disableValue},
                // async: false,
                dataType: "json",
                success: function (d) {
                    console.log(d);
                    if(d.user_status==0){
                        $("#"+enable_or_disableID).val('Disabled');
                        $("#"+enable_or_disableID).css("background-color", "Red");

                    }else{
                        $("#"+enable_or_disableID).val('Enabled');
                        $("#"+enable_or_disableID).css("background-color", "Green");
                    }   
                },
                error: function (xhr, status, error) {
                    alert('Error');
                }
            });
            return false;
        });
    });
</script>

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
                            <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Postcode</th>
                                                <th>Creation Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                           </tr>
                                        </thead>
                                        <tbody> 
                                         <?php
                                            if($all_users > 0 ){
                                            foreach($all_users as $key){?>       
                                                 <tr>                        
                                                    <td><?php echo $key['user_first_name'];?></td>
                                                    <td><?php echo $key['user_email'];?></td>
                                                    <td><?php echo $key['user_post_code'];?></td>
                                                    <td><?php echo $key['user_creation_date'];?></td>
                                                    <td>
                                                        <div>
                                                            <?php 
                                                                if($key['user_status']==1)
                                                                {
                                                                    ?><input style="background-color:green; color:white; " type="button" name="disable" class="btn enableOrDisable" id="<?php echo $key['user_id']; ?>" value="Enabled"/><?php
                                                                }
                                                                else 
                                                                {
                                                                    ?><input style="background-color:red; color:white;" type="button" name="enable" class="btn enableOrDisable" id="<?php echo $key['user_id']; ?>" value="Disabled"/><?php
                                                                }
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php echo anchor('admin/users/users_edit?d_edit='.$key['user_id'],'<button type="button" class="btn btn-success">Edit</button>');?>  
                                                        <?php echo anchor('admin/users/user_delete/'.$key['user_id'],'<button type="button" class="btn btn-danger">Delete</button>',array("onclick"=>"return confirm('Are you sure?')"));?>
                                                    </td>
                                                 </tr>
                                            <?php } }else{?> 
                                    </tbody> 
                                </table>
                                    <h2>No User</h2> 
                                       <?php } ?> 
                            </div>
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
