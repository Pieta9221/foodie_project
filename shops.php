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
$error='';
if(isset($_POST['submit'])){
  
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
		$pic = "pic/favicon.png";
    $status = "Restaurant";
    $userid = "RES".(rand(99,1000));
    $pword = $_POST['pword'];
    $pword3 = md5($pword);
    
    
    $query4 = "SELECT * FROM admindata WHERE email = '$email'";
    $res4 = $config->query($query4);
    if ($res4->num_rows>0){
    $error = "Email address already in use";
        
    } else{
    $insert = "INSERT INTO admindata (username, email, phone, address, pword, userid, status, pic) VALUES ('$username', '$email', '$phone', '$address', '$pword3', '$userid', '$status', $pic)";
    if($config->query($insert)===TRUE){
          echo "<script> alert('$username, successfully added') </script>";
         
        } else{
          $error = "Ooops! Problem with registration, try again";
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
          <p>find restaurant information</p>
						<h1>Restaurants</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									
                  <th class="product-name">ID</th>
									<th class="product-name">Restaurant Name</th>
									<th class="product-name">Email</th>
									<th class="product-name">Phone</th>
									<th class="product-name">Address</th>
									
								</tr>
							</thead>
							<tbody>
                <?php
                $query2  = "SELECT * FROM admindata WHERE status='Restaurant' ORDER BY username ASC";
                $result2 = $config->query($query2);
                if($result2->num_rows == 0){
									echo "<tr class='table-body-row'>";
                  echo "Data not found";
									echo "</tr>";
                }else{
                  while($row = $result2 -> fetch_array()){
                    echo "<tr class='table-body-row'>";
                    echo "<td class='product-name'>".$row['userid']."</td>";
                    echo "<td class='product-name'>".$row['username']."</td>";
                    echo "<td class='product-name'>".$row['email']."</td>";
                    echo "<td class='product-name'>".$row['phone']."</td>";
                    echo "<td class='product-name'>".$row['address']."</td>";
									
                  echo "</tr>";
                }
                }
                ?>   
								
							</tbody>
						</table>
					</div>
				</div>


        <div class="col-lg-4">
          
        
					  <div class="form-title">
						<h2>Add New</h2>
						<p class="error"><?php echo $error;  ?></p>
						</div>
				 	  <div class="add-form">
						<form method="POST" >
              <p>
								<input type="text" placeholder="Restaurant Name" name="username" id="email" required/>
							</p>
							<p>
								<input type="text" placeholder="Restaurant Address" name="address" id="email" required/>
							</p>
							<p>
								<input type="tel" placeholder="Restaurant Phone Number" name="phone" id="email" required/>
							</p>
							<p>
								<input type="email" placeholder="Email" name="email" id="email" required/>
							</p>
							<p>
								<input type="password"  placeholder="Password" name="pword" id="phone" required/>
								
							</p>
							
							
							<p><input type="submit" name="submit" value="Add"></p>

							
						</form>
					</div>
				  
				


			</div>
		</div>
	</div>
	<!-- end cart -->

			<!-- footer -->
			<?php
include ('copyright.php');
?>
