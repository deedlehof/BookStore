<?php

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

if (isset($_POST['submit']) && isset($_SESSION['email'])){

}
?>

<?php
include_once 'header.php';
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
        <button type="submit" name="order">Add to cart</button>
    </div>

    <hr>

    <div class="comment-wrapper">
        <h3>Reviews</h3>
        <form class="review-form" action="book.php?bid=<?php echo $id?>" method="post">
            <input type="number" name="rating">
            <label for="rating">/5</label>
            <textarea name="comments" placeholder="Comments"></textarea>
            <button type="submit" name="review">Submit</button>
        </form>
    </div>
    <div class="reviews-wrapper">
        <ul>
            <?php
                if($reviewsCheck > 0){
                    while ($review = mysqli_fetch_assoc($reviewsResult)){
                        echo
                        '<li>
                            <p>' . $review['rating'] . '/5</p>
                            <p>' . $review['comments'] . '</p>
                        </li>';
                    }
                }
            ?>
        </ul>
    </div>
</section>



<?php
include_once 'footer.php';
?>