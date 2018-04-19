<?php
	include("includes/dbh-inc.php");
	
	if(isset($_GET['delete_key'])){
	
        $delete_id = $_GET['delete_key'];
        echo $delete_id;
        $delete_key = "DELETE FROM keywords WHERE bookid='$delete_id'";
        $run_delete = mysqli_query($connection, $delete_key);
	    header("Location: view_key.php");
	    exit();
	}
?>