<?php
session_start();
  require 'connection.php';
	$config = new mysqli ($host, $user, $pwd, $database);
  $error='';
if(isset($_POST['submit'])){

	$email = $_POST['email'];
	$pword = $_POST['pword'];
	
	$pword3 = md5($pword);
	$query2 = "SELECT * FROM users WHERE email = '$email' AND pword = '$pword3'";
	$res2 = $config->query($query2);
	
	if($res2->num_rows === 1){
		$rows = $res2->fetch_array();
		$_SESSION['user'] = $rows['username'];
    header('location:cart.php');
		exit();
  }else{
		$error = "Invalid login details!";
	}
}
?>	

<?php
include ('header.php');
?>


	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Get Started</p>
						<h1>Sign In</h1>
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
						<h2>Sign In</h2>
						<p class="error"><?php echo $error;  ?></p>
						</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="POST" >
							<p>
								<input type="email" placeholder="Email" name="email" id="email" required/>
							</p>
							<p>
								<input type="password" placeholder="Password" name="pword" id="phone" required/>
								
							</p>
							
							
							<p><input type="submit" name="submit" value="Sign In"></p>

							<p>New to Foodie? <a href="signup.php" class="link"><span >Sign Up</span></a></p>
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