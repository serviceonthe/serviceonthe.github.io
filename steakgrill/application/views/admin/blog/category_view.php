<div class="template-page-wrapper">
    <div class="templatemo-content">
        <a href="<?php echo base_url();?>admin/blog/add_new_category"><button type="button" class="btn btn-success">Add Blog Category</button></a>
        <a href="<?php echo base_url();?>admin/blog/category"><button type="button" class="btn btn-success">List Blog Category</button></a>
        
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
            <h1 class="page-header">Blog Category View</h1>
            
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
                                    <th>Date</th>                                    
                                    <th>Status</th>  
                                </tr>
                            </thead>
                            <tbody> 
                                <?php foreach ($category as $allcategory)
                                {?>
                                <tr id="tr_<?php echo $allcategory->category_id;?>">
                                    <td><?php echo $allcategory->category_name;?></td>
                                    <td><?php echo $allcategory->slug; ?></td> 
                                    <td><?php echo $allcategory->category_description; ?></td> 
                                    <td><?php echo $allcategory->date;?></td> 
                                    <td id="del_td_<?php echo $allcategory->category_id;?>"> <a href="<?php echo site_url('admin/blog/edit_category/'.$allcategory->category_id);?>" class="btn-success">Edit</a> | <a href="<?php echo site_url('admin/blog/category_delete/'.$allcategory->category_id); ?>" class="delete_category" id="del_<?php echo $allcategory->category_id;?>">Delete</a></td> 
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

