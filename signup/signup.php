
<?php
// Include database connection settings
include('../db.php');

if(isset($_POST['signup'])){
	/* capture values from HTML form */
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	
	$level_id = $_POST['level_id'];
	$membership = $_GET['plan'];

	$sql0 = "SELECT email FROM user WHERE email = '$email'";
	$query0 = mysqli_query($db, $sql0) or die ("Error: " . mysqli_error($db));
	$row0 = mysqli_num_rows($query0);
	
	if($row0 != 0){
		echo "<script> alert('Record is existed ')</script>";
		echo"<script>location.href=' ../signup/plan.html'</script>";
	//echo "Record is existed";
	}
	else{
	/* execute SQL INSERT command */
	$sql2 = "INSERT INTO user (first_name, last_name,email,password,address,level_id,membership)
	VALUES ('" . $first_name . "', '" . $last_name . "', '" . $email . "', '" . $password . "', '" . $address . "', '" . $level_id . "' , '" . $membership . "')";
	
	mysqli_query($db, $sql2) or die ("Error: " . mysqli_error($db));
	/* rediredt to respective page */
	echo "<script> alert('Successfully ')</script>";
    echo"<script>location.href=' ../login/Login.html'</script>";
	//echo "Data has been saved";
	}
}// close if isset()
	/* close db connection */
	mysqli_close($db);
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

        <a href="index.html"><img src="../images/logo2.png" alt="Logo" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="../index.html #hero">Home</a></li>
          <li><a class="nav-link scrollto" href="../index.html #about">About Us</a></li>
          <li><a class="nav-link scrollto" href="../index.html #services">Services</a></li>
          <li><a class="nav-link scrollto" href="../index.html #products">Products</a></li>
          <li><a class="nav-link scrollto" href="../index.html #team">Team</a></li>
          <li><a class="getstarted scrollto" href="../login/Login.html">Sign In</a></li>
          <li><a class="getstarted scrollto" href="plan.html">Sign Up</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

      
    <!-- ======= Contact Us Section ======= -->
    <section id="signin" class="signin">
      <div class="container" data-aos="fade-up">

        <section class="vh-100 gradient-custom">
			<div class="container py-5 h-100">
			  <div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
				  <div class="card bg-dark text-white" style="border-radius: 1rem;">
					<div class="card-body p-5 text-center">
		  
					  <div class="mb-md-5 mt-md-4 pb-5">
					  <form name="edit_user" method="post"  enctype="multipart/form-data">

						<h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
						<p class="text-white-50 mb-5">Please fill all below</p>

						<div class="form-outline form-white mb-4">
						  <label class="form-label" for="">First Name</label>
						  <input type="text" class="form-control form-control-lg" placeholder="Your First Name" name="first_name" id="first_name"  required>
						</div>

						<div class="form-outline form-white mb-4">
						  <label class="form-label" for="">Last Name</label>
						  <input type="text" class="form-control form-control-lg" placeholder="Your Last Name" name="last_name" id="last_name"  required>
						</div>
		  
						<div class="form-outline form-white mb-4">
						  <label class="form-label" for="">Email</label>
						  <input type="email" class="form-control form-control-lg" placeholder="Your Email ID" name="email" id="email"  required>
						</div>

						<div class="form-outline form-white mb-4">
						  <label class="form-label" for="">Password</label>
						  <input type="password" class="form-control form-control-lg" placeholder="Your Password" name="password" id="password"  required>
						</div>

						<div class="form-outline form-white mb-4">
						  <label class="form-label" for="">Address</label>
						  <input type="text" class="form-control form-control-lg" placeholder="Your Address" name="address" id="address"  required>
						</div>
		  
						<input type="hidden" name="level_id" value="2">
						<button type="submit" class="btn btn-outline-light btn-lg px-5" name="signup" >Sign Up</button>
						</form>
					  </div>
		  
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </section>

      </div>
    </section><!-- End Contact Us Section -->

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
