<?php
include_once 'header.php';
?>

<table width="1250" align="center" bgcolor="orange">

	<tr align="center">
		<td colspan="5"><h2>Edit Keys</h2></td>
	</tr>
	
	<tr align="left" bgcolor="green">
		<th>Keyword</th>
		<th>Book ID</th>
		
	</tr>
	<?php
	include("includes/dbh-inc.php");
	?>
	<?php
		$get_key = "select * from keywords";
		$run_key = mysqli_query($connection, $get_key);
		$i = 0;
		while($row_key=mysqli_fetch_array($run_key)){
			$book_key = $row_key['keyword'];
			$book_id = $row_key['bookid'];
			$i++;
		?>
		<tr>
			<td><?php echo $book_key;?></td>
			<td><?php echo $book_id;?></td>
			
			<td><a href="edit_key.php?edit_key=<?php echo $book_id; ?>">Edit</a></td>
			<td><a href="delete_key.php?delete_key=<?php echo $book_id;?>">Delete</a></td>
		</tr>
		<?php } ?>
			
	
	
</table>

<?php
include_once 'footer.php';
?>