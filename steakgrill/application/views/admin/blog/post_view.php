<div class="template-page-wrapper">
    <div class="templatemo-content">
        <a href="<?php echo base_url();?>/index.php/admin/blog/add_new_entry"><button type="button" class="btn btn-success">Add New Blog Post</button></a>
        <a href="<?php echo base_url();?>/index.php/admin/blog/post_view"><button type="button" class="btn btn-success">All List Blog Post</button></a>
        <div id="page-wrapper">
            <div id="message"></div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All List Blog Post</h1>
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
                                            <th>Post Title</th>
                                            <th>Post Body</th>                                                                   
                                            <th>Category</th>
                                            <th>Date</th>                                    
                                            <th>Status</th>
                                            <th>Modify</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php foreach ($post as $allpost)
                                        {?>
                                        <tr id="tr_<?php echo $allpost->entry_id;?>">
                                            <td><?php echo $allpost->entry_name;?></td>
                                            <td><?php echo substr($allpost->entry_body, 0, 200);  ?></td> 
                                            <td><?php echo $allpost->category_id; ?></td> 
                                            <td><?php echo $allpost->entry_date;?></td> 
                                            <td>
                                                   <div class="stat" id="post_status_td_<?php echo $allpost->entry_id;?>">

                                                        <?php
                                                            if($allpost->status)
                                                            {
                                                                echo '<input rel="'.$allpost->status.'" class="post_staus" title="Make this Post disable" id="post_stat_'.$allpost->entry_id.'" type="button" value="Publish"/>';
                                                            }
                                                            else
                                                            {
                                                                echo '<input rel="'.$allpost->status.'" class="post_staus" title="Make this post enable" id="post_stat_'.$allpost->entry_id.'" type="button" value="Unpublish"/>';
                                                            }
                                                        ?>
                                                    </div>

                                            </td> 
                                            <td id="del_td_<?php echo $allpost->entry_id;?>"><a href="<?php echo base_url();?>admin/blog/edit_entry/<?php echo $allpost->entry_id;?>">Edit</a> | <?php echo anchor('admin/blog/delete_entry/'.$allpost->entry_id,'Delete',array("onclick"=>"return confirm('Are you sure?')"));?></td>
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
