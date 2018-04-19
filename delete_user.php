<?php
    include_once 'includes/dbh-inc.php';
	
	if(isset($_GET['delete_user'])){

        $delete_id = (int)$_GET['delete_user'];

        echo $delete_id;

        $delete_user = "DELETE FROM user WHERE user.id='$delete_id'";

        $run_delete = mysqli_query($connection, $delete_user);

	    //header("Location: viewUsers.php");
	    //exit();
	}


?>