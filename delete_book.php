<?php
	include("includes/dbh-inc.php");
	
	if(isset($_GET['delete_book'])){
	
        $delete_id = $_GET['delete_book'];

        $delete_book = "delete from books where id='$delete_id'";

        $run_delete = mysqli_query($connection, $delete_book);


        header("Location: view_books.php");
        exit();

	}


?>