<?php

 include("../db.php");
	
	$id=$_GET['user_id'];
	
	$delete = "DELETE FROM user WHERE user_id='$id'";
	$result = mysqli_query($db, $delete) or die ("Error: " . mysqli_error($db));
	//echo $delete;
	
	if ($result) {
	  ?>
	  <script type="text/javascript">
		alert("Success delete")

	  	window.location = "view_user.php"
	  </script>
	  <?php }
    
    else
    {
      echo $update;
	?> 
	  <script type="text/javascript">
		alert("Unsuccess delete")
	  	window.location = "view_user.php"
	  </script>
	<?php       
     } 
	
?>