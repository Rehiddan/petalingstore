<?php
include('../db.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue; 
$i++;
}

$path = '\xampp\htdocs\overpart\images/';
$pic = $_FILES["file"]["name"];
$tmplocation = $_FILES["file"]["tmp_name"];
  
	if ($pic=='')
    {
      echo $pic . " already exists. ";
	  $update = "UPDATE product SET
				product_name='$valuearr[0]',
				price='$valuearr[1]',
				picture='$valuearr[2]'
				WHERE product_id='$valuearr[3]'";
	//echo $update;
	  $result = mysqli_query($db, $update) or die ("Error: " . mysqli_error($db));
	  if ($result) {
		  
	 ?>
	  <script type="text/javascript">
	   window.location = "update_view_product.php"
	  </script>
	  <?php }
    }
    else
    {
      move_uploaded_file($tmplocation, $path . $pic);

	  $update = "UPDATE product SET
				product_name='$valuearr[0]',
				price='$valuearr[1]',
				picture='$pic'
				WHERE product_id='$valuearr[3]'";
	  //echo $update;
	  $result = mysqli_query($db, $update) or die ("Error: " . mysqli_error($db));

	  if ($result) {
	  ?>
	  <script type="text/javascript">
	   window.location = "update_view_product.php"
	  </script>
	  <?php }       
     } 
?>