
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
                      $string = $query[1]->entry_date;
                      $timestamp = strtotime($string);
                  ?>
                <li>
                  <div class="post-box">
                      
                    <div class="post-frame"> <a href="<?php echo base_url(); ?>index.php/post-view/<?php echo $post->entry_id;?>"> <img style="width: 770px; height: 306px; " src="<?php echo base_url()."assets/blog/feature/".$post->feature_img;?>" alt="img">
                        </a>
                      <div class="post-date"> <span class="camera"></span> <strong class="date"><?php echo date("d-m-y", $timestamp); ?></strong> </div>
                    </div>
                    <div class="post-detail">
                        <a href="<?php echo base_url(); ?>post-view/<?php echo $post->entry_id;?>"><h2><?php echo $post->entry_name;?></h2></a>
                      <ul>
                        <li class="admin">Admin</li>
                        <li class="view"><?php echo $post->total_hit;?> Views</li>
                        <li class="comment">100 Comments</li>
<!--                        <li class="web"><a class="none" id="none" href="<?php echo base_url().'blog/categorypost/'.$post->category_id;?>" ><?php echo $post->category_name;?></a></li>-->
                      </ul>
                    </div>
                    <p><?php echo substr($post->entry_body, 0, 500);?>....</p>
                    <a href="<?php echo base_url(); ?>post-view/<?php echo $post->entry_id;?>" class="btn btn-read">Read More</a> </div>
                </li>
                  <?php endforeach; else:?>
                  <h4>No entry yet!</h4>
                  <?php endif;?>
              </ul>
              <div class="pagination pagination-area">
                <ul>
<?php //echo $links? $links:0; ?>
                </ul>
              </div>
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