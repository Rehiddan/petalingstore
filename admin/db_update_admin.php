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
                first_name='$valuearr[0]',
                last_name='$valuearr[1]',
                password='$valuearr[3]',
                address='$valuearr[4]'
                WHERE email='$valuearr[2]'";
	  //echo $update;
	  $result = mysqli_query($db, $update) or die ("Error: " . mysqli_error($db));
	  if ($result) {
        ?>
        <script type="text/javascript">
            window.location = "updateuser.php";
        </script>
        <?php }
?>