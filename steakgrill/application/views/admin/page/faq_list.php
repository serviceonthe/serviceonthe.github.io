<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
	<!-- BASIC FORM ELELEMNTS -->
    <a href="<?php echo base_url();?>/admin/pages/create_new_faq"><button type="button" class="btn btn-success">Create new FAQ</button></a>
    <a href="<?php echo site_url('admin/pages/faq_list'); ?>"><button type="button" class="btn btn-success">View FAQ</button></a>
     <div class="row mt">
        <div class="col-lg-12">
          	<div class="form-panel">
				<h3 class="panel-title"><i class="fa fa-plus-circle"></i> FAQ section</h3>
          	</div>
			<div class="form-panel">
			    <?php
			        if($this->session->flashdata('success') || $this->session->flashdata('danger')){
			    ?>    
			        <div class="alert alert-<?php echo ($this->session->flashdata('success'))?'success':'danger';?> alert-dismissable">
			            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			            <?php echo ($this->session->flashdata('success'))?$this->session->flashdata('success'):$this->session->flashdata('danger');?>
			        </div>
			    <?php
			    }
			    ?>
	            <div class="panel panel-default">
	                <!-- /.panel-heading -->
	                <div class="panel-body">
	                    <div class="table-responsive">
			    			<table class="table table-striped table-bordered table-hover" id="myTable">
                            <thead>                                
                                <tr>
                                    <th>FAQ title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php if($faq){?>
                                <?php foreach ($faq as $menu)
                                {?>
                                        <tr>
                                            
                                            <td><?php echo $menu['faq'];?></td> 
                                            <td><?php echo $menu['description'];?></td> 
                                            
                                            <td>
                                                <?php echo anchor('admin/pages/faq_delete/'.$menu['faq_id'],'<button type="button" class="btn btn-danger">Delete</button>',array("onclick"=>"return confirm('Are you sure?')"));?>
                                                <?php echo anchor('admin/pages/faq_edit/'.$menu['faq_id'],'<button type="button" class="btn btn-info">Edit</button>');?>
                                            </td>
                                        </tr>  
                                <?php }
                                } ?>
                                        
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

