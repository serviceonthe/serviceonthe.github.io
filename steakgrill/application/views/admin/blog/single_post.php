<!--Banner Start-->
  <section id="banner" class="height">
<!--      <div class="contact-banner"><img src="<?php echo base_url(); ?>assets/images/inner-banner-3.jpg" alt="img"></div>-->
  </section>
  <!--Banner End--> 
  
  <!--Content Area Start-->
  <section id="content" class="container"> 
    <!--Blog Page Section Start-->
    <section class="blog-page-section">
      <div class="row-fluid">
        <div class="span12">
          <div class="heading">
            <h1>Blog</h1>
          </div>
        </div>
        <!--Blog Post End-->
        <div class="row-fluid">
          <div class="span8">
            <div class="post-box-outer">
              <ul>
                    <?php  if($query):foreach($query as $post):  
                        $string = $query[0]->entry_date;
                        $timestamp = strtotime($string);
                      ?>
                <li>
                  <div class="post-box">
                    <div class="post-frame"> <img src="<?php echo base_url()."assets/blog/feature/".$post->feature_img;?>" alt="img">
                      <div class="post-date"> <span class="camera"></span> <strong class="date"><?php echo date("d-m-y", $timestamp); ?></strong> </div>
                    </div>
                    <div class="post-detail">
                      <h2><?php echo $post->entry_name;?></h2>
                      <ul>
                        <li class="admin">Admin</li>
                        <li class="view"><?php echo $post->total_hit;?> Views</li>
                        <li class="comment">100 Comments</li>
<!--                        <li class="web"><a class="none" id="none" href="<?php echo base_url().'blog/categorypost/'.$post->category_id;?>" ><?php echo $post->category_name;?></a></li>-->
                      </ul>
                    </div>
                    <p><?php echo $post->entry_body;?></p>
                  </div>
                </li>
                  <?php endforeach; else:?>
  <h4>No entry yet!</h4>
  <?php endif;?>
              </ul>
            </div>
            <div class="comment-box">
              <div class="comment-row"><strong class="comment"></strong> <a href="#" class="add-comment">Add a comment</a> </div>
              <div class="comments">
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
    <form action="<?php echo site_url()."post-view/".$this->uri->segment(2);  ?>" class="comment-form" method="post">
    <table width="100%" border="0">


      <tr>
        <td><label>
          <textarea  name="comment" id="rjs" cols="10" rows="10" placeholder="Enter Your Comment" class="form-control"><?php echo set_value('comment');?></textarea>
        </label></td>
      </tr>
            <tr>
        <td>
          <label>
            <input type="submit" name="button" id="button" value="Post Comment" class="btn-submit2" >
          </label></td>
      </tr>
    </table>
    <input type="hidden" name="post_id" value="<?php echo $this->uri->segment(2);  ?>" />
    <?php echo form_close();?>
<?php
                                }
                                }
                                ?>
                <ul>
                  <!--FIRST LEVEL COMMENTS START-->
                  
<!--                  <li>
                    <div class="text-outer">
                      <div class="text">
                          <div class="comment-frame"><img src="<?php echo base_url(); ?>assets/images/empty-img.gif" alt="img"></div>
                        <p>Volutpat viverra bibendum non, lacinia lacinia tortor. Curabitur pulvinar sodales mi eget pulvinar. Nullam vulputate lectus varius elit egestas sed semper arcu lobortis. </p>
                      </div>
                      <strong class="title">Written by <span class="red">Russel Croon,</span> <span class="small">November 6th, 2012 at 7:13 pm</span></strong> <a href="#" class="reply">reply</a> </div>
                    SECOND LEVEL COMMENTS START
                    <ul>
                      <li>
                        <div class="text-outer">
                          <div class="text">
                            <div class="comment-frame"><img src="images/empty-img.gif" alt="img"></div>
                            <p>Volutpat viverra bibendum non, lacinia lacinia tortor. Curabitur pulvinar sodales mi eget pulvinar. Nullam vulputate lectus varius elit egestas sed semper arcu lobortis. </p>
                          </div>
                          <strong class="title">Written by <span class="red">Russel Croon,</span> <span class="small">November 6th, 2012 at 7:13 pm</span></strong> <a href="#" class="reply">reply</a> </div>
                      </li>
                    </ul>
                    SECOND LEVEL COMMENTS END 
                  </li>-->
                </ul>
              </div>
<!--              <form action="#" class="comment-form">
                <div class="comment-row">
                  <h4>Leave a Comment</h4>
                  <strong class="marked">Required fields are marked <span class="red">*</span></strong></div>
                <input name="" type="text" class="no-margin" placeholder="Name*" >
                <input name="" type="text" placeholder="E-mail*">
                <input name="" type="text" placeholder="Website*">
                <textarea name="" cols="10" rows="10" placeholder="Comments*"></textarea>
                <button class="btn-submit2">Submit</button>
              </form>-->
            </div>
          </div>
          <!--Blog Post End--> 
          <!--Widget Area Start-->
          <div class="span4">
            <div class="widget-area">
              <ul>
                <li>
                  <div class="header">
                    <h2>Search our site</h2>
                  </div>
                  <div class="unique-box">
                    <form action="#" class="widget-form">
                      <div class="form-group">
                        <input name="" type="text" placeholder="Search..." class="widget-input">
                        <input name="" type="submit" value="" class="btn-search">
                      </div>
                    </form>
                  </div>
                </li>
                <li>
                  <div class="header">
                    <h2>Category Blog</h2>
                    <span class="icon-5"></span> </div>
                  <div class="unique-box">
                    <div class="tweets-box">
                      <ul>
                          <?php foreach ($all_category as $allcategory)
                 {?>
                    <li><div class="tweets-text"><a href="<?php echo base_url()?>blog/categorypost/<?php echo $allcategory->category_id;?>"><?php echo $allcategory->category_name;?></a></div></li>
                <?php
                 }
                ?>
                      </ul>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="header">
                    <h2>Latest Blog</h2>
                    <span class="icon-5"></span> </div>
                  <div class="unique-box">
                    <div class="tweets-box">
                      <ul>
                          <?php foreach ($recent_post as $allpost)
                            {?>
                               <li><div class="tweets-text"><a href="<?php echo base_url()?>post-view/<?php echo $allpost->entry_id;?>"><?php echo $allpost->entry_name;?></a></div></li>
                           <?php
                            }
                           ?> 
                        
                      </ul>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="header">
                    <h2>Recent Post</h2>
                    <span class="icon-5"></span> </div>
                  <div class="unique-box">
                    <div class="tweets-box">
                      <ul>
                         <?php  if($query){
                          $i=1;
                          foreach($query as $post){ 
                              if($i<10){
                            $string = $post->entry_date;
                            $timestamp = strtotime($string); 
                            ?> 
                    <li>
                        <a href="<?php echo base_url(); ?>post-view/<?php echo $post->entry_id;?>" >
                      <div class="recent-post-box"> <strong class="date-area"> <span class="mnt"><?php echo date("m", $timestamp); ?></span> <span class="date"><?php echo date("d", $timestamp); ?></span> <span class="year"><?php echo date("y", $timestamp); ?></span> </strong>
                        <div class="recent-post-frame"><img style="width:90px; height: 60px;" src="<?php echo base_url(); ?>assets/blog/feature/<?php echo $post->feature_img;?>" alt="img"></div>
                      </div>
                      <div class="recent-post-text"> <strong class="title"><?php echo $post->entry_name;?></strong> </div>
                    </a>
                        </li>
                      <?php  $i++;}else{break;} }} ?>
                        
                      </ul>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="header">
                    <h2>Most Popular Blog</h2>
                    <span class="icon-1"></span></div>
                  <div class="unique-box">
                    <div class="recepie-box">
                      <div class="recepie-frame"><img src="<?php echo base_url(); ?>assets/images/recepie-img1.jpg" alt="img"></div>
                      <div class="text-box"> <strong class="intro"><span class="red">Ingredients:</span> Lorem ipsum dolor sit amet, consectetur acing elit. Curabitur consequat metus a elittincidunt, a eleifend libero pellentesque.</strong> </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!--Widget Area End--> 
        </div>
      </div>
    </section>
    <!--Blog Page Section End--> 
  </section>
  <!--Content Area End--> 
