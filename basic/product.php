<?php 
// Include database connection settings
include('../db.php');

include ("../login/session.php");
session_start();

if (!isset($_SESSION['email'])) {
        header('Location: ../login');
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
  <br><br><br><Br>

  <?php
		$query = "SELECT * FROM product ";
		$result = mysqli_query($db, $query) or die ("Error: " . mysqli_error($db));
		$numrow = mysqli_num_rows($result);
		
		 ?>


      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <br>
          <h2>Our Products</h2>
          <p>Choose your weapon</p>
        </div>

        


        
    <?php 
		 for ($a=0; $a<$numrow; $a++) {
		$row = mysqli_fetch_array($result);
		?>
        <div class="row portfolio-container"  >

<div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              
              <img src="../images/<?php echo $row['picture'];?>" class="img-fluid">
              <div class="portfolio-links">
                <a href="../images/<?php echo $row['picture'];?>" data-gallery="portfolioGallery" class="portfolio-lightbox"><i class="bi bi-plus"></i></a>
              </div>
              <div class="portfolio-info">
              <h4><?php echo $row['product_name'];?></h4>
                <h4>RM<?php echo $row['price'];?></h4>
                <button align="center"><a class="one" href="order_product.php?id=<?php echo $row['product_id'];?>">Order</a>

              </div>
            </div>
          
          </div>
          <?php
		 			}
					?>
        </div>
        
        </div>
        
      </div>
      
        </div>
    </section><!-- End Portfolio Section -->
    

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>