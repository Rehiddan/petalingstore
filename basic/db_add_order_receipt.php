<?php 
include('../db.php');

include ("../login/session.php");
session_start();

if (!isset($_SESSION['email'])) {
        header('Location: ../login');
		} 
				$email = $_SESSION['email'];
                $sqlUSER= "SELECT * FROM user where email = '$email' ";
				$queryUSER = mysqli_query($db, $sqlUSER) or die ("Error: " . mysqli_error());
				$rowUSER = mysqli_num_rows($queryUSER);
				$rUSER= mysqli_fetch_assoc($queryUSER);
				$user_id = $rUSER['user_id'];
        $first_name = $rUSER['first_name'];
        $last_name = $rUSER['last_name'];

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $date = date("Y-m-d");
        $time = date("H:i:s");
		
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
  <BR><BR><BR><bR>

			
			<div class="container">
			
			<h3></h3>
			<center>
			<fieldset>
          		<!--  (Recipt Code)  -->
				<?php
                            
                if(isset($_POST['submit']))
                {
               
					$dateo = $_POST['dateo'];
					$pstatus="processing";
					
					$row = $_POST['bil'];
					
                    $oid = "orders_id";
                    $pid = "pid";
                    $pname = "pname";
                    $quantity = "quantity";	
                    $pprice = "price";
  				
					$sql= "SELECT * FROM orders";
					$query = mysqli_query($db, $sql) or die ("Error: " . mysqli_error());
					$rows = mysqli_num_rows($query);
					   
                    if($rows!=0)
                        {
                            $order_id = $rows + 1;
                        }
                                
                    echo "<form id='recipt' name='recipt' method='post' action=''>
                      <table width=\"680\" border=\"0\" align=\"center\">
                        <tr>
                          <td colspan=\"5\" align=\"center\"><b>RECEIPT</b></td>
                        </tr>
						<tr>
                          <td colspan=\"5\" align=\"center\">Petaling Store</td>
                        </tr>
                        <tr>
                          <td colspan=\"5\" align=\"center\">Smash to your heart content</td>
                        </tr>
                        <tr>
                          <td colspan=\"5\"></td>
                        </tr>
                        <tr>
                          <td colspan=\"5\"></td>
                        </tr>
                        <tr>
                          <td>Transaction</td>
                          <td colspan=\"4\">: ".$order_id."</td>
                        </tr>
                        <tr>
                          <td>Order</td>
                          <td colspan=\"4\">: Date &nbsp;".$date."&nbsp;&nbsp;Time &nbsp;".$time."</td>
                        </tr>
					
                          <td>User ID</td>
                          <td colspan=\"4\">: ".$user_id."</td>
                        </tr>
                        <td>Customer Name</td>
                        <td colspan=\"4\">: ".$first_name."&nbsp;&nbsp;".$last_name."</td>
                      </tr>
                        <tr>
                          <td colspan=\"5\"><hr /></td>
                        </tr>
                        <tr>
                          <td width=\"45\">Code</td>
                          <td width=\"1000\">Name</td>
                          <td width=\"45\">Price/Unit</td>
                          <td width=\"45\">Quantity</td>
                          <td width=\"45\">Total</td>
                        </tr>";
                        
                        $itemCount = 0;
                        $totalPrice = 0;
                        $finalPrice = 0;
                     
                        for($a=0;$a<$row;$a++)
                        {
                            $strpid = $_POST[''.$pid.$a.''];
                            $strQuantity = $_POST[$quantity.$a];	
                            $strPrice = $_POST[$pprice.$a];	

							$sqlf= "SELECT * FROM product WHERE product_id = '$strpid'";
							$queryf = mysqli_query($db, $sqlf) or die ("Error: " . mysqli_error());
							$rowf = mysqli_num_rows($queryf);
							$rf= mysqli_fetch_assoc($queryf);
					
							$sPid = $rf['product_id'];
							
                            //buat pengiraan utk total setiap line dan quantity
                            if($strQuantity > 0)
                            {
                                $sqlordersdetail = "INSERT INTO orders_detail (orders_id, product_id, quantity) 
												   VALUES('".$order_id."', '".$sPid."', '".$strQuantity."')";
                                mysqli_query($db,$sqlordersdetail  ) or die ("Error: " . mysqli_error());
                                $strTotal = ($strPrice * intval($strQuantity));
                                
                                echo "<tr>
                                  <td>".$sPid."</td>
                                  <td>".$rf['product_name']."</td>
                                  <td>".$strPrice."</td>
                                  <td>".$strQuantity."</td>
                                  <td>".$strTotal."</td>
                                </tr>";
                                $itemCount = $itemCount + intval($strQuantity);
                                $totalPrice = $totalPrice + (intval($strQuantity) * $strPrice);
                                $finalPrice = $totalPrice - ($totalPrice * 0.05);

                            }
                        }
                        
                        $sqlorders = "INSERT INTO orders (user_id, order_date, status) 
									 VALUES('".$user_id."', '".$date."',  '".$pstatus."')";
                        mysqli_query($db,$sqlorders ) or die ("Error: " . mysqli_error());
                       
                
                        echo"
                        <tr>
                          <td colspan=\"5\"><hr /></td>
                        </tr>
                        <tr>
                          <td colspan=\"4\">Item Count</td>
                          <td colspan=\"1\" align=\"right\">".$itemCount."</td>
                        </tr>

                        <tr>
                        <td colspan=\"4\">Price before Discount</td>
                        <td colspan=\"1\" align=\"right\">".$totalPrice."</td>
                      </tr>

                      <tr>
                      <td colspan=\"4\">Total after Discount</td>
                      <td colspan=\"1\" align=\"right\">".$finalPrice."</td>
                    </tr>

                        <tr>
                          <td colspan=\"5\"><hr /></td>
                        </tr>
                        <tr>
                          <td colspan=\"5\" align=\"center\">Thank You</td>
                        </tr>
                        <tr>
                          <td colspan=\"5\" align=\"center\">Plese Come Again</td>
                        </tr>
                      </table>
                    </form>";
                }
      ?>
    </fieldset> 
	</center>
</div>
		
		
		
	</body>
</html>