
  <?php
  include('../db.php');
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

<h3>Order Report</h3>
Processing Orders
<table border=2 class="table table-bordered">
<thead>
    <tr>
        <th>#</th>
        <th>User ID</th>
        <th>Processing Order</th>
    </tr>
</thead>
<tbody>
    <?php
        $i = 1;
        $query = "SELECT user_id, COUNT(*) mycount,SUM(status = 'processing') AS process FROM orders GROUP BY user_id";
	    $result = mysqli_query($db, $query) or die ("Error: " . mysqli_error($db));
	    while($row = mysqli_fetch_array($result)):
        ?>
    <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $row['user_id'] ?></td>
        <td><?php echo $row['process'] ?></td>
    </tr>
   <?php endwhile; ?>


</tbody>
</table>
<table border=2>
Completed Orders
<thead>
    <tr>
        <th>#</th>
        <th>User ID</th>
        <th>Completed Order</th>
    </tr>
</thead>
<tbody>
    <?php
        $i = 1;
        $query = "SELECT user_id, COUNT(*) mycount,SUM(status = 'complete') AS complete FROM orders GROUP BY user_id";
	    $result = mysqli_query($db, $query) or die ("Error: " . mysqli_error($db));
	    while($row = mysqli_fetch_array($result)):
        ?>
    <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $row['user_id'] ?></td>
        <td><?php echo $row['complete'] ?></td>
    </tr>
   <?php endwhile; ?>
</table>
</div>
</html>