<?php 
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

                date_default_timezone_set("Asia/Kuala_Lumpur");
                $date = date("d/m/Y");
                $time = date("H:i:s");
				
			
				$id = isset($_GET['id']) ? $_GET['id'] : '';
?>

<script type = "text/javascript">
function calc() 
{
var total = 0;
var rowNo = order.elements["bil"].value;
var qProduct = "quantity";
var pProduct ="price";

for (a=0;a<rowNo;a++)
{
	var textRow = a.toString();
	var textQuantity = qProduct + textRow;
	var textPrice = pProduct + textRow;
	var quantity = parseInt(order.elements[textQuantity].value);
	var pPrice = parseInt(order.elements[textPrice].value);
	total = total + (quantity * pPrice);
}
document.getElementById("price").value = total;
}

</script>

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
				
				<fieldset>

<form name="order" method="POST"  action="db_add_order_receipt.php">
    <table width="100%" border="1" align="center">
      <tr>
        <td width="">Customer Name</td>  
        <td width=""><?php echo $rUSER['first_name'] ?> <?php echo $rUSER['last_name'] ?>
			<!--<select name="customer" style="min-width:330px;">
				<?php
					while($rUSER= mysqli_fetch_assoc($queryUSER)){
						$cust_name = $rUSER['first_name'];
						$user_id = $rUSER['user_id'];
						echo"<option value='$user_id'>$cust_name</option>";?>
						
				<?php
					}
				?>
				
			</select>-->
			
		</td>  
      </tr>  
      <tr> 
        <td>Order Date</td>
        <td><input type="date" name="dateo" size="50" hidden /><?php echo $date?></td>
      </tr>
	  
			<?php
				$sql= "SELECT * FROM product ";
				$query = mysqli_query($db, $sql) or die ("Error: " . mysqli_error());
				$row = mysqli_num_rows($query);
				//$r= mysqli_fetch_assoc($query);
	
                echo "<table border='1' width='100%'  align='center'>";
                echo "<tr>
                        <td width='5%'>Code</td>
                        <td width='40%'>Product Name</td>
                        <td width='5%'>Price</td>
                        <td width='25%'>Quantity</td>
                        </tr>";  
						
         	    $strOid = "did";
                $strPid = "pid";
                $strPname = "pname";			
                $strQuantity = "quantity";	
                $strPrice = "price";
                $strTotal = "total";	
                $no=0; 
                
                echo "<input type='text' name='bil' id='bil' value=".$row." hidden>";
                	
				$i=0;								
                while ($r = mysqli_fetch_assoc($query))   
                { 
					$productName = $r['product_name'];
					
					$pid = $r['product_id'];
					$productPrice = $r['price'];
					
						echo "<tr>
								<td><center><input type='hidden' class='center' name=".$strPid.$no." id=".$strPid.$no." value =".$r['product_id'].">".$r['product_id']."</td>
								<td>".$r['product_name']."</td>
								";
								
								
								echo "</td>
								<td><center><input type='hidden' class='center' name=".$strPrice.$no." id=".$strPrice.$no." value =".$r['price']." readonly'>".$r['price']."</td>
								
								<td>";
								
								if ($id== $r['product_id']) 
									echo "<input type='number' name=".$strQuantity.$no." id=".$strQuantity.$no." min='0' max='100' value='1'>";
								else 
									echo "<input type='number' name=".$strQuantity.$no." id=".$strQuantity.$no." min='0' max='100' value='0'>";
								
								
								
						$no++;
					}
				
					
				
                
                
                echo "<tr>
                        <td colspan='2'>&nbsp;</td>
                        <td>
                        <input type='button' name='calculate' id='calculate' onClick='calc()' value='Calculate'></td>
                        <td><input type='text' name='price' id='price' value='0'></td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
						<td>5% Membership Discount</td>
                        <td><input type='submit' name='submit' id='submit' value='Submit'></td>
                        </tr>
                        <tr>
                        <td align='center' colspan='4'>
                            <input type='reset' name='reset' id='reset' value='   Reset   ' />	
                        </td>
                        </tr>
                    ";
                echo "</table>";
                
               
                ?>
	  
      <tr> 
        <td colspan="2" border="1">
		
		</td>
      </tr>	  
	  
      <tr> 
        <td colspan="2"></td>
      </tr>
	  
    </table>
</form>

</fieldset>

</div>


		
	</body>
</html>