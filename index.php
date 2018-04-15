<?php
    include_once 'header.php';
?>

<section class="main-container">
    <div class="main-wrapper">
        <div class="search-container">
            <form class="search-form" method="post">
                <select name="search-option">
                    <option value="title">Title</option>
                    <option value="author">Author</option>
                    <option value="subject">Subject</option>
                    <option value="keyword">Keyword</option>
                    <option value="date">Date Published</option>
                </select>
                <input type="text" name="search">
                <button type="submit" name="submit">Search</button>
            </form>
            <ul>
                <?php
                if (isset($_POST['submit'])) {

                    include_once 'includes/dbh-inc.php';

                    //get data
                    $option = mysqli_real_escape_string($connection, $_POST['search-option']);
                    $searchWord = mysqli_real_escape_string($connection, $_POST['search']);

                    $querry = "SELECT * FROM books WHERE name LIKE '%$searchWord%'";
                    $result = mysqli_query($connection, $querry);
                    $resultCheck = mysqli_num_rows($result);

                    if($resultCheck > 0){
                        while ($rows = mysqli_fetch_assoc($result)){
                            $name = $rows['name'];
                            echo '<li><p>' . $name . '</p></li>';
                            //echo $name;
                        }
                    } else {

                    }
                }
                ?>
            </ul>
        </div>
    </div>
</section>

<?php
    include_once 'footer.php';
?>