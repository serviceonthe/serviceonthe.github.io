    <div id="content-area">
    	<div class="container">
<div name="body" style="float: left; width: 70%"> 
    <div id="example">
  <?php  if($query):foreach($query as $post):?>
  <h4><?php echo $post->entry_name;?> (<?php echo $post->entry_date;?>)</h4>
  <?php echo substr($post->entry_body, 0, 200);?>&nbsp; <a href="<?php echo base_url()?>post-view/<?php echo $post->entry_id;?>" class="btn-danger">Read More</a>
  <hr>
      <?php endforeach; else:?>
  <h4>No entry yet!</h4>
  <?php endif;?>
  <div class="pagination"><?php echo $links? $links:0; ?></div>
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
  </div>
  
</div>
<div name="sidebar" style="float: right; width: 20%;">
    
    <h4>All Category</h4><hr>
    <ul>
     <?php foreach ($all_category as $allcategory)
     {?>
        <a href="<?php echo base_url()?>category-post/<?php echo $allcategory->category_id;?>"><li><?php echo $allcategory->category_name;?> </li></a>
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
