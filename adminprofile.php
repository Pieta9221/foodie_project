<?php
session_start();
require 'connection.php';
$config = new mysqli ($host, $user, $pwd, $database);

if(!isset($_SESSION['admin'])){
header("location: signin.php"); 
}

?> 
<?php
$email = $_SESSION['admin']; 
$query3  = "SELECT * FROM admindata WHERE email = '$email'";
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
							<li><a href="adminprofile.php" class="<?php echo str_ends_with($url, '/adminprofile.php') ? 'current-list-item' : '' ?>"> Profile</a></li>
              <li><a href="admin.php" class="<?php echo str_ends_with($url, '/admin.php') ? 'current-list-item' : '' ?>"> Admins</a></li>
              <?php
              if($row['status']=="Admin"){?>
        			<li><a href="users.php" class="<?php echo str_ends_with($url, '/users.php') ? 'current-list-item' : '' ?>"> <span>Users</span></a></li>
              <li><a href="shops.php" class="<?php echo str_ends_with($url, '/shops.php') ? 'current-list-item' : '' ?>"> Shops</a></li>
							
              <?php   
              }else { ?>
                <li><a href="menu.php" class="<?php echo str_ends_with($url, '/menu.php') ? 'current-list-item' : '' ?>"> <span>Menu</span></a></li><?php
              }
              ?>
              <li><a href="orders.php" class="<?php echo str_ends_with($url, '/orders.php') ? 'current-list-item' : '' ?>"> Orders</a></li>
              
								</li>
								<li>
									<div class="header-icons">
										<a class="<?php echo str_ends_with($url, '/logout.php') ? 'current-list-item' : '' ?>" href="logout.php"><i class="fas fa-power-off"></i> Logout</a>
										</div>
								</li>
							</ul>
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
				
				<div class="col-lg-6">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4> <i class="far fa-user"></i>Admin Information</h4>
							<p>Username: <?php echo $row['username']?>  <br>  ID: <?php echo $row['userid']?>  </p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i>Contact</h4>
							<p>Phone: <?php echo $row['phone']?>  <br> Email: <?php echo $row['email']?> <br> Address: <?php echo $row['address']?> </p>
						</div>
					</div>
				</div>

        <div class="col-lg-6">
        <div class="form-title">
						<h2>Settings</h2>
						
						</div>
				 	  <div class="add-form">
						<a href="editadmin.php">
								<div  class="abc"> <i class="far fa-user"></i> Edit Profile</div>
            </a>
							<a href="editadminpassword.php">
              <div class="abc"> <i class="fas fa-unlock"></i> Edit Password</div>
           </a>
							

							
						</form>
				</div>

          
			</div>
		</div>
	</div>
			<!-- footer -->
			<?php
include ('copyright.php');
?>
