<?php
	include("includes/dbh-inc.php");
	
	if(isset($_GET['delete_user'])){
	
        $delete_id = $_GET['delete_user'];

        echo $delete_id;

        $delete_user = "DELETE FROM user WHERE id='$delete_id'";

        $run_delete = mysqli_query($connection, $delete_user);

	    header("Location: viewUsers.php");
	    exit();
	}


?>