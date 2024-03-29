<?php
session_start();
require 'connection.php';
$config = new mysqli ($host, $user, $pwd, $database);

if(!isset($_SESSION['user'])){
header("location: signin.php"); 
}

?> 
<?php
$email = $_SESSION['user']; 
$query3  = "SELECT * FROM users WHERE email = '$email'";
$res3 = $config->query($query3);
$row = $res3->fetch_array();
?>
<?php
  $url = $_SERVER['PHP_SELF'];
?>




<?php


if(isset($_POST["add"]))
{
if(isset($_SESSION["cart"]))
{
$item_array_id = array_column($_SESSION["cart"], "menuid");
if(!in_array($_GET["menuid"], $item_array_id))
{
$count = count($_SESSION["cart"]);

$item_array = array(
'menuid' => $_GET["menuid"],
'food_name' => $_POST["hidden_name"],
'food_price' => $_POST["hidden_price"],
'userid' => $_POST["hidden_userid"],
'food_quantity' => $_POST["quantity"]
);
$_SESSION["cart"][$count] = $item_array;
echo '<script>window.location="cart.php"</script>';
}
else
{
echo '<script>alert("Food already added to cart")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
else
{
$item_array = array(
'menuid' => $_GET["menuid"],
'food_name' => $_POST["hidden_name"],
'food_price' => $_POST["hidden_price"],
'userid' => $_POST["hidden_userid"],
'food_quantity' => $_POST["quantity"]
);
$_SESSION["cart"][0] = $item_array;
}
}
if(isset($_GET["action"]))
{
if($_GET["action"] == "delete")
{
foreach($_SESSION["cart"] as $keys => $values)
{
if($values["menuid"] == $_GET["menuid"])
{
unset($_SESSION["cart"][$keys]);
echo '<script>alert("Food has been removed")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
}
}

if(isset($_GET["action"]))
{
if($_GET["action"] == "empty")
{
foreach($_SESSION["cart"] as $keys => $values)
{

unset($_SESSION["cart"]);
echo '<script>alert("Cart is made empty!")</script>';
echo '<script>window.location="cart.php"</script>';

}
}
}


?>
<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Foodie</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.php">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

								<!-- menu start -->
                <nav class="main-menu">
							<ul>
              <li><a href="index.php" class="<?php echo str_ends_with($url, '/index.php') ? 'current-list-item' : '' ?>"> Home</a></li>
        			<li><a href="about.php" class="<?php echo str_ends_with($url, '/about.php') ? 'current-list-item' : '' ?>"> <span>About</span></a></li>
              <li><a href="contact.php" class="<?php echo str_ends_with($url, '/contact.php') ? 'current-list-item' : '' ?>"> Contact</a></li>
              <li><a href="shop.php" class="<?php echo str_ends_with($url, '/shop.php') ? 'current-list-item' : '' ?>"> Shop</a></li>
								
								</li>
								<?php
if(isset($_SESSION['user'])){

?><li><a href="profile.php" class="<?php echo str_ends_with($url, '/profile.php') ? 'current-list-item' : '' ?>"> Profile</a></li>
								
</li>
								<li>
									<div class="header-icons">
										
										<a class="<?php echo str_ends_with($url, '/logout.php') ? 'current-list-item' : '' ?>" href="logout.php"><i class="fas fa-power-off"></i> Logout</a>
										</div>
								</li>
							</ul><?php
}?>
						</nav>
												<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>fill your cart with amazing treats</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<?php
if(!empty($_SESSION["cart"]))
{
  ?>
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
                  
									<th class="product-name">Menu Name</th>
									<th class="product-name">Quantity</th>
									<th class="product-name">Price</th>
									<th class="product-name">Total</th>
									<th class="product-remove"></th>
									
									
								</tr>
							</thead>
							<tbody>
                <?php
               $total = 0;
				foreach($_SESSION["cart"] as $keys => $values)
				{
				?>
							
                    <tr class='table-body-row'>
                  	
                  <td class='product-name'><?php echo $values["food_name"]; ?></td>
				<td class='product-name'><?php echo $values["food_quantity"]; ?></td>
				<td class='product-name'>  &#8358; <?php echo number_format($values["food_price"], 2); ?></td>
				<td class='product-name'>  &#8358; <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>
				<td class='product-remove'><a href='cart.php?action=delete&menuid=<?php echo $values["menuid"]; ?>'><i class='far fa-window-close'></i></a></td>
				</tr>
				<?php 
				$total = $total + ($values["food_quantity"] * $values["food_price"]);
				}
				?>
				</tr>
				</tbody>
                   
					
                   
									
                  </tr>
              
								
							</tbody>
						</table>
            <div class="cart-buttons">
				<?php echo "<a href='cart.php?action=empty' class='boxed-btn'></i> Empty Cart</a></td>"; ?>

				<?php echo "<a href='shop2.php?userid=".$values['userid']." ' class='boxed-btn'>Continue Shopping</a></td>"; ?>

				
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
							
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>&#8358;<?php echo number_format($total, 2); ?> </td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							
					<?php echo "<a href='payment.php' class='boxed-btn'></i> Checkout</a></td>"; ?>		
					</div>
					</div>

					
				</div>
			</div>
		</div>
	</div>
	<?php
}
if(empty($_SESSION["cart"]))
{
  ?>
  <div class="container">
      <div class="jumbotron">
        <h1>Your Shopping Cart</h1>
        <p>Oops! We can't smell any food here. Go back and <a href="shop.php" class="link">Order now.</a></p>
        
      </div>
      
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
}
?>
	<!-- end cart -->

			<!-- footer -->
			<?php
include ('footer.php');
?>
