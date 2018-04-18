<!DOCTYPE>
<?php
include("adminfunctions.php");
?>
<html>
	<head>
		<title>Admin Page</title>

	<link rel="stylesheet" href="adminstyle.css" media="all" />
	</head>
<body>

	

	<div class="main_wrapper">
		
		<div class ="header_wrapper">

		<!--Header ends here-->
		
		<div class="menubar">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="adminindex.php">Admin Home</a></li>
				<li><a href="#">Edit Users</a></li>
				<li><a href="addBook.php">Add Books</a></li>
				<li><a href="view_books.php">Edit Books</a></li>
				<li><a href="userPage.php">My Account</a></li>
				<li><a href="#">Log Out</a></li>
				
			</ul>
			
		</div>
		<?php
		if(isset($_GET['addBook'])){
		include("addBook.php");
		}
		if(isset($_GET['view_books'])){
		include("view_books.php");
		}
		if(isset($_GET['edit_books'])){
		include("edit_books.php");
		}
		?>
		
		
		
		
			
	
			
			
			
				
				
			
		</div>
		
		
	</div>

</body>
</html>