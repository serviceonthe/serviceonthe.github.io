<script type="text/javascript">
    $(document).ready(function(){

            

        $("div").on("click",'.enableOrDisable', function(){
            
            var enable_or_disableID = $(this).attr("id"); 
            var enable_or_disableValue = $(this).attr("value"); 

           

            //alert(enable_or_disableValue);  

                $.ajax({
                url: "<?php echo base_url(); ?>admin/settings/changePayMatStatus",
                type: "POST",
                data: {id: enable_or_disableID, value: enable_or_disableValue},
                // async: false,
                dataType: "json",
                success: function (d) {
                    console.log(d);
                    if(d.payment_method_status==0){
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

<div class="template-page-wrapper">
    <div class="templatemo-content">
    <!--here is start changable content -->
    <!--all code here -->
        <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
<!--                            DataTables Advanced Tables-->
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
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Action</th>

                               </tr>
                            </thead>
                            <tbody> 
                             <?php foreach($all_payment as $key){?>       
                                     <tr>                        
                                        <td><?php echo $key['payment_method_name'];?></td>
                                        <td>
                                            <div>
                                                <?php 
                                                    if($key['payment_method_status']==1)
                                                    {
                                                        ?><input style="background-color:green; color:white; " type="button" name="disable" class="btn enableOrDisable" id="<?php echo $key['payment_method_id']; ?>" value="Enabled"/><?php
                                                    }
                                                    else 
                                                    {
                                                        ?><input style="background-color:red; color:white;" type="button" name="enable" class="btn enableOrDisable" id="<?php echo $key['payment_method_id']; ?>" value="Disabled"/><?php
                                                    }

                                                ?>


                                            </div>
                                        </td>
                                        <?php if($key['payment_method_id']==2 || $key['payment_method_id']==3 || $key['payment_method_id']==7) {?>
                                        <td><?php echo anchor('admin/settings/payment_method_details/'.$key['payment_method_id'],'Details');?></td>
                                        <?php } else{ ?>
                                         <td></td>
                                              
                                        <?php  } ?>
                                     </tr>
                           <?php } ?>   
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