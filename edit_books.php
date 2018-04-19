<!DOCTYPE>
<?php
include("includes/dbh-inc.php");

if(isset($_GET['edit_books'])){
	$get_id = $_GET['edit_books'];
	$get_book = "select * from books where id = '$get_id'";
	$run_book = mysqli_query($connection, $get_book);
	$i = 0;
	$row_book=mysqli_fetch_array($run_book);
		$book_id = $row_book['id'];
		$book_title = $row_book['name'];
		$book_isbn = $row_book['ISBN'];
		$book_author = $row_book['author'];
		$book_desc = $row_book['subject'];
		$book_sum = $row_book['summary'];
		$book_lang = $row_book['language'];
		$book_publisher = $row_book['publisher'];
		$book_date = $row_book['published'];
		$book_price = $row_book['price'];
		$book_quantity = $row_book['quantity'];
}		
?>
<html>
	<head>
		<title>Update Book</title>
	</head>
<body bgcolor="blue">

	
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="600" border="2" bgcolor = "white">

			<tr align = "center">
				<td colspan="8"><h2>Edit Book </h2></td>
			</tr>

			<tr>
				<td align ="center">Book Title:</td>
				<td><input type="text" name="name" size ="60" value="<?php echo $book_title;?>"/></td>
			</tr>
			<tr>
				<td align ="center">isbn:</td>
				<td><input type="text" name="ISBM" value="<?php echo $book_isbn;?>" /></td>
			</tr>
			
			
			<tr>
				<td align ="center">Author:</td>
				<td><input type="text" name="author" value="<?php echo $book_author;?>" /></td>
			</tr>
			<tr>
				<td align ="center">Book Decription:</td>
				<td><textarea name="summary" cols="20" rows="10"><?php echo $book_sum;?></textarea></td>
			</tr>
			<tr>
				<td align ="center">Book Subject:</td>
				<td><input type="text" name="subject" value="<?php echo $book_desc;?>" /></td>
			</tr>
			<tr>
				<td align ="center">Book Language:</td>
				<td><input type="text"name="language" value="<?php echo $book_lang;?>" /></td>
			</tr>
			<tr>
				<td align ="center">Publisher:</td>
				<td><input type="text"name="publisher" value="<?php echo $book_publisher;?>" /></td>
			</tr>
			<tr>
				<td align ="center">Published:</td>
				<td><input type="text"name="published" value="<?php echo $book_date;?>" /></td>
			</tr>
			<tr>
				<td align ="center">Book Price:</td>
				<td><input type="text"name="price" value="<?php echo $book_price;?>" /></td>
			</tr>
			<tr align="center">
			<tr>
				<td align ="center">Quantity:</td>
				<td><input type="text"name="quantity" value="<?php echo $book_quantity;?>" /></td>
			</tr>
			<tr align="center">	
				<td colspan="8"><input type="submit" name="update_books" value="Update Now" /></td>
			</tr>
		</table>
	</form>

</body>
</html>
<?php
	if(isset($_POST['update_books'])){

		$update_id = $book_id;
		$book_title = $_POST['name'];
		$book_isbn = $_POST['ISBM'];
		$book_author = $_POST['author'];
		$book_desc = $_POST['subject'];
		$book_sum = $_POST['summary'];
		$book_lang = $_POST['language'];
		$book_publisher = $_POST['publisher'];
		$book_date = $_POST['published'];
		$book_price= $_POST['price'];
		$book_quantity = $_POST['quantity'];

		$update_book = "update books set name='$book_title', ISBM='$book_isbn', author='$book_author',subject='$book_desc', summary='$book_sum',language='$book_lang',publisher='$book_publisher',published='$book_date',price='$book_price',quantity='$book_quantity' where id ='$update_id'";
		
		$run_books = mysqli_query($connection, $update_book);
		
		

	}

?>