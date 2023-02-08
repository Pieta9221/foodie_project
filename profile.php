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

	<style>
		.adminimg{
			height:150px;
			width:150px;
			border-radius:500px;
			border: 0px solid;
			margin-bottom:30px;
		}
	</style>

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
						<p>welcome back</p>
						<h1><?php echo $row['username']; ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
                <div class="col-lg-4">
					<div class="contact-form-wrap">
					<div class="contact-form-box">
						<?php echo "<div><img src="."assets/img/".$row['pic']." class='adminimg'/></div>"; ?>
						<h4> <i class="far fa-user"></i>User Information</h4>
						<p>Username: <?php echo $row['username']?>  <br>  ID: <?php echo $row['userid']?>  </p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i>Contact</h4>
							<p>Phone: <?php echo $row['phone']?>  <br> Email: <?php echo $row['email']?> <br> Address: <?php echo $row['address']?> </p>
						</div>
					</div>
				</div>
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Profile</h2>
						
						</div>
				 	<div id="form_status"></div>
					<div class="add-form">
						<form method="POST" >
						<a href="cart.php">
								<div  class="abc"> <i class="fas fa-shopping-cart"></i> &nbsp;Cart  (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>) </div>
            </a>
						<a href="wallet.php">
								<div  class="abc"> <i class="fas fa-wallet"></i> &nbsp;Wallet</div>
            </a>
						<a href="userorder.php">
								<div  class="abc"> <i class="fas fa-shopping-bag"></i> &nbsp;Order History</div>
            </a>
						<a href="edituser.php">
								<div  class="abc"> <i class="far fa-user"></i> &nbsp;Edit Profile</div>
            </a>
							<a href="edituserpassword.php">
              <div class="abc"> <i class="fas fa-unlock"></i> &nbsp;Edit Password</div>
           </a>
													
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
			<!-- footer -->
			<?php
include ('footer.php');
?>
