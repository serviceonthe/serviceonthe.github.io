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
    <form action="<?php echo site_url()."/blog/edit_comment/". $this->uri->segment(3);  ?>" method="post">
    <table width="100%" border="0">
      <tr>   
        <td><label>
          <textarea  name="comment" value="<?php echo set_value('comment',$comment_details[0]->comment_body); ?>" id="rjs" cols="45" rows="5"  class="form-control"><?php echo $comment_details[0]->comment_body; ?></textarea>
        </label></td>
      </tr>
            <tr>
        <td>
          <label>
            <input type="submit" name="button" id="button" value="Update Comment" >
          </label></td>
      </tr>
    </table>
    <input type="hidden" name="comment_id" value="<?php echo $this->uri->segment(3);  ?>" />
    <?php echo form_close();?>
 </div>
</div>
</div>
