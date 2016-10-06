<div class="template-page-wrapper">
    <div class="templatemo-content">

         <a href="<?php echo base_url();?>/index.php/admin/pages/add_new_category"><button type="button" class="btn btn-success">Add Page Category</button></a>
         <a href="<?php echo base_url();?>/index.php/admin/pages/category_view"><button type="button" class="btn btn-success">List Page Category</button></a>
        

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

            <div id="content-area">
                 <div class="container">

            <?php extract($edit_fetch);?>

            <?php echo form_open('admin/pages/update_category');?>
            <div class="table-responsive">
            <table width="70%" border="0" cellpadding="5" cellspacing="5" class="table-hover">
                  <td> &nbsp; &nbsp; </td>
                  <tr>
                    <td width="21%"><label>Category Name</label></td>
                    <td width="79%"><input class="form-control" type="text" name="category_name" size="30" value="<?php echo $category_name; ?>" /></td>
                  </tr>
                  <tr>
                    <td><label>Slug</label></td>
                    <td><input class="form-control" type="text" name="slug" size="30" value="<?php echo $slug; ?>" /></td>
                  </tr>
                  <tr>
                    <td><label>Category Description</label></td>
                    <td><label>
                      <textarea id="rjs" name="category_description" id="textarea" cols="45" rows="15"  ><?php echo $category_description; ?></textarea>
                    </label></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><input  type="submit" value="Update Category" class="btn btn-success" /></td>
                  </tr>
                </table>
            </div>
                     <input type="hidden" name="category_id" value="<?php echo $category_id ?>"/>
            </form>
             </div>
            </div>
            </div>
    </div>            
</div>