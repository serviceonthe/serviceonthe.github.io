<script type="text/javascript">
  $(document).ready(function() {


          /* $(".item-category ul li a").each(function(){
                if($(this).val()=== $( "#category_name" ).val()){
                	$(this).addClass("active");
                }
                else{
                	$(this).removeClass("active");
                }
           });
           item_add_cart*/
  		    var category_id = 1; 
    		var category_name = 'APPETISER';
    		$("#res_menu").load("<?php echo base_url(); ?>order/get_res_menu",  {category_id: category_id,  category_name: category_name});
    		$('#category_name').html(category_name);

    		$('.btn-cat').removeClass('active');
    		$( ".btn-cat" ).first().addClass('active');


		$('.btn-cat').click(function(){
			var category_id = $(this).attr('data-catid');
			var category_name = $(this).html();
			$('.btn-cat').removeClass('active');
			$(this).addClass('active');


			$('#category_name').html(category_name);
			$("#res_menu").load("<?php echo base_url(); ?>order/get_res_menu",  {category_id: category_id, category_name: category_name});
		});

  });
</script>

<script>
	$(document).ready(function() {
		$('.large-3, .large-6, .large-3')
			.theiaStickySidebar({
				additionalMarginTop: 65
			});
	});
</script>


<section>
	<div class="row">
		<div class="large-3 columns">
			<h2 class="subheadings">Category</h2>
			<div class="item-category">
				<?php if($categories): ?>
					<ul>
						<?php foreach ($categories as $key => $category):?>
							<li>
								<!-- <a href="<?php echo site_url('order/category_item/'.$category['catagory_id']); ?>"><?php echo $category['catagory_name']; ?></a> -->
								<a class="selectCategory btn-cat" data-catid="<?php echo $category['catagory_id'];?>" style='width:100%; margin-bottom:3px; cursor:pointer;'><?php echo $category['catagory_name'];?> </i></a>
 
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>

		<div class="large-6 columns">
		    <h2 class="subheadings" id="category_name"></h2>
			<div id="item_list">
				<div id="res_menu"></div>
			</div>
		</div>


		<div class="large-3 columns">
			<div class="floating">

				<div id="cart_header"></div>

				<div class="menu_cart">
						<div id="item_cart_data_for_menu"></div>  

						<div id="cart-items">
							<div id="cart_view"></div>
						</div>
				</div>			

			</div>
		</div>
	</div>
</section>