<script type="text/javascript">
    $(document).ready(function(){

            

        $("div").on("click",'.enableOrDisable', function(){
            
            var enable_or_disableID = $(this).attr("id"); 
            var enable_or_disableValue = $(this).attr("value"); 

           

            //alert(enable_or_disableValue);  

                $.ajax({
                url: "<?php echo base_url(); ?>admin/pages/changePageCatStatus",
                type: "POST",
                data: {id: enable_or_disableID, value: enable_or_disableValue},
                // async: false,
                dataType: "json",
                success: function (d) {
                    console.log(d);
                    if(d.page_category_status==0){
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
       <a href="<?php echo base_url();?>/index.php/admin/pages/add_new_category"><button type="button" class="btn btn-success">Add Page Category</button></a>
       <a href="<?php echo base_url();?>/index.php/admin/pages/category_view"><button type="button" class="btn btn-success">List Page Category</button></a>
         
<div id="page-wrapper">
    <?php
    if($this->session->flashdata('success') || $this->session->flashdata('danger'))
    {
    ?>    
        <div class="alert alert-<?php echo ($this->session->flashdata('success'))?'success':'danger';?> alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <?php echo ($this->session->flashdata('success'))?$this->session->flashdata('success'):$this->session->flashdata('danger');?>
        </div>
    <?php
    }
    ?>

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

    <div id="message"></div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Page Category View</h1>
            
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
                    
                    <div class="table-responsive">
                       
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>                                
                                <tr>
                                    <th>Category Name</th>
                                    <th>Category Slug</th>                                                                   
                                    <th>Category Description</th>
                                    <th>Status</th>                                    
                                    <th>Action</th>  
                                </tr>
                            </thead>
                            <tbody> 
                                <?php foreach ($category as $allcategory)
                                {?>
                                <tr id="tr_<?php echo $allcategory->category_id;?>">
                                    <td><?php echo $allcategory->category_name;?></td>
                                    <td><?php echo $allcategory->slug; ?></td> 
                                    <td><?php echo $allcategory->category_description; ?></td> 
                                    <td>
                                        <div>
                                            <?php 
                                                if($allcategory->page_category_status==1)
                                                {
                                                    ?><input style="background-color:green; color:white; " type="button" name="disable" class="btn enableOrDisable" id="<?php echo $allcategory->category_id; ?>" value="Enabled"/><?php
                                                }
                                                else 
                                                {
                                                    ?><input style="background-color:red; color:white;" type="button" name="enable" class="btn enableOrDisable" id="<?php echo $allcategory->category_id; ?>" value="Disabled"/><?php
                                                }
                                            ?>
                                        </div>
                                    </td>
                                    <td>
                                            <?php echo anchor('admin/pages/delete_category/'.$allcategory->category_id,'<button type="button" class="btn btn-danger">Delete</button>',array("onclick"=>"return confirm('Are you sure?')"));?>
                                            <a href="<?php echo site_url('admin/pages/edit_category/'.$allcategory->category_id); ?>" ><button type="button" class="btn btn-success">Edit</button></a>
                                    </td> 
                                <?php } ?>
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
</div>
</div>

