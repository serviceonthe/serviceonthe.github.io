<div class="template-page-wrapper">
    <div class="templatemo-content">
        <a href="<?php echo base_url();?>/index.php/admin/blog/add_new_entry"><button type="button" class="btn btn-success">Add New Blog Post</button></a>
        <a href="<?php echo base_url();?>/index.php/admin/blog/post_view"><button type="button" class="btn btn-success">All List Blog Post</button></a>
        
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
            <div class="col-lg-12">
            <h1 class="page-header">Add New Blog Post</h1>
            
            </div>
            <div style="float: left">
        
          <?php echo validation_errors(); ?>
          <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
          <?php  echo form_open_multipart('admin/blog/add_new_entry');?>
          <p><strong>Title:</strong><br />
          <input type="text" name="entry_name" class="form-control" />
          </p>
          <p><strong>Body:</strong><br />
              <textarea id="rjs" name="entry_body" rows="13" cols="75" ></textarea>
          </p>
          <input type="submit" value="Submit Blog Category" class="btn-success" /> &nbsp; <input  type="reset" value="Reset Blog Category" class="btn-danger"/>

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
            <strong> Status</strong>
            <select class="form-control" name="entry_status" id="select">
              <option value="1">Publish</option>
              <option value="0">Unpublish</option>
            </select>
          <strong>Visibility</strong>

            <select class="form-control" name="entry_visibility" id="select3">
              <option value="0">Public</option>
              <option value="1">Admin</option>
            </select>
                        
          <strong>Tags</strong>
          <div style="width: 300px;">
              <input type="text" name="entry_tag" class="form-control" placeholder="Enter tag ( , ) comma seperate"/>
          </div>
          <br/>
          
                <tr>
                    <td><strong>Feature Image</strong></td>
                    <input type="file" name="feature_img" id="blog_img" class="form-control" />
                    <img id="blog_img_show" src="#" alt="Blog Feature Image"  />
                    <!--td><input type="file" name="feature_img" /></td-->
                </tr>
            </div>

            <?php echo form_close();?>
        </div>
    </div>
</div>
