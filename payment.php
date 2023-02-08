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
$wallet = $row['wallet'];
?>

<?php
  $url = $_SERVER['PHP_SELF'];
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
						<p>time to pay</p>
						<h1><?php echo $row['username']; ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

 <?php
$gtotal = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {

    $menuid = $values["menuid"];
    $foodname = $values["food_name"];
    $quantity = $values["food_quantity"];
    $price =  $values["food_price"];
    $total = ($values["food_quantity"] * $values["food_price"]);
    $userid = $values["userid"];
    $username = $row["username"];
    $orderdate = date('Y-m-d');
    
    $gtotal = $gtotal + $total;


 $query = "INSERT INTO orders (menuid, foodname, price, quantity, orderdate, username, userid) VALUES ('$menuid', '$foodname', '$price', '$quantity', '$orderdate', '$username', '$userid')";
    //          
//  $query = "INSERT INTO ORDERS (menuid, foodname, price,  quantity, orderdate, username, userid) 
//               VALUES ('" . $menuid . "','" . $foodname . "','" . $price . "','" . $quantity . "','" . $orderdate . "','" . $username . "','" . $userid . "')";

            $success = $config->query($query);
     if(!$success)
      {
        ?>
        <div class="container">
          <div class="jumbotron">
            <h1>Something went wrong!</h1>
            <p>Try again later.</p>
          </div>
        </div>

        <?php
      }
      
  }

        ?>
        <div class="container jumbotron">
					<div class="text-center" >
          <h2>Grand Total: &#8358; <?php echo number_format("$gtotal", 2); ?></h2>
					<h5>Including all service charges (no delivery charges applied)</h5>
					</div>
					<br>
					<div class="card-buttons">
					<a href="cart.php" class='boxed-btn'><i class='fas fa-arrow-left'></i> Back to cart</a>
                    <?php if($wallet < $gtotal){
                         echo "<a href='fundwallet.php' class='cart-btn'> <i class='fas fa-arrow-right'></i> Make Payment</a>"; 	
              
                    }else {
											
											$wallet2 = $wallet - $gtotal;?>
                        
										<form method ="POST">
						
									<input type="hidden" name="wallet2" value="<?php echo $wallet2; ?>">
								
									
									<button type="submit" name="deduct" class='cart-btn jooo'><i class='fas fa-arrow-right'></i> Make Payment</button>
								
									</form>
										</div>
										
						<?php
                    }
										$error = "";
										if(isset($_POST['deduct'])){
											$wallet2 = $_POST['wallet2'];
											
										 $edit = "UPDATE users SET wallet='$wallet2' WHERE email='$email'";
											
											if($config->query($edit)===TRUE){
												
												
												header("location:successful.php");
											} else{
												$error = "Ooops! Problem with payment";
											}
												}
									
									?> 	
				</div>
				</div>
        
				



<br><br><br><br><br><br>


			<?php
include ('footer.php');
?>
