<?php
	include("includes/dbh-inc.php");
	
	if(isset($_GET['delete_user'])){
	
	$delete_id = $_GET['delete_user'];

	$delete_user = "delete from user where id='$delete_id'";

	$run_delete = mysqli_query($connection, $delete_user);

	
	

	}


?>