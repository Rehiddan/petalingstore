<?php
include('../db.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue; 
$i++;
}


	  $update = "UPDATE user SET
				first_name='$valuearr[1]',
                last_name='$valuearr[2]',
				password='$valuearr[3]',
				address='$valuearr[4]'
                WHERE email='$valuearr[0]'";
	  //echo $update;
	  $result = mysqli_query($db, $update) or die ("Error: " . mysqli_error($db));

	  if ($result) {
	  ?>
	  <script type="text/javascript">
		alert("update success")
	  	window.location = "view_profile.php"
	  </script>
	  <?php }       
     
?>
