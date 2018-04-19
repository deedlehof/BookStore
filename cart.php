<?php
include_once 'header.php';
include_once 'includes/dbh-inc.php';

//set time zone
date_default_timezone_set("America/New_York");

//remove book is user clicked remove under item
if(isset($_POST['bRemove'])){
    $b2RemoveIndex = (int)mysqli_real_escape_string($connection, $_POST['bRemove']);
    //remove from order array
    unset($_SESSION['order'][$b2RemoveIndex]);
    //resort array so there isn't an empty index
    array_values($_SESSION['order']);
}

//calculate total cost of cart
$totalCost = 0;
if(isset($_SESSION['order'])) {
    $books = $_SESSION['order'];
    foreach ($books as $i => $book) {
        $bCost = $books[$i]['orderAmt'] * $books[$i]['price'];
        $totalCost += $bCost;
    }
}

//check the user out
if (isset($_POST['order']) && isset($_SESSION['email'])) {
    $shipAddr = mysqli_real_escape_string($connection, $_POST['shipaddr']);
    $billAddr = mysqli_real_escape_string($connection, $_POST['billaddr']);
    $cardNum = mysqli_real_escape_string($connection, $_POST['cardNum']);

    //get the user
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($connection, $sql);
    $resultCheck = mysqli_num_rows($result);

    //if no results then exit
    if($resultCheck < 1){
        header("Location: cart.php?user=error");
        exit();
    }
    $user = mysqli_fetch_assoc($result);

    if(isset($_SESSION['order'])) {
        $books = $_SESSION['order'];
        $orderDate = date("Y-m-d");
        $userID = $user['id'];

        foreach ($books as $i => $book) {
            $bCost = $books[$i]['orderAmt'] * $books[$i]['price'];
            $bQuantity = $books[$i]['orderAmt'];
            $bOISBM = $books[$i]['id'];

            $order = "INSERT INTO orders (shipaddr, billaddr, cardnum, ordered, quantity, cost, status, oisbm, oid)
                        VALUES ('$shipAddr', '$billAddr', '$cardNum', '$orderDate', '$bQuantity', '$bCost', 'in progress', '$bOISBM', '$userID')";

            mysqli_query($connection, $order);

            //remove from order array
            unset($_SESSION['order'][$i]);
            //resort array so there isn't an empty index
            array_values($_SESSION['order']);

            //update amount in books db
            $bookUpdate = "UPDATE books SET quantity = (quantity - $bQuantity) WHERE id = '$bOISBM'";
            mysqli_query($connection, $bookUpdate);
        }
    }
}
?>

<section class="cart-container">
    <div class="cart-wrapper">
        <h1>Cart</h1>

        <ul>
            <?php
                if(isset($_SESSION['order']) && count($_SESSION['order']) > 0) {
                    $books = $_SESSION['order'];
                    foreach ($books as $i => $book) {
                        echo '
                        <li>
                            <h3>' . $books[$i]['name'] . '</h3>
                            <p>'. $books[$i]['orderAmt'] . ' at $' . $books[$i]['price'] . ' each</p>   
                            <p>' .  '</p>  
                            <form class="remove-form" action="cart.php" method="post">
                                <button type="submit" name="bRemove" value="' . $i . '">Remove</button>
                            </form>           
                        </li>        
                    ';
                    }
                } else {
                    echo '<h2>Cart is Empty</h2>';
                }
            ?>

        </ul>

        <h3><?php echo 'TOTAL: $' . $totalCost; ?></h3>

        <hr>

        <form class="signup-form" action="cart.php" method="post">
            <input type="text" name="shipaddr" placeholder="Shipping Address*">
            <input type="text" name="billaddr" placeholder="Billing Address*">
            <input type="number" name="cardNum" minlength="10" maxlength="10" placeholder="Card Number*">
            <button type="submit" name="order">Order</button>
        </form>
    </div>

</section>

<?php
include_once 'footer.php';
?>