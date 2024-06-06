<?php
// Include database connection settings
include('../db.php');

if(isset($_POST['signup'])){
	/* capture values from HTML form */
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_ name'];
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
