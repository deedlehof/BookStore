<?php

$connection = mysqli_connect("localhost","root","","book_db");


function getBook(){
	

	global $connection;
	$get_book = "select * from books";
	$run_book = mysqli_query($connection, $get_book);
	while($row_book=mysqli_fetch_array($run_book)){
	$book_id = $row_book['id'];
	$book_name = $row_book['name'];
	$book_author = $row_book['author'];
	$book_price = $row_book['price'];
	$book_quantity = $row_book['quantity'];
	echo "
		<div id='single_product'>
			<h3>$book_name</h3>
			<p><b> Price:  $book_price </b></p>
			<a href='details.php?book_id=$book_id' style='float:left;'>Edit</a>
			
		</div>
	";
	
	}
}


?>







