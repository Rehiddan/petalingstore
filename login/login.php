<?php
// Inialize session
session_start();

// Include database connection settings
include('../db.php');

if(isset($_POST['login'])){
	
	/* capture values from HTML form */
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$sql= "SELECT email, password, level_id, membership FROM user WHERE email= '$email' AND password= '$password'";
	$query = mysqli_query($db, $sql) or die ("Error: " . mysqli_error());
	$row = mysqli_num_rows($query);

	if($row == 0){
	 // Jump to indexwrong page
	 echo "<script> alert(' Wrong username or password! ')</script>";
    echo"<script>location.href=' ../login/Login.html'</script>";
	}
	else{
	 $r = mysqli_fetch_assoc($query);
	 $email= $r['email'];
	 //$password= $r['password'];
	 $level= $r['level_id'];
	 $membership= $r['membership'];

	 //echo($level_id);
	
		if($level==1) { 
			$_SESSION['email'] = $r['email'];
			// Jump to secured page
			header('Location: ../admin/admin.php'); 
		} 
		elseif($level==2) {
			
			if ($membership=="Basic"){
				$_SESSION['email'] = $r['email'];
			// Jump to secured page

			echo "<script> alert('Successfully login as Basic Plan ')</script>";
    		echo"<script>location.href='../basic/index.php'</script>";
			}

			elseif($membership=="Pro"){

				$_SESSION['email'] = $r['email'];
			// Jump to secured page

			echo "<script> alert('Successfully login as Pro Plan ')</script>";
    		echo"<script>location.href=' ../pro/index.php'</script>";
			}

			elseif ($membership=="Ultimate") {

				$_SESSION['email'] = $r['email'];
			// Jump to secured page

			echo "<script> alert('Successfully login as Ultimate Plan ')</script>";
    		echo"<script>location.href=' ../ultimate/index.php'</script>";
				
			}
			
		}
		else {
			header('Location: index.html');
			//echo($level);
		}
		
	}	
}
mysqli_close($db);
?>