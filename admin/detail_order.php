<?php 
// Include database connection settings
include('../db.php');
include ("../login/session.php");
session_start();
$user = $_SESSION['email'];
if (!isset($_SESSION['email'])) {
        header('Location: ../login');
		} 
    $ordersid = $_GET['id'];
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
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

<a href="admin.php"><img src="../images/logo2.png" alt="Logo" class="img-fluid"></a>
</div>

      <nav id="navbar" class="navbar">
        <ul>
          <li class="dropdown"><a href="#"><span>User</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="view_user.php">View</a></li>
              <li><a href="updateuser.php">Update</a></li>
              <li><a href="search_user.php">Search</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Product</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="add_product.php">Add</a></li>
              <li><a href="view_product.php">View</a></li>
              <li><a href="update_view_product.php">Update</a></li>
              <li><a href="search_product.php">Search</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Order</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="view_order.php">Update</a></li>

            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Report</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="user_report.php">User</a></li>
              <li><a href="product_report.php">Product</a></li>
              <li><a href="order_report.php">Order</a></li>
            </ul>
          </li>
          <li><a class="getstarted scrollto" href="../login/logout.php">Sign Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <br><Br><Br><Br><Br>


<div class="container">

<h3>Order Detail</h3>

<?php
	$query = "SELECT * FROM orders o, orders_detail od, user u
			 WHERE o.orders_id ='$ordersid' AND o.orders_id = od.orders_id AND o.user_id=u.user_id";
	$result = mysqli_query($db, $query) or die ("Error: " . mysqli_error($db));
	$numrow = mysqli_fetch_array($result);
?>

<fieldset>

<form name="edit_user" method="POST" action="db_update_order.php">

    <table width="80%" border="0" align="center">
	 <tr>
        <td width="16%">Order ID</td>  
        <td width="84%">
		 <?php echo ucwords (strtolower($numrow['orders_id'])); ?>
		 <input type="hidden" name="id" value=" <?php echo ($numrow['orders_id']); ?> " />
		</td>
      </tr>  
      <tr>
        <td width="16%">Order </td>  
        <td width="84%">Date : <?php echo ucwords (strtolower($numrow['order_date'])); ?> </td>
      </tr>  
	  <tr>
        <td width="16%">Customer Name</td>
        <td><?php echo ucwords (strtolower($numrow['first_name'])); ?> </td>
      </tr>
        <td width="16%">Status</td>
        <td><?php echo ucwords (strtolower($numrow['status'])); ?> </td>
      </tr>
    </table>
	
	<br><br>
	
		<?php
		$query1 = "SELECT * FROM orders o, orders_detail od, product p  WHERE o.orders_id ='$ordersid' AND o.orders_id = od.orders_id AND od.product_id = p.product_id";
		$result1 = mysqli_query($db, $query1) or die ("Error: " . mysqli_error($db));
		$numrow1 = mysqli_num_rows($result1);
	?>
	
	<table width="80%" border="0" align="center">
	<tr align="left" bgcolor="#f2f2f2">
		<th width="3%">No</td>
        <th>Product ID</th>
        <th>Product Name</th> 
        <th>Quantity</th>

      </tr>
	  
      <?php

	  for ($a=0; $a<$numrow1; $a++) {
		$row1 = mysqli_fetch_array($result1);
		
	
			echo "<tr bgcolor='#FFFFCC'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row1['product_id'])); ?></td>
		<td>&nbsp;<?php echo ucwords (strtolower($row1['product_name'])); ?></td> 		
		<td>&nbsp;<?php echo ucwords (strtolower($row1['quantity'])); ?></td>  
       </tr> 
            <?php 
      
	   }
	    ?>  
	  <tr> 
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr> 
        <td colspan="4">
			<?php 
					if ($row1['status']=='processing') 
						echo "<input type='submit' name='submit' value=' Verify Order ' />";
					else
						echo "";
			?>	
	
        <input type="button" name="cancel" value=" Back " onclick="location.href='view_order.php'" /></td>
      </tr>
    </table>
	
	
</form>

</fieldset>
 
</div>
   
</body>

</html> 
