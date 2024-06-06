
  <?php
  include('../db.php');
  include ("../login/session.php");
  session_start();
  $user = $_SESSION['email'];
  if (!isset($_SESSION['email'])) {
          header('Location: ../login');
  }
		
/* capture search_name */
$namesearch = $_POST['search_name'];

/* execute SQL statement 
$sql= "(SELECT * FROM user WHERE name LIKE '$namesearch' )";
$query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
$row = mysqli_num_rows($query);
if($row == 0){
echo "No record found";
}
else{
$r = mysqli_fetch_assoc($query);
$name= $r['name'];
$password= $r['password'];
}*/
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

<h3>Search User Data </h3>

<fieldset>


  <b>User Data</b>
	<?php
		/*$query = "SELECT * FROM user  WHERE level_id != 1 ORDER BY name";
		$result = mysqli_query($db, $query) or die ("Error: " . mysqli_error($db));
		$numrow = mysqli_num_rows($result);*/
		
		/* execute SQL statement */
		$query= "(SELECT * FROM user WHERE first_name LIKE '%$namesearch%' )";
		$result = mysqli_query($db, $query) or die ("Error: " . mysqli_error($db));
		$numrow = mysqli_num_rows($result);
		
	?>
   <tr align="left" bgcolor="#f2f2f2">
    <td>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr align="left" bgcolor="#f2f2f2">
      <th width="3%">No</td>
        <th width="26%">First Name</td>
        <th width="26%">Last Name</td>
        <th width="26%">Email</td>       
        <th width="27%">Address</td>
        <th align="center">Action</td>
      </tr>
	  
      <?php
	  $color="1";
	  
	  for ($a=0; $a<$numrow; $a++) {
		$row = mysqli_fetch_array($result);
		
		if($color==1){
			echo "<tr bgcolor='#FFFFCC'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['first_name'])); ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['last_name'])); ?></td>
        <td><?php echo ucwords (strtolower($row['email'])); ?></td>      
        <td><?php echo ucwords (strtolower($row['address'])); ?></td>
        <td width="5%" align="center"><a class="one" href="detail_user.php?user_id=<?php echo $row['user_id'];?>">Detail</a></td>
      </tr> 
      <?php 
       $color="2";}
	   else{
	   echo "<tr bgcolor='#FFCC99'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['first_name'])); ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['last_name'])); ?></td>
        <td><?php echo ucwords (strtolower($row['email'])); ?></td>      
        <td><?php echo ucwords (strtolower($row['address'])); ?></td>
        <td width="5%" align="center"><a class="one" href="detail_user.php?user_id=<?php echo $row['user_id'];?>">Detail</a></td>
      </tr>
	   <?php
	    $color="1";
	   }
	  } 
	  if ($numrow==0)
	  	{
		 echo '<tr>
    				<td colspan="8"><font color="#FF0000">No record avaiable.</font></td>
 			   </tr>'; 
		}
	  ?>
    </table>

</fieldset>
 
		
</div>
   
</body>

</html> 