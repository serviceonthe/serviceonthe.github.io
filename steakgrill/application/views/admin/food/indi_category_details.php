<script type="text/javascript">
    $(document).ready(function(){

        $("div").on("click",'.enableOrDisable', function(){
            
            var enable_or_disableID = $(this).attr("id"); 
            var enable_or_disableValue = $(this).attr("value"); 
            //alert(enable_or_disableValue);  
                $.ajax({
                url: "<?php echo base_url(); ?>admin/food/changeCategoryStatus",
                type: "POST",
                data: {id: enable_or_disableID, value: enable_or_disableValue},
                // async: false,
                dataType: "json",
                success: function (d) {
                    console.log(d);
                    if(d.catagory_status==0){
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
       <!--      <a href="<?php echo base_url();?>/index.php/admin/food/fatch_cuisine_type_category"><button type="button" class="btn btn-success">Cuisine Type Category Details</button></a>
            <a href="<?php echo base_url();?>/index.php/admin/food/fatch_indi_category"><button type="button" class="btn btn-success">Indian Catagories Details</button></a>
 -->
            <div id="page-wrapper">
                <div id="message"></div>

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category List
                        <a style="font-size: 40%;" href="<?php echo site_url('admin/food/create_category'); ?>">Create Category</a>
                        </h1>
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
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 10px;">
                                        <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>catagory_creation_date</th>
                                            <th>Status</th>
                                           <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($all_indi_category as $key){?>
                                        <tr>
                                            <td><a href=""><?php echo $key['catagory_name'];?></a></td>
                                            <td><?php echo $key['catagory_creation_date'];?></td>
                                            <td>
                                            <div>
                                                    <?php 
                                                        if($key['catagory_status']==1)
                                                        {
                                                            ?><input style="background-color:green; color:white; " type="button" name="disable" class="btn enableOrDisable" id="<?php echo $key['catagory_id']; ?>" value="Enabled"/><?php
                                                        }
                                                        else 
                                                        {
                                                            ?><input style="background-color:red; color:white;" type="button" name="enable" class="btn enableOrDisable" id="<?php echo $key['catagory_id']; ?>" value="Disabled"/><?php
                                                        }
                                                    ?>
                                                </div>
                                            </td>
                                            <td>
                                            <?php echo anchor('admin/food/delete_category/'.$key['catagory_id'],'<button type="button" class="btn btn-danger">Delete</button>',array("onclick"=>"return confirm('Are you sure?')"));?>
                                            <a href="<?php echo site_url('admin/food/edit_category/'.$key['catagory_id']); ?>" ><button type="button" class="btn btn-success">Edit</button></a>
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
