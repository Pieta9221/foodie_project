<?php
include ('header.php');
?>
	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>mouthwatering meals fit for a king </p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Nearby</span> Restaurants</h3>
						<p>Select from a list of our available restaurants</p>
					</div>
				</div>
			</div>

			<div class="row">
			<?php
			require 'connection.php';
			$config = new mysqli ($host, $user, $pwd, $database);
			$query2  = "SELECT * FROM admindata WHERE status = 'Restaurant' ORDER BY username ASC";
                $result2 = $config->query($query2);
                if($result2->num_rows == 0){
                  echo "No restaurant currently available!";
                }else{
                  while($row = $result2 -> fetch_array()){?> 
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3><?php echo $row['username']?></h3>
						<p class="product-price"><span><?php echo $row['address']?></span></p>
						<?php echo "<a href='shop2.php?userid=".$row['userid']." ' class='cart-btn'><i class='fas fa-arrow-right'></i> Visit</a></td>"; ?>
					</div>
				</div>
			<?php
									}
		}
		?> 
				
			
	</div>
	
	
		<!-- footer -->
		<?php
include ('footer.php');
?>