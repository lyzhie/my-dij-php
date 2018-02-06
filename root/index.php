<?php include 'includes/header.php';?>
<div class="banner">
	<ul class="bjqs">
		<li><img src="images/header.jpg" alt="#" title="#"></li>
		<li><img src="images/header.jpg" alt="#" title="#"></li>
		<li><img src="images/header.jpg" alt="#" title="#"></li>
	</ul>
</div>
<div class="container clearfix">	
	<h2>Products</h2>
	<div class="row">
			<?php  
				for ($i=0; $i < count($data); $i++) { 
					$images = explode(",", $data[$i]->pic);
					echo "<div class='column col-3 col-md-4 col-sm-12'><div class='sm-cards cards'>";
					echo "<div class='productImg'><a href='product.php?product={$data[$i]->id}'><img src='./images/{$images[0]}' alt='#'></a></div>";
					echo "<a href='product.php?product={$data[$i]->id}'><h3>{$data[$i]->name}</h3></a>";
					echo "<p class='price'>\${$data[$i]->price}</p></div></div>";	
				}
			?>
		<!-- <div class="column col-3 col-md-4 col-sm-12">
			<div class="sm-cards cards">
				<div class="productImg">
					<a href="#"><img src="images/test.jpg" alt="#"></a>
				</div>
				<a href="#"><h3>Phantom 2 Vision+</h3></a>
				<p class="price">$1299.00</p>
			</div>
		</div> -->
	</div>
</div>
<?php include 'includes/footer.php' ?>
