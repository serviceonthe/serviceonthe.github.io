<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
	<!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                            <h3 class="panel-title"><i class="fa fa-list-alt"></i> All News Letter List</h3>
            </div>

            <div class="form-panel">
                    <a href="<?php echo base_url();?>admin/mail/add_newsletter"><button type="button" class="btn btn-success">Add News Letter</button></a>
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
                   <br>
                   <br>


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
		   
                    <div class="panel panel-default">
                        <div class="panel-heading">
        <!--                            DataTables Advanced Tables-->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>                                
                                        <tr>
                                            <th>News Letter Title</th>
                                            <th>News Letter Body</th>    
                                            <th>Creation Date Time</th>    
                                            <th>Modify</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php if($newsletter){
                                            foreach ($newsletter as $news)
                                        {?>
                                        <tr id="tr_<?php echo $news['newsletter_id'];?>">
                                            <td><?php echo $news['newsletter_title'];?></td>
                                            <td><?php echo $news['newsletter_body'];?></td> 
                                            <td><?php echo $news['creationdatetime'];?></td> 
                                            <td><?php echo anchor('admin/mail/edit_newsletter/'.$news['newsletter_id'],'<p class="btn btn-block btn-primary"><i class="fa fa-times"></i> Edit</p>');?> <?php echo anchor('admin/mail/delete_newsletter/'.$news['newsletter_id'],'<p class="btn btn-block btn-danger"><i class="fa fa-times"></i> Delete</p>',array("onclick"=>"return confirm('Are you sure?')"));?></td>
                                        <?php } 
                                        }
                                        ?>
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
    </section>
</section>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

