<?php echo $this->Html->script(array('addtocart.js'), array('inline' => false)); ?>

<script>
	$( document ).ready(function() {

		function updateCart(){
			$.ajax({
				type: 'GET',
				url: '<?php echo $this->Html->url(array('plugin' => 'cake_shop', 'controller' => 'carts','action' => 'cartCount'),true);?>',
				success:function(data){
				    $('.cartData').html(data);
				},
				error:function(data){
				    $('.cartData').html("There was an error with the cart funciton. Please try again later.");
				},
				timeout: 2500
			});
		}

		updateCart(); 

		$('#addtocart').click(function(e){
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '<?php echo $this->Html->url(array('plugin' => 'cake_shop', 'controller' => 'carts','action' => 'add'),true);?>',
				data: $("#buyBox").serialize(),
				success:function(data){
				    $('.msg').html("Your item was successfully added to cart");
				    updateCart();
				},
				error:function(){
				    $('.msg').html("There was an error with the cart funciton. Please try again later.");
				},
				timeout: 5000
			});
			return false;
		});
	});

</script>
<div class="row">
	<!-- Look up google product format --> 
	<p class="msg"></p>
	<p class="cartData"></p>
	<h3><?php echo $product['Product']['name']; ?></h3>
	<div class="col col-sm-7">
		<?php echo $this->Html->Image('/img/small/' . $product['Product']['image'], array('alt' => $product['Product']['name'], 'class' => 'img-thumbnail img-responsive')); ?>
	</div>
	<div class="col col-sm-5">
	 	<span id="productprice">$<?php echo $product['Product']['price']; ?></span>
		<form id="buyBox">
			<input type="hidden" name="product_id" id="product_id" value="<?php echo $product['Product']['id']; ?>" />
			<label>Qty:</label><input type="number" min="0" value="1" id="qty" name="qty" /> 
			<input type="submit" value='Add to Cart' class="btn btn-primary addtocart" id='addtocart' />
		</form>
	</div>
	<div class="product-desc">
		<?php echo $product['Product']['description']; ?>
	</div>

	<ul>
		<li>Brand: <?php echo $this->Html->link($product['Brand']['name'], array('controller' => 'brands', 'action' => 'view', 'slug' => $product['Brand']['slug'])); ?></li>

		<li>Category: <?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', 'slug' => $product['Category']['slug'])); ?></li>
	</ul>
</div>
