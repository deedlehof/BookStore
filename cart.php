<?php
include_once 'header.php';
?>

<section class="cart-container">
    <div class="cart-wrapper">
        <h1>Cart</h1>

        <ul>
            <?php
                if(isset($_SESSION['order'])) {
                    $books = $_SESSION['order'];
                    foreach ($books as $i => $book) {
                        echo '
                        <li>
                            <h3>' . $books[$i]['name'] . '</h3>
                            <p>$' . $books[$i]['price'] . '</p>   
                            <p>' . $books[$i]['orderAmt'] . '</p>  
                            <button type="submit" name="bRemove" value="' . $i . '">Remove</button>           
                        </li>        
                    ';
                    }
                } else {
                    echo '<h2>Cart is Empty</h2>';
                }
            ?>

        </ul>
    </div>
</section>

<?php
include_once 'footer.php';
?>