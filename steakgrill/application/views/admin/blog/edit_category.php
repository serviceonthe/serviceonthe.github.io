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
<?php echo form_open('admin/blog/edit_category');?>
<div class="table-responsive">
<table width="70%" border="0" cellpadding="5" cellspacing="5" class="table-hover">
      <tr>
        <td width="21%"><label>Category Name</label></td>
    
        <td width="79%"><input class="form-control" type="text" name="category_name" size="30" value="<?php echo set_value('category_name',$category_details[0]->category_name);  ?>" /></td>
      </tr>
      <tr>
        <td><label>Slug</label></td>
    
        <td><input class="form-control" type="text" name="category_slug" size="30" value="<?php echo set_value('category_name',$category_details[0]->slug); ?>" /></td>
      </tr>
      <tr>
        <td><label>Category Description</label></td>
        <td><label>
          <textarea id="rjs" name="description" id="textarea" cols="45" rows="15" ><?php echo set_value('category_name',$category_details[0]->category_description); ?></textarea>
        </label></td>
      </tr>
      <tr>
        <td></td>
        <td><input  type="submit" value="Submit" class="btn-success" /> &nbsp; &nbsp; <input  type="reset" value="Reset" class="btn-danger"/></td>
      </tr>
    </table>
</div>
         <input type="hidden" name="id" value="<?php echo $category_details[0]->category_id; ?>"/>
</form>
 </div>
</div>
</div>
