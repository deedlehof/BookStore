<?php
/**
 * Queries the database based off search word and option
 * May move search html to this file too
*/

include_once 'includes/dbh-inc.php';

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

//echo results as list elements
if($resultCheck > 0){
    while ($rows = mysqli_fetch_assoc($result)){
        echo '<li>    
                  <h3>' . $rows['name'] . '</h3> 
                  <p>' . $rows['author'] . '</p>
                  <p>$' . $rows['price'] . '</p>
              </li>';
    }
}
?>