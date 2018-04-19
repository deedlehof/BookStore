<?php
include_once 'header.php';
?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>User Profile</h2>
    </div>
	<!-- <table width="1900" align="center"> -->

	<tr align="center">
		<td colspan="6"><h2>Order History</h2></tr>
	</tr>

    <table style="width:100%">
        <tr align="left">
            <th>Book Title</th>
            <th>Quantity</th>
            <th>Cost</th>
            <th>Date Ordered</th>
            <th>Status</th>
        </tr>
    </table>
            
</section>
<?php
include_once 'includes/dbh-inc.php';
//checks the user that is logged in
if(isset($_SESSION['email'])) {
    $user = $_SESSION['email'];
    $get_i = "SELECT * FROM user WHERE email = '$user'";
    $run_i = mysqli_query($connection, $get_i);

    //checks that user is in db
    if(mysqli_num_rows($run_i) < 1){
        header("Location: index.php?uid=error");
        exit();
    }

    //get user id
    $rows_i = mysqli_fetch_assoc($run_i);
    $u_id = $rows_i['id'];

    //selects orders that are for user logged in
    $get_order = "SELECT * FROM orders WHERE oid = '$u_id'";
    $run_order = mysqli_query($connection, $get_order);
    $check_order = mysqli_num_rows($run_order);

    echo '<table style="width:100%">';
    if($check_order > 0){

        //loop through each order
        while ($order = mysqli_fetch_assoc($run_order)){

            //get the book in the order
            $oisbm = $order['oisbm'];
            $get_book = "SELECT name FROM books WHERE id = '$oisbm'";
            $run_book = mysqli_query($connection, $get_book);
            $check_book = mysqli_num_rows($run_book);

            //if a book matches the order then display it
            if($check_book > 0){

                //get book object
                $book = mysqli_fetch_assoc($run_book);

                echo '
                    <tr align="left">
                        <td>' . $book['name'] . '</td>
                        <td>' . $order['quantity'] . '</td>
                        <td>$' . $order['cost'] . '</td>
                        <td>' . $order['ordered'] . '</td>
                        <td>' . $order['status'] . '</td>
                    </tr>
                ';
            }
        }
    }
    echo '</table>';

} else {
    header("Location: index.php?uid=error");
    exit();
}
//outputs order history details
?>

<?php
include_once 'footer.php';
?>
	