<table width="1250" align="center" bgcolor="red">

	<tr align="center">
		<td colspan="5"><h2>View and Edit Books</h2></td>
	</tr>
	
	<tr align="center" bgcolor="white">
		<th>ID</th>
		<th>Email</th>
		<th>Pass</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Type</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
	include("includes/dbh-inc.php");
	?>
	<?php
		$get_user = "select * from user";
		$run_user = mysqli_query($connection, $get_user);
		$i = 0;
		while($row_user=mysqli_fetch_array($run_user)){
			$user_id = $row_user['id'];
			$user_email = $row_user['email'];
			$user_pass = $row_user['password'];
			$user_first = $row_user['fname'];
			$user_last = $row_user['lname'];
			$user_type = $row_user['type'];
			$i++;
		?>
		<tr>
			<td><?php echo $user_id;?></td>
			<td><?php echo $user_email;?></td>
			<td><?php echo $user_pass;?></td>
			<td><?php echo $user_first;?></td>
			<td><?php echo $user_last;?></td>
			<td><?php echo $user_type;?></td>
			<td><a href="adminindex.php?edit_user=<?php echo $user_id; ?>">Edit</a></td>
			<td><a href="delete_user.php?delete_user=<?php echo $user_id;?>">Delete</a></td>
		</tr>
		<?php } ?>
			
	
	
</table>