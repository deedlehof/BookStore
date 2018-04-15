<?php
/**
 * Queries the database based off search word and option
 * Drop this template wherever you need to search in the books db
 *
*/

include_once 'includes/dbh-inc.php';

echo '      <form class="search-form" method="post">
                <select name="search-option">
                    <option value="title">Title</option>
                    <option value="author">Author</option>
                    <option value="subject">Subject</option>
                    <option value="keyword">Keyword</option>
                    <option value="date">Date Published</option>
                </select>
                <input type="search" name="search">
                <button type="submit" name="submit">Search</button> <br>
                <label for="pmin">Price:</label>
                <input type="number"" name="pmin">
                <label for="pmax">-</label>
                <input type="number" name="pmax">
            </form>';

$query = "SELECT * FROM books";

if (isset($_POST['submit'])) {

    //get data
    $option = mysqli_real_escape_string($connection, $_POST['search-option']);
    $searchWord = mysqli_real_escape_string($connection, $_POST['search']);

    //query db based on search option
    switch ($option){
        case "title":
            $query = "SELECT * FROM books WHERE name LIKE '%$searchWord%'";
            break;
        case "author":
            $query = "SELECT * FROM books WHERE author LIKE '%$searchWord%'";
            break;
        case "subject":
            $query = "SELECT * FROM books WHERE subject LIKE '%$searchWord%'";
            break;
        case "keyword":
            $query = "SELECT books.* FROM books, keywords WHERE books.id = keywords.bookid AND keywords.keyword LIKE '%$searchWord%'";
            break;
        case "date":
            $query = "SELECT * FROM books WHERE published LIKE '%$searchWord%'";
            break;
        default:
            $query = "SELECT * FROM books";
            break;

    }



}

//get data
$result = mysqli_query($connection, $query);
$resultCheck = mysqli_num_rows($result);


?>