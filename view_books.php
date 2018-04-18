<table width="1250" align="center" bgcolor="orange">

	<tr align="center">
		<td colspan="5"><h2>View and Edit Books</h2></td>
	</tr>
	
	<tr align="center" bgcolor="green">
		<th>ISBN</th>
		<th>Title</th>
		<th>Author</th>
		<th>Price</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
	include("includes/dbh-inc.php");
	?>
	<?php
		$get_book = "select * from books";
		$run_book = mysqli_query($connection, $get_book);
		$i = 0;
		while($row_book=mysqli_fetch_array($run_book)){
			$book_id = $row_book['id'];
			$book_title = $row_book['name'];
			$book_author = $row_book['author'];
			$book_price = $row_book['price'];
			$i++;
		?>
		<tr>
			<td><?php echo $book_id;?></td>
			<td><?php echo $book_title;?></td>
			<td><?php echo $book_author;?></td>
			<td><?php echo $book_price;?></td>
			<td><a href="adminindex.php?edit_books=<?php echo $book_id; ?>">Edit</a></td>
			<td><a href="delete_book.php?delete_book=<?php echo $book_id;?>">Delete</a></td>
		</tr>
		<?php } ?>
			
	
	
</table>