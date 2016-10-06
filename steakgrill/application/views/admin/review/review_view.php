<script>
$(document).ready(function(){
    $('#myTable').dataTable();

        function createAutoClosingAlert(selector, delay) {
           var alert = $(selector).alert();
           window.setTimeout(function() { 
            // alert.alert('close') 
            alert.fadeTo(delay, 0).slideUp(delay, function(){
                $(this).remove(); 
            });
           }, delay);
        }
        createAutoClosingAlert("#alert-msg", 2000);
    });
</script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
          <!-- BASIC FORM ELELEMNTS -->
      <div class="row mt">
          <div class="col-lg-12">
                  <div class="form-panel">
                      <h3 class="panel-title"><i class="fa fa-plus-circle"></i> All Review List</h3>
                  </div>
                  <?php if($this->session->flashdata('message')): ?>
                    <div id="alert-msg" class="alert alert-success">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <?php echo $this->session->flashdata('message'); ?>
                  </div>
                  <?php endif; ?>
                  <div class="form-panel">
                      <?php
                              if($this->session->flashdata('success') || $this->session->flashdata('danger')){
                      ?>    
                              <div class="alert alert-<?php echo ($this->session->flashdata('success'))?'success':'danger';?> alert-dismissable">
                                  button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                  <?php echo ($this->session->flashdata('success'))?$this->session->flashdata('success'):$this->session->flashdata('danger');?>
                              </div>
                      <?php
                      }
                      ?>	
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="myTable">
                              <thead>                                
                                  <tr>
                                      <th>Customar Name</th>
                                      <th>Food Quality Rating</th>
                                      <th>Delivery Time Rating</th>
                                      <th>Takeway Service Rating</th>
                                      <th>Review Massage</th>
                                      <th>Review IP</th>
                                      <th colspan="3">Action</th>
                                  </tr>
                              </thead>
                              <tbody> 
                                  <?php if($review_all > 0){?>
                                  <?php foreach ($review_all as $review)
                                  {?>
                                          <tr>
                                              <td><?php echo $review['first_name'].' '.$review['last_name'];?></td>
                                              <td><?php echo $review['food_quality_rating'];?></td>
                                              <td><?php echo $review['delivery_time_rating'];?></td>
                                              <td><?php echo $review['takeway_service_rating'];?></td>
                                              <td><?php echo $review['review_massage'];?></td> 
                                              <td><?php echo $review['review_ip'];?></td>
                                              <?php if($review['status']==0){?>
                                              <td><a href="<?php echo base_url();?>admin/dashboard/change_review_status/<?php echo $review['id'];?>/1"><button type="button" class="btn btn-success">Publish</button></a></td>
                                              <?php }else{?>
                                              <td><a href="<?php echo base_url();?>admin/dashboard/change_review_status/<?php echo $review['id'];?>/0"><button type="button" class="btn btn-danger">Unpublish</button></a></td>
                                              <?php }?>
                                              <td><?php echo anchor('admin/dashboard/edit_review/'.$review['id'],'<button type="button" class="btn btn-info">Edit</button>');?></td>
                                              <td><?php echo anchor('admin/dashboard/review_delete/'.$review['id'],'<button type="button" class="btn btn-danger">Delete</button>',array("onclick"=>"return confirm('Are you sure?')"));?></td>
                                          </tr>  
                                  <?php }
                                  }else{ echo '<p align="center" ><b>Here is no Review massage</b></p>';} ?>
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
    </section>
</section>


