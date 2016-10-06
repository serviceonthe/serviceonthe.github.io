<!--main content start-->
<section id="main-content">
    <section class="wrapper">
          <!-- BASIC FORM ELELEMNTS -->
      	<div class="row mt">
          	<div class="col-lg-12">
              	<div class="form-panel">
                  	<h3 class="panel-title"><i class="fa fa-plus-circle"></i>Edit Review</h3>
              	</div>
              	<div class="form-panel">
              		<?php echo form_open(); ?>					
    						  <!-- <div class="form-group">
    					      	<label for="name">Name:</label>
    					      	<input readonly type="text" name="name" value="<?php echo $review_data['first_name'].' '.$review_data['last_name']; ?>" class="form-control" id="name"/>
    					    </div> -->
    					    <div class="form-group">
    					      	<label for="review_massage">Review Massage:</label>
    					      	<textarea class="form-control ckeditor" name="review_massage" cols="30" rows="10"><?php echo $review_data['review_massage']; ?></textarea>
    					    </div>
					        <button type="submit" class="btn btn-default">Update</button>
					       <?php echo form_close(); ?>
              	</div>
            </div>
        </div>
    </section>
</section>