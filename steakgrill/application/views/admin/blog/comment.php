<div class="template-page-wrapper">
    <div class="templatemo-content">
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
            <div id="message"></div>


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Comment Details</h1>
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
                                            <th>ID</th>
                                            <th>Date/Time</th>
                                            <th>Author Name</th>                                                                                                      
                                            <th>Comment Summary</th>
                                            <th>View Post</th>
                                            <th>Status</th>
                                            <th>Modify</th>
                                            <th>User Block</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php foreach ($comment as $allcomment)
                                        {?>
                                        <tr id="tr_<?php echo $allcomment->comment_id;?>">
                                            <td><?php 
                                            $i=1;
                                            echo $i;
                                            $i=$i+1; ?></td>
                                            <td><?php echo $allcomment->comment_date; ?></td> 
                                            <td><a href="<?php echo base_url(); ?>user/get_user/<?php echo $allcomment->user_id; ?>"><?php echo $allcomment->user_name; ?></a></td>
                                            <td>
                                                <a href="#">
                                                    <button class=" btn" data-toggle="modal" data-target="#<?php echo $allcomment->comment_id; ?>">
          View Comment
        </button>

        <!-- Modal -->
        <div class="modal fade" id="<?php echo $allcomment->comment_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Comment View</h4>
              </div>
              <div class="modal-body">
               <?php echo $allcomment->comment_body; ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

              </div>
            </div>
          </div>
        </div>

                                                </a>
                                              </td>
                                            <td><a href="#">
                                                    <button class=" btn" data-toggle="modal" data-target="#myModal1">
          View Post
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Post View</h4>
              </div>
              <div class="modal-body">
                <?php
                $allcomment->entry_name;
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

              </div>
            </div>
          </div>
        </div>

                                                </a></td> 


                                            <td>
                                                   <div class="stat" id="comment_status_td_<?php echo $allcomment->comment_id;?>">
                                                        <?php 
                                                            if($allcomment->status)
                                                            {
                                                                echo '<input rel="'.$allcomment->status.'" class="comment_staus" title="Make this Comment disable" id="comment_stat_'.$allcomment->comment_id.'" type="button" value="Unpublish"/>';
                                                            }
                                                            else 
                                                            {
                                                                echo '<input rel="'.$allcomment->status.'" class="comment_staus" title="Make this comment enable" id="comment_stat_'.$allcomment->comment_id.'" type="button" value="Publish"/>';
                                                            }
                                                        ?>
                                                    </div>
                                            </td> 
                                          <td id="del_td_<?php echo $allcomment->comment_id; ?>"> <a href="<?php echo base_url() ?>admin/blog/edit_comment/<?php echo $allcomment->comment_id; ?>" class="btn-success">Edit</a> | <a href="#" class="delete_comment" id="del_<?php echo $allcomment->comment_id; ?>">Delete</a></td> 

                                            <td>
                                                   <div class="stat" id="block_status_td_<?php echo $allcomment->user_id;?>">
                                                        <?php 
                                                            if($allcomment->status)
                                                            {
                                                                echo '<input rel="'.$allcomment->status.'" class="block_user" title="Make this user in Block List" id="block_stat_'.$allcomment->user_id.'" type="button" value="Block"/>';
                                                            }
                                                            else 
                                                            {
                                                                echo '<input rel="'.$allcomment->status.'" class="block_user" title="Make this user Unblock" id="block_stat_'.$allcomment->user_id.'" type="button" value="Unblock"/>';
                                                            }
                                                          //echo $allcomment->status;  
                                                        ?>
                                                    </div>
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

