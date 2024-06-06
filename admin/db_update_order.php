<?php
	include('../db.php');
	
	$id=$_POST['id'];
	
	$update = "UPDATE orders SET status='complete' WHERE orders_id='$id'";
	$result = mysqli_query($db, $update) or die ("Error: " . mysqli_error($db));
	if ($result) {
	  ?>
	  <script type="text/javascript">
	  	window.location = "view_order.php"
	  </script>
	  <?php }
    
    else
    {
      echo $update;
	?> 
	  <script type="text/javascript">
	  	window.location = "view_order.php"
	  </script>
	<?php       
     } 
?>