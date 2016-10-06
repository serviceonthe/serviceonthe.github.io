<div class="template-page-wrapper">
    <div class="templatemo-content">
         <a href="<?php echo base_url();?>/index.php/admin/pages/add_new_entry"><button type="button" class="btn btn-success">Create New Page</button></a>
         <a href="<?php echo base_url();?>/index.php/admin/pages/page_view"><button type="button" class="btn btn-success">All Page</button></a>
        
        
        <div id="page-wrapper">
            <div id="message"></div>

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
            }, 3000); // <-- time in milliseconds
            </script>
            <?php } ?>


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Page List</h1>
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
                                            <th>Page Title</th>
                                            <th>Page Contain</th>                                                                   
                                            <th>Category</th>
                                            <th>Date</th>                                                                 
                                            <th>Modify</th>
                                        </tr> 
                                    </thead>
                                    <tbody> 
                                        <?php foreach ($post as $allpost)
                                        {?>
                                        <tr id="tr_<?php echo $allpost->page_id;?>">
                                            <td><?php echo $allpost->page_name;?></td>
                                            <td><?php echo substr($allpost->page_body, 0, 200);  ?></td> 
                                            <td><?php echo field_in_array('category_id', $allpost->category_id, $indi_pages_category, 'category_name');?></td>
                                            <td><?php echo $allpost->create_date;?></td> 
                                            <td>

                                            <?php echo anchor('admin/pages/delete_entry/'.$allpost->page_id,'<button type="button" class="btn btn-danger">Delete</button>',array("onclick"=>"return confirm('Are you sure?')"));?>
                                            <a href="<?php echo site_url('admin/pages/edit_entry/'.$allpost->page_id); ?>" ><button type="button" class="btn btn-success">Edit</button></a>

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

