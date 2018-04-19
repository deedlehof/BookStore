<?php
include_once 'header.php';
include_once 'includes/dbh-inc.php';
if(isset($_GET['edit_key'])){
	$get_id = $_GET['edit_key'];
	$get_key = "select * from keywords where bookid = '$get_id'";
	$run_key = mysqli_query($connection, $get_key);
	$i = 0;
	$row_key=mysqli_fetch_array($run_key);
		$book_key = $row_key['keyword'];
		$book_id = $row_key['bookid'];
		
}		
?>
<html>
	<head>
		<title>Update Key</title>
	</head>
<body bgcolor="blue">

	
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="600" border="2" bgcolor = "white">

			<tr align = "center">
				<td colspan="8"><h2>Edit Keyword </h2></td>
			</tr>

			<tr>
				<td align ="center">Keyword:</td>
				<td><input type="text" name="keyword" value="<?php echo $book_key;?>" /></td>
			</tr>
			
			
			<tr>
				<td align ="center">BookID:</td>
				<td><input type="text" name="bookid" value="<?php echo $book_id;?>" /></td>
			</tr>
			
			<tr align="center">	
				<td colspan="8"><input type="submit" name="update_key" value="Update Now" /></td>
			</tr>
		</table>
	</form>

</body>
</html>
<?php
	if(isset($_POST['update_key'])){
		$book_key = $_POST['keyword'];
		$book_keys = $book_id;
		
		
		$update_keys = "update keywords set keyword='$book_key' where bookid ='$book_keys'";
		
		$run_keys = mysqli_query($connection, $update_keys);
		
	}
?>

<?php
include_once 'footer.php';
?>