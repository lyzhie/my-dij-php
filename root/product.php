<?php 
if (!isset($_GET['product'])) {
	header("Location: index.php"); 
}

include 'includes/header.php';?>
<div class="container clearfix">
<?php 
$result = $mysqli->query(
	"SELECT product.*, category.category_name FROM product LEFT JOIN category ON product.category = category.id WHERE product.id=".$_GET['product']);
if($mysqli->errno) die($mysqli->error);

$product_data = array();
while ($row = $result->fetch_object()) {
	# code...
	$product_data[] = $row;
}


 ?>
	<h2><?php echo $product_data[0]->name; ?></h2>
	<ul class="breadCrumb clearfix">
		<li><a href="index.php">Home</a></li>
		<?php echo "<li><a href='index.php?category={$product_data[0]->category}'>{$product_data[0]->category_name}</a></li>"; ?>
		
		<li><?php echo $product_data[0]->name; ?></li>
	</ul>
	<div class="info row clearfix">
		<div class="column col-8 col-md-12">
			<div class="productImg"><img src="images/test.jpg" alt="#"></div>
			<div class="box-center">
				<ul class="thumbnail clearfix">
				<?php 
					$images = explode(",", $product_data[0]->pic);

					for ($i=0; $i < count($images); $i++) { 
						echo "<li><img src='images/{$images[$i]}' alt='{$images[$i]}''></li>";

					}
				?>
					<!-- <li class="actived"><a href="#"><img src="images/test.jpg" alt="#"></a></li>
					<li><a href="#"><img src="images/test.jpg" alt="#"></a></li>
					<li><a href="#"><img src="images/test.jpg" alt="#"></a></li> -->
				</ul>
			</div>
		</div>
		<div class="productInfo column col-4 col-md-12">
			<h2><?php echo $product_data[0]->name; ?></h2>
			<p class="price">$<?php echo $product_data[0]->price; ?></p>
			<ul>
				<?php 
					$intro = explode(";", $product_data[0]->introduction);

					for ($i=0; $i < count($intro); $i++) { 
						echo "<li>{$intro[$i]}</<li>";
					}
				?>
				
			</ul>
		</div>
	</div>
	<div class="row clearfix cards">	
		<div class="column col-12 col-md-12">
			<h3>Overview</h3>
			<div>
				<h4>Ready to fly</h4>
				<p>Now you can shoot fully stabilized video from the sky, right out of the box.</p>
				<h4>3-Axis Camera Stabilization</h4>
				<p>A built-in high precision 3-axis camera stabilization system brings a whole new level of smoothness to your aerials and gives you total creative freedom in the sky.</p>
				<h4>Precision Flight and Stable Hovering</h4>
				<p>The integrated GPS auto-pilot system offers position holding, altitude lock and stable hovering, giving you constant smooth flight so you can focus on getting the shots you want.</p>
			</div>	
		</div>
	</div>

	<div class="row clearfix cards">	
		<div class="column col-12 col-md-12">
			<h3>Specifications</h3>
			<table>
				<tbody>
					<tr>
						<th rowspan="3">Aircraft</th>
						<td>Weight</td> 
						<td><?php echo "{$product_data[0]->weight}"; ?> g</td>
					</tr>
					<tr>
						<td>Diagonal Length</td>
						<td><?php echo "{$product_data[0]->diagonal_length}"; ?> mm</td>
					</tr>
					<tr>
						<td>Max Speed</td>
						<td><?php echo "{$product_data[0]->max_speed}"; ?> m/s</td>
					</tr>
					<tr>
						<th rowspan="3">Battery</th>
						<td>Battery Capacity</td> 
						<td><?php echo "{$product_data[0]->battery_capacity}"; ?> mAh</td>
					</tr>
					<tr>
						<td>Operating Temperature</td>
						<td><?php echo "{$product_data[0]->operating_temperature}"; ?></td>
					</tr>
					<tr>
						<td>Flight Time</td>
						<td><?php echo "{$product_data[0]->flight_time}"; ?> mins</td>
					</tr>
				</tbody>
			</table>	
		</div>
	</div>

	<div class="row clearfix cards">	
		<div class="column col-12 col-md-12">
			<h3>FAQ</h3>
			<div>
			<?php 
			// print_r($product_data[0]);
				$query = "SELECT faq.* FROM product_faq_relational 
				LEFT OUTER JOIN faq
				ON faq.id = product_faq_relational.faq_id 
				AND product_faq_relational.product_id = {$product_data[0]->id}
				ORDER BY faq.id";

				$result = $mysqli->query($query);

				while ($row = $result->fetch_object()) {
					echo "<h4>{$row->question}</h4>";
					echo "<p>{$row->answer}</p>";
				}
			 ?>
				<!-- <h4>Ready to fly</h4>
				<p>Now you can shoot fully stabilized video from the sky, right out of the box.</p>
				<h4>3-Axis Camera Stabilization</h4>
				<p>A built-in high precision 3-axis camera stabilization system brings a whole new level of smoothness to your aerials and gives you total creative freedom in the sky.</p>
				<h4>Precision Flight and Stable Hovering</h4>
				<p>The integrated GPS auto-pilot system offers position holding, altitude lock and stable hovering, giving you constant smooth flight so you can focus on getting the shots you want.</p> -->
			</div>	
		</div>
	</div>
</div>

<?php include 'includes/footer.php' ?>