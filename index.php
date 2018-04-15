<?php
    include_once 'header.php';
?>

<section class="main-container">
    <div class="main-wrapper">
        <div class="search-container">
            <?php
                include_once 'includes/bookSearch-inc.php';
            ?>
            <ul class="search-result">
                <?php
                //echo results as list elements
                if($resultCheck > 0){
                    while ($rows = mysqli_fetch_assoc($result)){
                        echo
                            '<li><a href="">    
                              <h3>' . $rows['name'] . '</h3> 
                              <p>' . $rows['author'] . '</p>
                              <p>$' . $rows['price'] . '</p>
                             </a></li>';
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