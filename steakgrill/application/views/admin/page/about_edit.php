<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>

<?php extract($edit_fetch); ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
	<!-- BASIC FORM ELELEMNTS -->
    <a href="<?php echo base_url();?>admin/pages/create_new_about"><button type="button" class="btn btn-success">Create new about</button></a>
    <a href="<?php echo site_url('admin/pages/view_about'); ?>"><button type="button" class="btn btn-success">View about</button></a>
    <div class="row mt">
        <div class="col-lg-12">
          	<div class="form-panel">
				<h3 class="panel-title"><i class="fa fa-plus-circle"></i> About us section</h3>
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
			    			<?php echo form_open_multipart('admin/pages/about_update'); ?>
	                        <table width="70%" border="0" cellpadding="15" cellspacing="5" class="table-hover">
					            <td> &nbsp; &nbsp; </td>
					              <tr>
					                <td width="21%"><label>Main title</label></td>
					                <td width="79%"><input class="form-control" type="text" name="main_title" value="<?php echo $main_title;?>" size="30" /></td>
					              </tr>
					              <tr>
					                <td width="21%"><label>Short title</label></td>
					                <td width="79%"><input class="form-control" type="text" name="short_title" value="<?php echo $short_title;?>" size="30" /></td>
					              </tr>
					              <tr>
					                <td width="21%"><label>Description</label></td>
					                <td width="79%"><textarea class="form-control ckeditor" name="description"  rows="5" cols="75" ><?php echo $description;?></textarea></td>
					              </tr>
					              <tr>
					                <input class="form-control" type="hidden" value="<?php echo $about_id; ?>" name="about_id" />
					              </tr>
					              <tr>
					                <td></td>
					                <td><input  type="submit" value="Update" class="btn btn-success" /></td>
					              </tr>
					        </table>
			    			<?php echo form_open(); ?>
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

