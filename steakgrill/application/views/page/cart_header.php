<span id="cart-i">
	<i class="fa fa-shopping-cart"></i>
	<span id="current_contain">
		<?php 
			$cart=$this->cart->contents();
			$qty=0;
			$price=0;
			foreach($cart as $c){
				$qty+=$c['qty'];
				$price+=$c['subtotal'];
			}
			if(count($cart)): ?>
			Cart (<?php echo $qty; ?>) items: &pound;<?php echo $price; ?>
		<?php else: ?>
			<span>Your cart is empty </span>
		<?php endif; ?>                  
	</span>
</span>