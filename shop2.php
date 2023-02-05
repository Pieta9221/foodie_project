<?php
include ('header.php');
?>
	
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

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
        <?php
        require 'connection.php';
        $config = new mysqli ($host, $user, $pwd, $database);
        
        $sql = "SELECT * FROM FOOD WHERE options = 'ENABLE' ORDER BY F_ID";
        $res2 = $config->query($sql);
        
        if ($res2->num_rows> 0){
          
        
          while($row = $result2 -> fetch_array()){
          
        
        ?>
        
                
			<div class="row product-lists">
        <form method="post" action="cart.php?action=add&id=<?php echo $row["F_ID"]; ?>">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<img src="<?php echo $row["images_path"]; ?>"  alt=""></a>
						</div>
						<h3><?php echo $row["name"]; ?></h3>
						<p class="product-price"><span>Per Serving</span> &#8358; <?php echo $row["price"]; ?></p>
            <small>Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </small>
						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
            <input type="hidden" name="hidden_RID" value="<?php echo $row["R_ID"]; ?>">
            <button type="submit"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
            
					</div>

				</div>
        </form>
        </div>	
      <?php
          }
        }
          ?>
	</div>
  


</div>
</div>

	<!-- end products -->

	
		<!-- footer -->
		<?php
include ('footer.php');
?>