<style type="text/css">
        /*placeholder{color:#096;}
        */
</style>
<script>
    $(document).ready(function(){
        $('#myTable').dataTable();
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){

            

        //$(".enableOrDisable").click(function () { 
        $("div").on("click",'.enableOrDisable', function(){
            //alert('ho ho');
            var enable_or_disableID = $(this).attr("id"); 
            var enable_or_disableValue = $(this).attr("value"); 
            //alert(enable_or_disableValue);  
                $.ajax({
                url: "<?php echo base_url(); ?>admin/food/changeItemStatus",
                type: "POST",
                data: {id: enable_or_disableID, value: enable_or_disableValue},
                // async: false,
                dataType: "json",
                success: function (d) {
                    console.log(d);
                    if(d.item_status==0){
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
            <!-- <a href="<?php echo base_url();?>/index.php/admin/food/fatch_cuisine_item"><button type="button" class="btn btn-success">Cuisine Item</button></a>
            <a href="<?php echo base_url();?>/index.php/admin/food/fatch_indi_item"><button type="button" class="btn btn-success">Indian Item</button></a>
            <a href="<?php echo base_url();?>/index.php/admin/food/fatch_signature_item"><button type="button" class="btn btn-success">Signature Item</button></a> -->
            <div id="page-wrapper">
                <div id="message"></div>

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Item List</h1>
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
                                <table class="table table-striped table-bordered table-hover" id="myTable" style="font-size: 10px;">

                                        <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Category</th>
                                            <th>Item Meta Keyword</th>
                                             <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead> 
                                        <tbody>
                                        <?php foreach($all_indi_item as $key){?>
                                        <tr>
                                            <td><?php echo $key['item_name'];?></td>
                                            <td><?php echo field_in_array('catagory_id', $key['item_catagory_id'], $indi_catagories, 'catagory_name');?></td>
                                            <td><?php echo $key['item_meta_keyword'];?></td>
                                            <td>
                                                <div>
                                                    <?php 
                                                        if($key['item_status']==1)
                                                        {
                                                            ?><input style="background-color:green; color:white; " type="button" name="disable" class="btn enableOrDisable" id="<?php echo $key['item_id']; ?>" value="Enabled"/><?php
                                                        }
                                                        else 
                                                        {
                                                            ?><input style="background-color:red; color:white;" type="button" name="enable" class="btn enableOrDisable" id="<?php echo $key['item_id']; ?>" value="Disabled"/><?php
                                                        }
                                                    ?>
                                                </div>
                                            </td>
                                            <td>
                                            <?php echo anchor('admin/food/item_delete/'.$key['item_id'],'<button type="button" class="btn btn-danger">Delete</button>',array("onclick"=>"return confirm('Are you sure?')"));?>
                                            <a href="<?php echo site_url('admin/food/menu_edit/'.$key['item_id']); ?>" ><button type="button" class="btn btn-success">Edit</button></a>
                                            <a href="<?php echo site_url('admin/food/item_image_upload/'.$key['item_id']); ?>" ><button type="button" class="btn btn-success">Edit Image</button></a>

                                            </td>

                                            <?php } ?>
                                            <!-- <a href=<?php //echo site_url('user/edit_restaurant/'.$restaurant->res_id);?>>Edit</a> &nbsp; -->

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
