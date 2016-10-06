<div class="template-page-wrapper">
   <div class="templatemo-content">
        <a href="<?php echo base_url();?>/index.php/admin/pages/add_new_entry"><button type="button" class="btn btn-success">Create New Page</button></a>
         <a href="<?php echo base_url();?>/index.php/admin/pages/page_view"><button type="button" class="btn btn-success">All Page</button></a>
        
       
       <div class="col-lg-12">
            <h1 class="page-header">Edit Page</h1>
            
        </div>

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
            <div style="float: left">
          <?php echo validation_errors(); ?>
        <?php extract($edit_fetch);?>
          <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
          <?php  echo form_open('admin/pages/update_entry');?>
          <p><strong>Title:</strong><br />
          <input type="text" name="entry_name" class="form-control" value="<?php echo $page_name; ?>" cols="85" />
          </p>
          <p><strong>Body:</strong><br />
          <textarea id="rjs" name="entry_body" rows="13" cols="85" ><?php echo $page_body; ?></textarea>
          </p>
          <input type="submit" value="Update page" class="btn btn-success" />

            </div>

            <div style="float: left; margin-left: 15px; margin-top: 30px;" >
                <br/><br/>

          <strong>Category</strong>
            <select class="form-control" name="entry_category" id="select2">
               <?php 
                foreach ($category as $all_category)
                {
                    ?>
                <option value="<?php  echo $all_category->category_id;  ?>"><?php  echo $all_category->category_name;  ?></option>
                   <?php  echo $all_category->category_name;  ?>
                <?php
                }
                ?>
            </select>
            <strong>
            Status</strong>
            <select class="form-control" name="entry_status" id="select">
              <option value="1">Publish</option>
              <option value="0">Unpublish</option>
            </select>
          <strong>Visibility</strong>

            <select class="form-control" name="entry_visibility" id="select3">
              <option value="0">Public</option>
              <option value="1">Admin</option>
            </select>
                     
            </div>
        <input type="hidden" name="page_id" value="<?php echo $page_id; ?>"/>
            <?php echo form_close();?>
        </div>
       </div>
    </div>

<style type="text/css">
.site-footer{
clear: both;
}
</style>


