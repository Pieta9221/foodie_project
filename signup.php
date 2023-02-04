<?php
  require 'includes/connection.php';
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
					$insert = "INSERT INTO users (username, email, phone, pword, address, userid) VALUES ('$username', '$email', '$phone', '$pword3', '$address', '$userid')";
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
include ('includes/header.php');
?>


	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>New to fodie?</p>
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
include ('includes/footer.php');
?>