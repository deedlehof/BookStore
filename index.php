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
                    include_once 'includes/bookSearch-inc.php';
                ?>
            </ul>
        </div>
    </div>
</section>

<?php
    include_once 'footer.php';
?>