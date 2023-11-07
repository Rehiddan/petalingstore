<?php

 include("../db.php");
	
	$product_id=$_GET['product_id'];
	
	$delete = "DELETE FROM product WHERE product_id='$product_id'";
	$result = mysqli_query($db, $delete) or die ("Error: " . mysqli_error($db));
	//echo $delete;
	
	if ($result) {
	  ?>
	  <script type="text/javascript">
	  	window.location = "view_product.php"
	  </script>
	  <?php }
    
    else
    {
      echo $update;
	?> 
	  <script type="text/javascript">
	  	window.location = "view_product.php"
	  </script>
	<?php       
     } 
	
?>