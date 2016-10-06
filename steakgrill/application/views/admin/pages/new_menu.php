<div class="template-page-wrapper">
    <div class="templatemo-content">
        <a href="<?php echo base_url();?>/index.php/admin/pages/add_new_menu"><button type="button" class="btn btn-success">Create New Menu</button></a>
        <a href="<?php echo site_url('admin/pages/all_menu_list'); ?>"><button type="button" class="btn btn-success">Menu Management</button></a>
        
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
            <h3>+Add New Menu</h3>
        <?php echo form_open('admin/pages/add_new_menu');?>
        <table class="table" >
          <tr>
            <td >
              <input type="text" placeholder="Enter Menu Name" name="menu_name" id="" class="form-control" required/>
            </td>
            <td ><select class="form-control" name="menu_position"placeholder="Enter Menu Position" id="">
                    <option value="0">Select Menu Postion</option>
                    <option value="h1">Header Menu</option>
                    <option value="f1">Footer Company Menu</option>
                    <option value="f2">Footer Cities Menu</option>
                    <option value="f3">Footer Faq Menu</option>
                    <option value="f4">Footer Apps Menu</option>

            </select></td>
            <td >
            <select class="form-control" name="page_name"placeholder="Enter Menu Position" id="">
                <option>Select Page for Menu</option>
               <?php 
                foreach ($pages as $all_pages)
                {
                    ?>
                <option value="<?php  echo $all_pages->page_id;  ?>"><?php  echo $all_pages->page_name;  ?></option>

                <?php
                }
                ?>
            </select></td>
            <td>
              <input type="submit" name="button" id="button" value="Submit" class="btn btn-default" />
           </td>
          </tr>
        </table>
        </div>
    <?php echo form_close();?>
     </div>
</div>

