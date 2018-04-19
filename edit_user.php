<?php

include_once 'header.php';

include("includes/dbh-inc.php");

if(isset($_GET['edit_user'])){
	$get_id = $_GET['edit_user'];
	$get_user = "select * from user where id = '$get_id'";
	$run_user = mysqli_query($connection, $get_user);
	$i = 0;
	$row_user=mysqli_fetch_array($run_user);
		$user_id = $row_user['id'];
		$user_first = $row_user['fname'];
		$user_middle = $row_user['mname'];
		$user_last = $row_user['lname'];
		$user_email = $row_user['email'];
		$user_pass = $row_user['password'];
		$user_age = $row_user['age'];
		$user_gender = $row_user['gender'];
		$user_type = $row_user['type'];
		
}		
?>
<html>
	<head>
		<title>Update User</title>
	</head>
<body bgcolor="purple">

	
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="600" border="2" bgcolor = "white">

			<tr align = "center">
				<td colspan="8"><h2>Edit User </h2></td>
			</tr>

			<tr>
				<td align ="center">User Email:</td>
				<td><input type="text" name="email" size ="60" value="<?php echo $user_email;?>"/></td>
			</tr>
			<tr>
				<td align ="center">First Name:</td>
				<td><input type="text" name="fname" value="<?php echo $user_first;?>" /></td>
			</tr>
			
			
			<tr>
				<td align ="center">Middle Name:</td>
				<td><input type="text" name="mname" value="<?php echo $user_middle;?>" /></td>
			</tr>
			<tr>
				<td align ="center">Last Name:</td>
				<td><input type="text" name="lname" value="<?php echo $user_last;?>" /></td>
			</tr>
			<tr>
				<td align ="center">Password:</td>
				<td><input type="text" name="password" value="<?php echo $user_pass;?>" /></td>
			</tr>
			<tr>
				<td align ="center">Age:</td>
				<td><input type="text"name="age" value="<?php echo $user_age;?>" /></td>
			</tr>
			<tr>
				<td align ="center">Gender:</td>
				<td><input type="char"name="gender" value="<?php echo $user_gender;?>" /></td>
			</tr>
			<tr>
				<td align ="center">Type:</td>
				<td><input type="text"name="type" value="<?php echo $user_type;?>" /></td>
			</tr>
			
			<tr align="center">	
				<td colspan="8"><input type="submit" name="update_user" value="Update Now" /></td>
			</tr>
		</table>
	</form>

</body>
</html>
<?php
	if(isset($_POST['update_user'])){

		$update_id = $user_id;
		$user_first = $_POST['fname'];
		$user_middle = $_POST['mname'];
		$user_last = $_POST['lname'];
		$user_email = $_POST['email'];
		$user_pass = $_POST['password'];
		$user_age = $_POST['age'];
		$user_gender = $_POST['gender'];
		$user_type = $_POST['type'];
		
		$update_user = "update user set fname='$user_first', mname='$user_middle', lname='$user_last',email='$user_email', password='$user_pass',age='$user_age',gender='$user_gender',type='$user_type' where id ='$update_id'";
		
		$run_users = mysqli_query($connection, $update_user);
		
		

	}

?>

<?php
include_once 'footer.php';
?>
