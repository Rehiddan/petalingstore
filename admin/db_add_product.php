<?php 
include('../db.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue; 
$i++;
}
$path = '\xampp\htdocs\ninestars\images/';
$pic = $_FILES["file"]["name"];
$tmplocation = $_FILES["file"]["tmp_name"];

$addrecord = "INSERT INTO product (product_name,price, picture) 
			  VALUES('$valuearr[0]', '$valuearr[1]',  '$pic')";
//echo $addrecord;
	  $result = mysqli_query($db, $addrecord) or die ("Error: " . mysqli_error($db));

if ($result) {
?>
<script type="text/javascript">
	window.location = "update_view_product.php"
</script>
?>
<?php } ?>