<?php 
// Include database connection settings
include('../db.php');

include ("../login/session.php");
session_start();

if (!isset($_SESSION['email'])) {
        header('Location: ../login');
		} 
				$email = $_SESSION['email'];
				$sqlUSER = "SELECT * FROM user where email = '$email' ";
				$queryUSER = mysqli_query($db, $sqlUSER) or die ("Error: " . mysqli_error());
				$rowUSER = mysqli_num_rows($queryUSER);
				$rUSER= mysqli_fetch_assoc($queryUSER);
				$user_id = $rUSER['user_id'];
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
	$query = "SELECT * FROM orders o, orders_detail od, user u
			 WHERE o.user_id ='$user_id' AND o.orders_id = od.orders_id AND o.user_id=u.user_id";
	$result = mysqli_query($db, $query) or die ("Error: " . mysqli_error($db));
	$numrow = mysqli_fetch_array($result);
?>


<br>
<br>
<br>
<br>
<br>
	<fieldset>

<form name="edit_user" method="POST" action="db_update_order.php">

    <table width="80%" border="0" align="center">
	 <tr>
        <td width="16%">&nbsp;</td>  
        <td width="84%">
		 <input type="hidden" name="id" value=" <?php echo ($numrow['orders_id']); ?> " />
		</td>
      </tr>  
      <tr>
        <td width="16%">Customer Name</td>
        <td><?php echo ucwords (strtolower($numrow['first_name'])); ?>  <?php echo ucwords (strtolower($numrow['last_name'])); ?> </td>
      </tr>
	  <tr>
        <td width="16%">Email</td>
        <td><?php echo $numrow['email']; ?></td>
      </tr>
    </table>
	
	<br><br>
	
		<?php
		$query1 = "SELECT * FROM orders o, orders_detail od, product p  WHERE o.user_id ='$user_id' AND o.orders_id = od.orders_id AND od.product_id = p.product_id ORDER BY o.orders_id, o.status";
		$result1 = mysqli_query($db, $query1) or die ("Error: " . mysqli_error($db));
		$numrow1 = mysqli_num_rows($result1);
	?>
	
	<table width="80%" border="0" align="center">
	<tr align="left" bgcolor="#f2f2f2">
		<th width="3%">No</td>
        <th>Order ID</th>
        <th>Product Name</th>
 		<th>Date Order</th>
        <th>Quantity</th>
		<th>Status</th>

      </tr>
	  
      <?php

	  for ($a=0; $a<$numrow1; $a++) {
		$row1 = mysqli_fetch_array($result1);
		
	
			echo "<tr bgcolor='#FFFFCC'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row1['orders_id'])); ?></td>
		<td>&nbsp;<?php echo ucwords (strtolower($row1['product_name'])); ?></td>
		<td>&nbsp;<?php echo ucwords (strtolower($row1['order_date'])); ?></td>
		<td>&nbsp;<?php echo ucwords (strtolower($row1['quantity'])); ?></td> 	
		<td>&nbsp;<?php echo ucwords (strtolower($row1['status'])); ?></td>   
       </tr> 
            <?php 
      
	   }
	    ?>  
	  <tr> 
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr> 
        <td colspan="4">
        <input type="button" name="cancel" value=" View Product " onclick="location.href='product.php'" />
        <input type="button" name="cancel" value=" Add Order " onclick="location.href='order_product.php'" />
		</td>
      </tr>
    </table>
	
	
</form>

	</fieldset>

	</div>

    

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