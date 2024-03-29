<?php
  require 'connection.php';
	$config = new mysqli ($host, $user, $pwd, $database);
  $error='';
	if(isset($_POST['submit'])){
		
			$username = $_POST['username'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$pword = $_POST['pword'];
			$pword2 = $_POST['pword2'];
			$pword3 = md5($pword);
			$userid = "USER".(rand(99,1000));
			$pic = "upic/profile.png";
			$wallet = 0;
			
			if($pword != $pword2){
				$error = "$username, the passwords do not match!";
				
			}else{
				$query = "SELECT * FROM users WHERE username = '$username'";
				$res = $config->query($query);
				if ($res->num_rows>0){
					$error = "Username already in use";
					
				} else{
					$query2 = "SELECT * FROM users WHERE email = '$email'";
					$res2 = $config->query($query2);
				if ($res->num_rows>0){
					$error = "Email address already in use";
					
				} else{
					$insert = "INSERT INTO users (username, email, phone, pword, address, userid, pic, wallet) VALUES ('$username', '$email', '$phone', '$pword3', '$address', '$userid', '$pic', '$wallet')";
					if($config->query($insert)===TRUE){
						echo "<script> alert('$username, you have successfully registered') </script>";
						include('signin.php');
					} else{
						$error = "Ooops! Problem with registration, try again";
					}
				}
				}
			} 
	}
		
 
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
								<li>
									<div class="header-icons">
										<a class="<?php echo str_ends_with($url, '/signin.php') ? 'current-list-item' : '' ?>" href="signin.php"><i class="fas fa-user"></i> Sign In</a>
										</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->



	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>New to foodie?</p>
						<h1>Sign Up</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Sign Up</h2>
						<p class="error"><?php echo $error;  ?></p>
						</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="POST" >
							<p>
								<input type="text" placeholder="Username" name="username" id="email" required/>
								<input type="email" placeholder="Email" name="email" id="email" required/>
							</p>
							<p>
								<input type="tel" placeholder="Phone" name="phone" id="phone">
								<input type="text" placeholder="Address" name="address" id="phone" required/>
								
							</p>
             
              <p>
								<input type="password" placeholder="Password" name="pword" id="phone" required/>
								<input type="password" placeholder="Confirm Password" name="pword2" id="phone" required/>
								
							</p>
							
							<p><input type="submit" name="submit" value="Sign Up"></p>
              <p>New to Foodie? <a href="signin.php" class="link"><span >Sign In</span></a></p>
						
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4><i class="fas fa-map"></i> Shop Address</h4>
							<p>105, Zik Avenue <br> Awka, Anambra State. <br> Nigeria</p>
						</div>
						<div class="contact-form-box">
							<h4><i class="far fa-clock"></i> Shop Hours</h4>
							<p>MON - FRIDAY: 8 AM to 9 PM <br> SAT - SUN: 10 AM to 8 PM </p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i> Contact</h4>
							<p>Phone: +234 907 305 2697 <br> Email: support@foodie.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->

	
	<!-- footer -->
	<?php
include ('footer.php');
?>