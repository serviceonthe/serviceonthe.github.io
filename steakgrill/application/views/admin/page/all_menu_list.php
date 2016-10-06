<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
	<!-- BASIC FORM ELELEMNTS -->
    <a href="<?php echo base_url();?>/index.php/admin/pages/add_new_menu"><button type="button" class="btn btn-success">Create New Menu</button></a>
        <a href="<?php echo site_url('admin/pages/all_menu_list'); ?>"><button type="button" class="btn btn-success">Menu Management</button></a>
    <div class="row mt">
        <div class="col-lg-12">
				
          	<div class="form-panel">
				<h3 class="panel-title"><i class="fa fa-plus-circle"></i> All Menu List</h3>
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
                                    <th>Menu Name</th>
                                    <th>Menu position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php if($all_menu_list){?>
                                <?php foreach ($all_menu_list as $menu)
                                {?>
                                        <tr id="tr_<?php echo $menu['menu_id'];?>">
                                            
                                            <td><?php echo $menu['menu_name'];?></td> 
                                            <?php if($menu['menu_position']==='f_m'){?>
                                            <td>Footer Menu</td> 
                                            <?php }else{?>
                                            <td>Left Side Menu</td> 
                                            <?php }?>
                                            <td>
                                                <?php echo anchor('admin/pages/delete_menu/'.$menu['menu_id'],'<button type="button" class="btn btn-danger">Delete</button>',array("onclick"=>"return confirm('Are you sure?')"));?>
                                                <a href="<?php echo site_url('home/left_side_menu/' . $menu['menu_id']); ?>" target="_blank" ><button type="button" class="btn btn-success">View Site</button></a>
                                            </td>
                                        </tr>  
                                <?php }
                                }else{ echo '<p align="center" ><b>Here is no Menu List</b></p>';} ?>
                                        
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

