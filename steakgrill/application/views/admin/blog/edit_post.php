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
                <div style="float: left">
                <h3>Edit Blog Post</h3>
              <?php echo validation_errors(); ?>
              <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
              <?php  echo form_open('admin/blog/edit_entry');?>
              <p><strong>Title:</strong><br />
              <input type="text" name="entry_name" class="form-control" value="<?php echo set_value('entry_name',$post_details[0]->entry_name); ?>" />
              </p>
              <p><strong>Body:</strong><br />
              <textarea id="rjs" name="entry_body" rows="13"  cols="75"  ><?php echo set_value('entry_body',$post_details[0]->entry_body); ?></textarea>
              </p>
              <input type="submit" value="Update Blog Post" class="form-control btn btn-success" />

                </div>

                <div style="float: left; margin-left: 15px; margin-top: 30px;" >
                    <br/><br/>

              <strong>Category</strong>
                <select class="form-control" name="entry_category" id="select2">
                    <option value="<?php $category[0]->category_id;?>"><?php echo $category[0]->category_name;?></option>
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
                        <?php
                            if($post_details[0]->status==0){
                                echo '<option value="0">Unpublish</option>';
                                echo '<option value="1">Publish</option>';
                            }
                        if($post_details[0]->status==1){
                            echo '<option value="1">Publish</option>';
                            echo '<option value="0">Unpublish</option>';
                        }
                        ?>


                    </select>
              <strong>Visibility</strong>

                <select class="form-control" name="entry_visibility" id="select3">
                    <?php
                    if($post_details[0]->visibility==0){
                        echo '<option value="0">Public</option>';
                        echo '<option value="1">Admin</option>';
                    }
                    if($post_details[0]->visibility==1){
                        echo '<option value="1">Admin</option>';
                        echo '<option value="0">Public</option>';
                    }
                    ?>
                </select>
              <strong>Tags</strong>
              <div style="width: 300px;">
                  <input type="hidden" id="tagSelect" name="entry_tag" class="form-control" value="<?php foreach ($entry_tag as $alltag){echo $alltag->tag_name.",";} ?>"/>

              </div>
                </div>
            <input type="hidden" name="entry_id" value="<?php echo $post_details[0]->entry_id; ?>"/>
                <?php echo form_close();?>
            </div>
         </div>
    </div>

