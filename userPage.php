<?php
session_start();
include_once 'header.php';
?>
 <section class="main-container">
        <div class="main-wrapper">
            <h2>User Profile</h2>
	    
	</div>
	<table width="1900" align="center">

	<tr align="center">
		<td colspan="6"><h2>Order History</h2></tr>
	</tr>

	<tr align="center">
		<th>Book Title</th>
		<th>Quantity</th>
		<th>Cost</th>
		<th>Date Ordered</th>
		<th>Status</th>
	</tr>

            
    </section>
<?php
include("includes/dbh_inc.php");
//checks the user that is logged in
$user = $_Session['email'];
$get_i = "select * from user where email = '$user'";
$run_i = mysqli_query($connection,$get_i);
$rows_i = mysqli_fetch_array($run_i);
$u_id = $rows_i['id'];

//selects orders that are for user logged in
$get_order = "select * from orders where oid = '$u_id'";
$run_order = mysqli_query($connection, $get_order);

$get_pro = "select * from books where id = '$book_id'";
$run_pro = mysqli_query($connection, $get_pro);
$row_pro = mysqli_fetch_array($run_pro);
	
$product_title = $row_pro['name'];

//outputs order history details
?>
<tr align="center">
	<td>
	<?php echo $product_title;?>
	</td>
	<td><?php echo $qty;?></td>
	<td><?php echo $price;?></td>
	<td><?php echo $orderdate;?></td>
	<td><?php echo $status;?></td>
</tr>
<?php
include_once 'footer.php';
?>
	