<?php 
	
	include('../db.php');
include ("../login/session.php");
session_start();

if (!isset($_SESSION['email'])) {
	header('Location: ../login/login.html');
		} 
		
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Petaling Smash Store</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">

        <a href="index.php"><img src="../images/logo2.png" alt="Logo" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="product.php">Product</a></li>
          <li><a class="nav-link scrollto" href="view_order.php">History Order</a></li>
          <li><a class="nav-link scrollto" href="view_profile.php">Profile</a></li>
          <li><a class="getstarted scrollto" href="../login/logout.php">Sign Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <br>
		
<div class="main">		
<?php
    $email = $_SESSION['email'];
	$query = "SELECT * FROM user where email = '$email' ";
	$result = mysqli_query($db, $query) or die ("Error: " . mysqli_error($db));
	$numrow = mysqli_num_rows($result);
	
	  //$query = "SELECT * FROM user ORDER BY name";
	  //$result = mysqli_query($query) or die(mysqli_error());
	  //$numrow = mysqli_num_rows($result);
?>
		 <?php
	
	  
	
		 $row = mysqli_fetch_array($result);
		?>
	

   
<form name="edit_user" method="post" action="../basic/db_update_user.php" enctype="multipart/form-data">
    <table width="80%" border="0" align="center">
 <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
				<div class="col-md-12"><label class="labels">Email</label><input type="email" name="email" class="form-control" placeholder="enter email" value="<?php echo  ($row['email']); ?>" disabled></div><br>
				<input type="hidden" name="email" size="50" value="<?php echo $row['email']; ?>"/>

                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" name="first_name" class="form-control" placeholder="first name" value="<?php echo  ($row['first_name']); ?>"></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" name="last_name" class="form-control" value="<?php echo  ($row['last_name']); ?>" placeholder="surname"></div>
                </div>
                <div class="row mt-3">
				<div class="col-md-12"><label class="labels">Password</label><input type="text" name="password" class="form-control" placeholder="enter password" value="<?php echo  ($row['password']); ?>"></div><br>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" name="address" class="form-control" placeholder="enter address line" value="<?php echo  ($row['address']); ?>"></div><br>
					<div class="col-md-12"><label class="labels">Membership</label><input type="text" name="membership" class="form-control" placeholder="" value="<?php echo  ($row['membership']); ?>" disabled></div>

                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button></div>
            </div>
        </div>
    </div>
</div>
	</form>
</div>
</div>
</body>
</html> 




	
		