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
            <div class="col-lg-12">
            <h1 class="page-header">Add Blog Category</h1>
            
            </div>
        <div id="content-area">
             <div class="container">
        <?php echo form_open('admin/blog/add_new_category');?>
        <div class="table-responsive">
        <table width="70%" border="0" cellpadding="5" cellspacing="5" class="table-hover">
            <tr><td>&nbsp;</td></tr>
              <tr>
                <td width="21%"><label>Category Name</label></td>
                <td width="79%"><input class="form-control" type="text" name="category_name" size="30" /></td>
              </tr>
              <tr>
                <td><label>Slug</label></td>
                <td><input class="form-control" type="text" name="category_slug" size="30" /></td>
              </tr>
              <tr>
                <td><label>Category Description</label></td>
                <td><label>
                        <textarea id="rjs" name="description" id="textarea" rows="15" cols="70" ></textarea>
                </label></td>
              </tr>
              <tr>
                <td></td>
                <td><input  type="submit" value="Submit Blog Category" class="btn-success" /> &nbsp; &nbsp; <input  type="reset" value="Reset Blog Category" class="btn-danger"/></td>
              </tr>
            </table>
        </div>
        </form>
         </div>
        </div>
        </div>
    </div>
</div>