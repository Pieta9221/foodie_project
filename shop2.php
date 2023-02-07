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
						<h3><span class="orange-text">Available</span> Menu</h3>
						<p>Select from a list of our available menu</p>
					</div>
				</div>
			</div>

			<div class="row">
			<?php
			require 'connection.php';

			$config = new mysqli ($host, $user, $pwd, $database);
			if(isset($_GET['userid'])){
				$userid = $_GET['userid'];
				$query2  = "SELECT * FROM menu WHERE userid = '$userid' ORDER BY name ASC";
                $result2 = $config->query($query2);
                if($result2->num_rows == 0){
                  echo "No restaurant currently available!";
                }else{
                  while($row = $result2 -> fetch_array()){?> 
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<form method ="POST" action="cart.php?action=add&id=<?php echo $row["menuid"]; ?>">
						<div class="product-image">
						<?php echo "<a href='#'><img src="."assets/img/".$row['pic']."></a>"; ?></div>
						<h3><?php echo $row['name']?></h3>
						<p class="product-price">&#8358;<?php echo $row['price']?></p>
						<input type="number"  min="1" max="25" name="quantity" class="product-price" value="1" style="width: 60px;"> </h5>
						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
						<input type="hidden" name="hidden_menuid" value="<?php echo $row["menuid"]; ?>">
						<br>
						<button type="submit" class="cart-btn" ><i class='fas fa-shopping-cart'></i> Add to Cart</button>
						
					</div>
				</div>
			<?php
				}
		}
	}
	?> 
				
				</form>
	</div>
	
	
		<!-- footer -->
		<?php
include ('footer.php');
?>