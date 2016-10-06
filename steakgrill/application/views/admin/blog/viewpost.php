<style>
.sociallink{
	background:#eee;
	margin-top:15px;
	margin-bottom:15px;
	}
.sociallink h3{
	margin:0px;
	padding:5px;
	padding-left:10px;
	background:#999;
	font-size:18px;
	color:#FFF;
	}
.sociallink ul{
	margin:0px;
	padding:0px;
	}
.sociallink li{
	margin:0px;
	padding:5px;
	list-style-type:none;
	padding-left:10px;
	}
.fvrt{
	background: #C66;
	float:right;
	}
	.fvrt span{
		background: #333;
	padding:1px;
	font-weight:900;
	color:#FFF;
		}
	.fvrt strong{
		padding-left:10px;
		color:#FFF;
		padding-right:10px;
		}

.blogleft{
	float:right;
	width:23%;
	margin-top:15px;
	}		

</style>

    <div id="content-area">
    	<div class="container">
        
<div name="body" style="float: left; width: 75%"> 

  <?php  if($query):foreach($query as $post):?>
	<table width="100%">
    <tr>
    <td width="70%">
      	<h3><?php echo $post->entry_name;?> </h3>
	</td>
    <td width="30%">
      	<div class="fvrt"><span>&nbsp;+ </span><strong>Add to Favourites</strong></div>
	</td>
    </tr>
    </table>
  <hr />
  
  <div class=""  style="float:left; width:75%; text-align:justify;">
  
  <img src="<?php echo base_url()."assets/blog/feature/".$post->feature_img;;?>"  class="img img-rounded" width="50%" style="float:left; margin-right:15px; margin-top:10px;" />
  <p><?php echo $post->entry_body;?></p>&nbsp;
  <?php endforeach; else:?>
  <h4>No entry yet!</h4>
  <?php endif;?>
  <!--comment section -->
  <div style=" clear:both;"></div>
  
  </div>
  
  <div class="blogleft">
      <img src="http://www.serviceontheweb.co.uk//components/com_easyblog/assets/images/default_blogger.png" width="50%" /><br />
      <strong>By:</strong> name<br />
      <strong>Posted:</strong> <?php echo $post->entry_date;?><br />
      <strong>Categories:</strong> indichef main<br />
      <strong>5</strong> comments<br />
      
      <hr />
      
        <strong>1-2 hours</strong><br />
        <small>preparation time</small><br /><br />
        
        <strong>10 to 30 mins</strong><br />
        <small>cooking time</small><br /><br />
        
        <strong>Serves 4</strong><br />
        <br />
       <img src="http://i.stack.imgur.com/3DVje.png" width="100%" />
        <br />
		<div class="sociallink">
          <ul>
            <li>Print version</li>
            <li>Shopping list</li>
            <li>Send to a mobile</li>
          </ul>
        </div>
          <div class="sociallink">
              <h3>Follow us on</h3>
              <ul>
                <li>facebook</li>
                <li>twitter</li>
                <li>Linkedin</li>
                <li>youtube</li>
              </ul>
          </div>
  
  </div>
<br /><div style=" clear:both;"></div>
<h3>Related Post</h3>

  <?php  if($query):foreach($query as $post):?>
  <img src="<?php echo base_url()."assets/blog/feature/".$post->feature_img;;?>"  class="img img-rounded" width="65" style="float:left; margin-right:15px;" />
  <a href="#"><h4><?php echo $post->entry_name;?> </h4></a>
    <p>| Posted: <?php echo $post->entry_date;?> | Categories: indichef main | 5 comments |</p>
    <?php endforeach; else:?>
  <h4>No entry yet!</h4>
  <?php endif;?>

  
  
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

