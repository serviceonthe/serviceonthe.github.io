    <div id="content-area">
    	<div class="container">
<div name="body" style="float: left; width: 75%"> 

  <?php  if($query):foreach($query as $post):?>
  <h4><?php echo $post->entry_name;?> (<?php echo $post->entry_date;?>)</h4>
  <?php echo $post->entry_body;?>&nbsp;
  <?php endforeach; else:?>
  <h4>No entry yet!</h4>
  <?php endif;?>
  <!--comment section -->
  <div id="comment">
      <hr>
     
      <?php 
        foreach($post_comment as $allcomment)
        {
            echo $allcomment->user_name." on ";
            echo $allcomment->comment_date."<br/>";
            //echo $allcomment->comment_email."<br/>";
            echo $allcomment->comment_body."<hr>";
        }
      ?>
      <!--after comment flash data -->
      
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

     <?php  //echo form_open('blog/postview/".$this->uri->segment(3)."')";?>
      
                                <?php 
                                if( $blockip){
                                if($this->session->userdata('logged_in') == '')
                                {
                                    $postid=$this->uri->segment(2);
                                    //$pageurl=$_SERVER['REQUEST_URI'];
                                    ?>
                                <h3 id="reply-title">Please Login to Leave a Reply</h3>
                               
                                <a href="<?php echo base_url();?>index.php/user/log_in/<?php echo "$postid"; ?>" class="btn-success">Login</a>
                                <?php }else{
                                    ?>
        <h3 id="reply-title">Leave a Reply</h3>
    <p>Your email address will not be published. Required fields are marked *</p>
    <form action="<?php echo site_url()."post-view/".$this->uri->segment(2);  ?>" method="post">
    <table width="100%" border="0">


      <tr>
        <td><label>
          <textarea  name="comment" id="rjs" cols="45" rows="5" placeholder="Enter Your Comment" class="form-control"><?php echo set_value('comment');?></textarea>
        </label></td>
      </tr>
            <tr>
        <td>
          <label>
            <input type="submit" name="button" id="button" value="Post Comment" >
          </label></td>
      </tr>
    </table>
    <input type="hidden" name="post_id" value="<?php echo $this->uri->segment(2);  ?>" />
    <?php echo form_close();?>
<?php
                                }
                                }
                                ?>
  </div>
  <!--comment section -->
  
</div>
<div name="sidebar" style="float: right; width: 20%;">
    
    <h4>All Category</h4><hr>
    <ul>
     <?php foreach ($all_category as $allcategory)
     {?>
        <a href="<?php echo base_url()?>index.php/blog/categorypost/<?php echo $allcategory->category_id;?>"><li><?php echo $allcategory->category_name;?> </li></a>
    <?php
     }
    ?>

    </ul>
  
    <h4>Latest Post</h4><hr>
    <ul>
     <?php foreach ($recent_post as $allpost)
     {?>
        <a href="<?php echo base_url()?>post-view/<?php echo $allpost->entry_id;?>"><li><?php echo $allpost->entry_name;?> </li></a>
    <?php
     }
    ?> 
    </ul>
    
</div>
</div>
</div>
<br/>

