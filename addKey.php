<!DOCTYPE>
<?php
include_once 'header.php';
include("includes/dbh-inc.php");
?>
<html>
	<head>
		<title>Add Keyword</title>
	</head>
<body bgcolor="blue">

	
	<form action="addKey.php" method="post" enctype="multipart/form-data">
		<table align="center" width="600" border="2" bgcolor = "white">

			<tr align = "center">
				<td colspan="8"><h2>Insert New Keyword </h2></td>
			</tr>

			<tr>
				<td align ="center">Book Keyword:</td>
				<td><input type="text" name="keyword" size ="60" /></td>
			</tr>
			<tr>
				<td align ="center">Book ID:</td>
				<td><input type="text" name="bookid" /></td>
			</tr>
			
			
			
			<tr align="center">	
				<td colspan="8"><input type="submit" name="insert_key" value="Add Now" /></td>
			</tr>
		</table>
	</form>

</body>
</html>
<?php
	if(isset($_POST['insert_key'])){
		$book_key = $_POST['keyword'];
		$book_id = $_POST['bookid'];
		
		$insert_keys = "insert into keywords(keyword,bookid) values ('$book_key','$book_id')";
		
		$insert_keyss = mysqli_query($connection, $insert_keys);
		
	}
?>

<?php
include_once 'footer.php';
?>