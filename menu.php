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
$userid = $row['userid'];
?>
<?php
$error='';
if(isset($_POST['submit'])){
  
    $name = $_POST['name'];
    $price = $_POST['price'];
    $menuid = "MENU".(rand(99,1000));
    
    $photoname = $_FILES['pic']['name']; 
    $phototype = $_FILES['pic']['type'];
    $photosize = $_FILES['pic']['size'];
    $photoloc = $_FILES['pic']['tmp_name']; 
    move_uploaded_file($photoloc,"./assets/img/pic/".$photoname);
    $pic2 = "pic/".$photoname; 
  
      $check = explode(".",$photoname);
      $checkpath = strtolower(end($check));
      $arraytype = array("jpeg", "gif", "png", "jpg");
      
      if(in_array($checkpath, $arraytype) === FALSE){
        $error = "Please choose a valid image type like jpeg, gif, png, or jpg";
       
      }
      elseif($photosize > 5120000){
        $error = "Image size should not be more than 5MB";
          
      }
      else{
       
    $query4 = "SELECT * FROM menu WHERE menuid = '$menuid'";
    $res4 = $config->query($query4);
    if ($res4->num_rows>0){
    $error = "Menu already added";
        
    } else{
    $insert = "INSERT INTO menu (menuid, name, pic, price, userid) VALUES ('$menuid', '$name', '$pic2', '$price', '$userid')";
    if($config->query($insert)===TRUE){
          echo "<script> alert('$name, successfully added') </script>";
         
        } else{
          $error = "Ooops! Problem with adding $name";
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
              ?><li><a href="orders.php" class="<?php echo str_ends_with($url, '/orders.php') ? 'current-list-item' : '' ?>"> Orders</a></li>
              
								
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
						<p>find menu information</p>
						<h1>Menu</h1>
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
                  <th class="product-remove"></th>
									<th class="product-image">Menu Image</th>
									<th class="product-name">ID</th>
									<th class="product-name">Menu Name</th>
									<th class="product-name">Price</th>
									<th class="product-name">View</th>
									
									
								</tr>
							</thead>
							<tbody>
                <?php
                $query2  = "SELECT * FROM menu WHERE userid = '$userid' ORDER BY name ASC";
                $result2 = $config->query($query2);
                if($result2->num_rows == 0){
                  echo "Data not found";
                }else{
                  while($row = $result2 -> fetch_array()){
                    echo "<tr class='table-body-row'>";
                    echo "<td class='product-remove'><a href='#'><i class='far fa-window-close'></i></a></td>";
                    echo "<td class='product-image'><img src="."assets/img/".$row['pic']."></td>";
                    echo "<td class='product-name'>".$row['menuid']."</td>";
                    echo "<td class='product-name'>".$row['name']."</td>";
                    echo "<td class='product-name'>"."&#8358;".$row['price']."</td>";
                    
                    echo "<td class='product-remove'><a href='menuprofile.php?menuid=".$row['menuid']." '><i class='far fa-eye'></i></a></td>";
                    
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
          <form method="POST" enctype="multipart/form-data">
            <p>
              <input type="file" placeholder="Menu Image" name="pic" accept="image/*" required/>
            </p>

            <p>
              <input type="text" placeholder="Menu Name" name="name"  required/>
            </p>
            <p>
              <input type="number" placeholder="Menu Price" name="price" required/>
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
