<?php 
include ("../login/session.php");
include('../db.php');

session_start();

if (!isset($_SESSION['email'])) {
	header('Location: ../login/Login.html');
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

  <?php
    $email = $_SESSION['email'];
	$query = "SELECT * FROM user where email = '$email' ";
	$result = mysqli_query($db, $query) or die ("Error: " . mysqli_error($db));
	
	
	  //$query = "SELECT * FROM basic ORDER BY name";
	  //$result = mysqli_query($query) or die(mysqli_error());
	  //$numrow = mysqli_num_rows($result);
?>
		 <?php
	
	  
	
		 $row = mysqli_fetch_array($result);
		?>


   <!-- ======= Hero Section ======= -->
   <section id="hero" class="d-flex align-items-center">

<div class="container">
  <div class="row gy-4">
	<div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
	<h1>WELCOME <?php echo $_SESSION['email'];?> <br> to <?php echo  ($row['membership']); ?> Membership Plan</h1>
	  <h2>Fulfil your desires and buy your equipment <br>right now with us!</h2>
	  <div>
		<a href="product.php" class="btn-get-started scrollto">Shopping Now</a>
	  </div>
	</div>
	<div class="col-lg-6 order-1 order-lg-2 hero-img">
	  <img src="../assets/img/badmintoncat.png" class="img-fluid animated" alt="">
	</div>
  </div>
</div>

</section><!-- End Hero -->
				
	</body>
</html>