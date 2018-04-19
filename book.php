<?php
include_once 'header.php';
include_once 'includes/dbh-inc.php';

//the bid of the selected book is passed as a variable in the url
//get the book corresponding to that bid

if(isset($_GET['bid'])){
    $id = (int)mysqli_real_escape_string($connection, $_GET['bid']);

    $query = "SELECT * FROM books WHERE books.id = '$id'";
    $result = mysqli_query($connection, $query);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0) {
        $book = mysqli_fetch_assoc($result);
    } else {
        header("Location: index.php?bid=error");
        exit();
    }

    //get the average rating for the book
    $ratingQuery = "SELECT AVG(rating) AS avgRating FROM user_reviews WHERE bid = '$id'";
    $ratingResult = mysqli_query($connection, $ratingQuery);
    $ratingCheck = mysqli_num_rows($ratingResult);
    if($ratingCheck > 0){
        $avgRating = mysqli_fetch_assoc($ratingResult);
    }

    //get all the reviews for this book
    $reviewsQuery = "SELECT uid, rating, comments FROM user_reviews WHERE bid = '$id'";
    $reviewsResult = mysqli_query($connection, $reviewsQuery);
    $reviewsCheck = mysqli_num_rows($reviewsResult);

} else {
    header("Location: index.php?bid=error");
    exit();
}

//add comment
//if the user is logged in then add comment
if (isset($_POST['review']) && isset($_SESSION['email'])){

    $subRating = (int)mysqli_real_escape_string($connection, $_POST['rating']);
    $subComment = mysqli_real_escape_string($connection, $_POST['comments']);

    //check that rating is within range
    if(!(0 < $subRating && $subRating <= 5)){
        header("Location: index.php?rating=error");
        exit();
    }

    $insertComment = "INSERT INTO user_reviews (uid, bid, rating, comments)
                      VALUES ('19', '$id', '$subRating', '$subComment')";

    mysqli_query($connection, $insertComment);

    header("Location: book.php?bid=" . $id);
    exit();
}

//add to cart
if (isset($_POST['order']) && isset($_SESSION['email'])){
    $orderAmt = (int)mysqli_real_escape_string($connection, $_POST['bAmount']);

    //force order amount into bounds
    if($orderAmt < 1){
        $orderAmt = 1;
    } else if ($orderAmt > $book['quantity']){
        $orderAmt = $book['quantity'];
    }

    //store the order amount into the books array
    $book['orderAmt'] = $orderAmt;
    //store the book that was ordered into session under order tag
    $_SESSION['order'][] = $book;
}
?>

<section class="books-container">
    <div class="books-wrapper">
        <?php
        echo '  <h1>' . $book['name'] . '</h1>
                <p>by ' . $book['author'] . '</p>
                <p>' . $book['price'] . '</p>
                <p>' . $book['quantity'] . '</p>
                <p>' . $book['ISBN'] . '</p>
                <p>' . $book['language'] . '</p>
                <p>' . $book['published'] . '</p>
                <p>' . $book['publisher'] . '</p>
                <p>' . $book['subject'] . '</p>
                <p>' . $book['summary'] . '</p>
                <p>Average Rating: ' . round($avgRating['avgRating'], 1) . '/5</p>
        '
        ?>
        <form class="add-cart-form" action="book.php?bid=<?php echo $id?>" method="post">
            <input type="number" name="bAmount" value="1">
            <button type="submit" name="order">Add to Cart</button>
        </form>
    </div>

    <hr>

    <div class="comment-wrapper">
        <h3>Reviews</h3>
        <form class="review-form" action="book.php?bid=<?php echo $id?>" method="post">
            <input type="number" min="1" max="5" name="rating">
            <label for="rating">/5</label> <br>
            <textarea name="comments" placeholder="Comments" maxlength="256" rows="4" cols="50"></textarea> <br>
            <button type="submit" name="review">Submit</button>
        </form>
    </div>

    <hr>

    <div class="reviews-wrapper">
        <ul>
            <?php
                if($reviewsCheck > 0){
                    while ($review = mysqli_fetch_assoc($reviewsResult)){

                        //get reviewers name
                        $reviewerID = $review['uid'];
                        $userNameQuery = "SELECT fname, lname FROM user WHERE id = '$reviewerID'";
                        $userNameResult = mysqli_query($connection, $userNameQuery);

                        if(mysqli_num_rows($userNameResult) > 0) {

                            $userName = mysqli_fetch_assoc($userNameResult);

                            echo
                                '<li>
                                    <p>' . $userName['fname'] . ' ' . $userName['lname'] .'</p>
                                    <p>' . $review['rating'] . '/5</p>
                                    <p>' . $review['comments'] . '</p> <br>
                                </li>';
                        }
                    }
                }
            ?>
        </ul>
    </div>
</section>



<?php
include_once 'footer.php';
?>