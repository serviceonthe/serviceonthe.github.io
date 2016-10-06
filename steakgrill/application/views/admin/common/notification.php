<?php if($notifications): ?>
	<?php if($notification_sound): ?>
		<script>
		    var siteurl="http://nawabskitchen.co.uk/assets/sound/";
		    $('<audio id="chatAudio"><source src="'+siteurl+'notify.ogg" type="audio/ogg"><source src="'+siteurl+'notify.mp3" type="audio/mpeg"><source src="'+siteurl+'notify.wav" type="audio/wav"></audio>').appendTo('body');
		    playnotification();
		    function playnotification(){
		        $('#chatAudio')[0].play();
		    }
		</script>
	<?php endif; ?>
		<span style='display:none' id="maxid"><?php echo $maxId; ?></span>
	<?php foreach ($notifications as $key => $value):?>
		<?php 
			if($value->type=='order'){
        $url='admin/dashboard/viewOrder/'.$value->order_id;
				$d='Order for food';
			}elseif($value->type=='reservation'){
        $url='admin/dashboard/view_reservation/'.$value->order_id;
				$d='Reserv for table';
			}else{
        $url='';
        $d=$value->type;
      }
		?>
		<a href="<?php echo site_url($url);?>">
			<div class="desc">
          	<div class="thumb">
          		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
          	</div>
          	<div class="details">
          		<p><muted><?php echo dateDifference($value->createAt,date('Y-m-d H:i:s')); ?> Ago</muted><br/>
          		   <!-- <a href=""> -->
          		   <span class='user_name'>
          		   		<?php echo $value->name; ?>
          		   </span>
          		   <span class="detail">
          		   		<?php echo $d; ?>.<br/>				                      		   	
          		   </span>
          		   <!-- </a>  -->
          		</p>
          	</div>
      	</div>
		</a>
  

  <!-- Second Action -->
  <!-- <div class="desc">
  	<div class="thumb">
  		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
  	</div>
  	<div class="details">
  		<p><muted>3 Hours Ago</muted><br/>
  		   <a href="#">Diana Kennedy</a> purchased a year subscription.<br/>
  		</p>
  	</div>
  </div> -->
	<?php endforeach; ?>
<?php else: ?>
	<div>No Notification.</div>
<?php endif; ?>