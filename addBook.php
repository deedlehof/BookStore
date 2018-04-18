<!DOCTYPE>
<?php
include("includes/dbh-inc.php");
?>
<html>
	<head>
		<title>Inserting Product</title>
	</head>
<body bgcolor="blue">

	
	<form action="addBook.php" method="post" enctype="multipart/form-data">
		<table align="center" width="600" border="2" bgcolor = "white">

			<tr align = "center">
				<td colspan="8"><h2>Insert New Book </h2></td>
			</tr>

			<tr>
				<td align ="center">Book Title:</td>
				<td><input type="text" name="name" size ="60" /></td>
			</tr>
			<tr>
				<td align ="center">ISBN:</td>
				<td><input type="text" name="ISBM" /></td>
			</tr>
			
			
			<tr>
				<td align ="center">Author:</td>
				<td><input type="text" name="author" /></td>
			</tr>
			<tr>
				<td align ="center">Book Decription:</td>
				<td><textarea name="summary" cols="20" rows="10"></textarea></td>
			</tr>
			<tr>
				<td align ="center">Book Subject:</td>
				<td><input type="text" name="subject" /></td>
			</tr>
			<tr>
				<td align ="center">Book Language:</td>
				<td><input type="text"name="language" /></td>
			</tr>
			<tr>
				<td align ="center">Publisher:</td>
				<td><input type="text"name="publisher" /></td>
			</tr>
			<tr>
				<td align ="center">Published:</td>
				<td><input type="text"name="published" /></td>
			</tr>
			<tr>
				<td align ="center">Book Price:</td>
				<td><input type="text"name="price" /></td>
			</tr>
			<tr align="center">
			<tr>
				<td align ="center">Quantity:</td>
				<td><input type="text"name="quantity" /></td>
			</tr>
			<tr align="center">	
				<td colspan="8"><input type="submit" name="insert_post" value="Add Now" /></td>
			</tr>
		</table>
	</form>

</body>
</html>
<?php
	if(isset($_POST['insert_post'])){
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

		$insert_book = "insert into books(name,ISBM,author,subject,summary,language,publisher,published,price,quantity) values ('$book_title','$book_isbn','$book_author','$book_desc','$book_sum','$book_lang','$book_publisher','$book_date','$book_price','$book_quantity')";
		
		$insert_books = mysqli_query($connection, $insert_book);
		

	}

?>